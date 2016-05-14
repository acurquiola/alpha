<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TasaController extends Controller {

    public function taquilla(){
        $aeropuerto=session('aeropuerto');
        return view('tasas.taquilla', compact('aeropuerto'));
    }

    public function supervisor(){
        $aeropuerto=session('aeropuerto');
        return view('tasas.supervisor', compact('aeropuerto'));
    }

    public function getSupervisorOperacion(Request $request){
        $aeropuerto=$this->getAeropuerto();
        $aeropuertoId=$aeropuerto->id;
        $fecha=$request->get('fecha');
        $taquilla=$request->get('taquilla');
        $tasaOps=\App\Tasaop::where([
            'aeropuerto_id' => $aeropuerto->id,
            'fecha' => \Carbon\Carbon::createFromFormat('d/m/Y', $fecha)->format('Y-m-d'),
            'cv' => $taquilla=="CV"
        ])->with('detalles')->get();
        $serieTasas=[];
        foreach($tasaOps as $tasaOp)
            foreach($tasaOp->detalles as $tasa){
                if(!array_key_exists($tasa->serie, $serieTasas)){
                    $serieTasas[$tasa->serie]=0;
                }
                $serieTasas[$tasa->serie]+=$tasa->total;
            }
        $tasaOpsArray=$tasaOps->sortBy(function($tasaOp, $index){ return ($tasaOp['taquilla'] << 16) + $tasaOp['turno']; })->groupBy('taquilla');

        $tasas=$this->getTasasByAeropuerto($aeropuerto, $taquilla);

        return view('tasas.partials.supervisorForm', compact('tasas' ,'tasaOps' ,'tasaOpsArray', 'fecha', 'taquilla', 'aeropuerto', 'serieTasas'));
    }

	public function getOperacion(Request $request){
        $aeropuerto=$this->getAeropuerto();
        $fecha=$request->get('fecha');
        $taquilla=$request->get('taquilla');
        $turno=$request->get('turno');
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

    public function postSupervisor(Request $request){
        $aeropuerto=$this->getAeropuerto();

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
