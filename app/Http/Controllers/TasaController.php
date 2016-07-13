<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TasaController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function taquilla(){
        $aeropuerto=session('aeropuerto');
        $today = \Carbon\Carbon::now()->format('d/m/Y');
        return view('tasas.taquilla', compact('aeropuerto', 'today'));
    }

    public function supervisor(){
        $aeropuerto=session('aeropuerto');
        $bancos=\App\Banco::with('cuentas')->get();
        return view('tasas.supervisor', compact('aeropuerto', 'bancos'));
    }

    public function getSupervisorOperacion(Request $request){
        $aeropuerto=$this->getAeropuerto();
        $aeropuertoId=$aeropuerto->id;
        $fecha=$request->get('fecha');
        $taquilla=$request->get('taquilla');
        $tasaOps=\App\Tasaop::where([
            'aeropuerto_id' => $aeropuerto->id,
            'fecha'         => \Carbon\Carbon::createFromFormat('d/m/Y', $fecha)->format('Y-m-d'),
            'cv'            => $taquilla=="CV"
        ])->with('detalles')->get();
        $tasaCobro=\App\TasaCobro::where([
            'aeropuerto_id' => $aeropuerto->id,
            'fecha'         => \Carbon\Carbon::createFromFormat('d/m/Y', $fecha)->format('Y-m-d'),
            'cv'            => $taquilla=="CV"
        ])->with('detalles')->first();
        $serieTasas=[];
        foreach($tasaOps as $tasaOp)
            foreach($tasaOp->detalles as $tasa){
                if(!array_key_exists($tasa->serie, $serieTasas)){
                    $serieTasas[$tasa->serie]['monto']=0;
                    $serieTasas[$tasa->serie]['taquilla']='';
                }
                $serieTasas[$tasa->serie]['monto']+=$tasa->total;
                $serieTasas[$tasa->serie]['taquilla']=$tasaOp->taquilla;
            }
        $tasaOpsArray=$tasaOps->sortBy(function($tasaOp, $index){ 
            return ($tasaOp['taquilla'] << 16) + $tasaOp['turno']; 
        })->groupBy('taquilla');

        $tasas=$this->getTasasByAeropuerto($aeropuerto, $taquilla);

        return view('tasas.partials.supervisorForm', compact('tasaCobro' ,'tasas' ,'tasaOps' ,'tasaOpsArray', 'fecha', 'taquilla', 'aeropuerto', 'serieTasas'));
    }

    public function postSupervisor(Request $request){

        $aeropuerto     =$this->getAeropuerto();
        $aeropuertoId   =$aeropuerto->id;
        $fecha          =$request->get('fecha');
        $taquilla       =$request->get('taquilla');
        $pagos          =json_decode($request->get('pagos'));
        $tasaOps        =\App\Tasaop::where([
                                            'aeropuerto_id' => $aeropuerto->id,
                                            'fecha'         => \Carbon\Carbon::createFromFormat('d/m/Y', $fecha)->format('Y-m-d'),
                                            'cv'            => $taquilla=="CV"
                                        ])->with('detalles')->get();
        $serieTasas=[];
        $tasaCobro=\App\TasaCobro::create([
            'aeropuerto_id' => $aeropuerto->id,
            'fecha'         => \Carbon\Carbon::createFromFormat('d/m/Y', $fecha)->format('Y-m-d'),
            'cv'            => $taquilla=="CV"
        ]);
        foreach($pagos as $pago){
            $tasaCobro->detalles()->create([
                "tipo"        =>$pago->tipo,
                "fecha"        =>$pago->fecha,
                "banco_id"     =>$pago->banco_id,
                "cuenta_id"    =>$pago->cuenta_id,
                "ncomprobante" =>$pago->ncomprobante,
                "monto"        =>$pago->monto+0
            ]);
        }
        foreach($tasaOps as $tasaOp){
            $tasaOp->update(["consolidado" => true]);
            $tasaCobro->operaciones()->save($tasaOp);
            foreach($tasaOp->detalles as $tasa){
                if(!array_key_exists($tasa->serie, $serieTasas)){
                    $serieTasas[$tasa->serie]=0;
                }
                $serieTasas[$tasa->serie]+=$tasa->total;
            }
        }
        $tasaOpsArray=$tasaOps->sortBy(function($tasaOp, $index){ 
            return ($tasaOp['taquilla'] << 16) + $tasaOp['turno']; 
        })->groupBy('taquilla');

        $tasas=$this->getTasasByAeropuerto($aeropuerto, $taquilla);
        $tasaCobro->load('detalles');
        return view('tasas.partials.supervisorForm', compact('tasaCobro' ,'tasas' ,'tasaOps' ,'tasaOpsArray', 'fecha', 'taquilla', 'aeropuerto', 'serieTasas'));
    }

	public function getOperacion(Request $request){
        $aeropuerto=$this->getAeropuerto();
        $fecha=$request->get('fecha');
        $taquilla=$request->get('taquilla');
        $turno=$request->get('turno');
        $tasaCobro=\App\TasaCobro::where([
            'aeropuerto_id' => $aeropuerto->id,
            'fecha' => \Carbon\Carbon::createFromFormat('d/m/Y', $fecha)->format('Y-m-d'),
            'cv' => $taquilla=="CV"
        ])->first();
        if($tasaCobro){
                return "<di class='col-md-12'><h2 class='text-center bg-primary'>Ya este día fue consolidado</h2></div>";
        }
        $tasaAttrs=$this->getTasasAttrs($request);
        $tasaOp=\App\Tasaop::where($tasaAttrs)->first();
        if(!$tasaOp){
            $tasaOp= new \App\Tasaop();
            $tasaOp->fill($tasaAttrs);
        }
        $tasaOp->load('detalles');
        $tasas=$this->getTasasByAeropuerto($aeropuerto, $taquilla);
        return view('tasas.partials.taquillaForm', compact('tasaOp', 'fecha', 'taquilla', 'turno', 'tasas', 'aeropuerto'));
    }



    public function postOperacion(Request $request){
        $aeropuerto=$this->getAeropuerto();
        $fecha=$request->get('fecha');
        $taquilla=$request->get('taquilla');
        $turno=$request->get('turno');
        $tasaAttrs=$this->getTasasAttrs($request);
        $tasaOp=\App\Tasaop::where($tasaAttrs)->first();
        if(!$tasaOp){
            $tasaOp= \App\Tasaop::create($tasaAttrs);
        }
        $tasaOp->detalles()->delete();
        $detalles=$request->only('serie', 'desde', 'hasta', 'cantidad', 'monto');
        if(isset($detalles['serie']))
            foreach($detalles['serie'] as $serieIndex => $serie){
                $tasaOp->detalles()->create([
                    "serie" => $serie,
                    "inicio" => $detalles['desde'][$serieIndex],
                    "fin" => $detalles['hasta'][$serieIndex],
                    "costo" => $detalles['monto'][$serieIndex],
                    "cantidad" => $detalles['cantidad'][$serieIndex],
                    "total" => $detalles['monto'][$serieIndex] * $detalles['cantidad'][$serieIndex],
                ]);
            }

        $tasaOp->load('detalles');

        $tasas=$this->getTasasByAeropuerto($aeropuerto, $taquilla);

        return view('tasas.partials.taquillaForm', compact('tasaOp', 'fecha', 'taquilla', 'turno', 'tasas', 'aeropuerto'));
    }

    protected function getAeropuerto(){
        return session('aeropuerto');
    }


    protected function getTasasAttrs($request){
        return [
                'aeropuerto_id' => $this->getAeropuerto()->id,
                'fecha' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->get('fecha'))->format('Y-m-d'),
                'taquilla' => $request->get('taquilla'),
                'turno' => $request->get('turno'),
                'cv' => $request->get('taquilla')=="CV"
               ];
    }



    protected function getTasasByAeropuerto($aeropuerto, $taquilla){
        $tasas=$aeropuerto->tasas()->where('activa', '=', true)->where('cv', '=', $taquilla=="CV")->get();
        foreach($tasas as $tasa){
            $tasa->max=\DB::table('tasaopdetalles')->where('serie', $tasa->nombre)->max('fin')+1;
        };
        return $tasas;
    }




}
