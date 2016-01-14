<?php namespace App\Http\Controllers;

use App\Facturametadata;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CobranzaController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function main($moduloNombre){
        $moduloNombre=($moduloNombre=="Todos")?"%":$moduloNombre;
        $modulos=$this->getModulos($moduloNombre);
        return view('cobranza.main', compact('modulos'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($moduloNombre, Request $request)
	{

        $sortName          = $request->get('sortName','id');
        $sortName          =($sortName=="")?"id":$sortName;

        $sortType          = $request->get('sortType','ASC');
        $sortType          =($sortType=="")?"ASC":$sortType;


        $cobroId         = $request->get('id');
        $cobroId         =($cobroId=="")?0:$cobroId;
        $cobroIdOperator = $request->get('facturaIdOperator', '>=');
        $cobroIdOperator =($cobroIdOperator=="")?'>=':$cobroIdOperator;
        $cobroIdOperator =($cobroId==0)?">=":$cobroIdOperator;

        $clienteNombre     = $request->get('clienteNombre', '%');

        $observacion      = $request->get('observacion', '%');

        $pagado             = $request->get('pagado');
        $pagado             =($pagado=="")?0:$pagado;
        $pagadoOperator     = $request->get('pagadoOperator', '>=');
        $pagadoOperator     =($pagadoOperator=="")?'>=':$pagadoOperator;
        $pagadoOperator     =($pagado==0)?">=":$pagadoOperator;

        $depositado             = $request->get('depositado');
        $depositado             =($depositado=="")?0:$depositado;
        $depositadoOperator     = $request->get('depositadoOperator', '>=');
        $depositadoOperator     =($depositadoOperator=="")?'>=':$depositadoOperator;
        $depositadoOperator     =($depositado==0)?">=":$depositadoOperator;

        $fecha             = $request->get('fecha');
        $fechaOperator     = $request->get('fechaOperator', '>=');
        $fechaOperator     =($fechaOperator=="")?'>=':$fechaOperator;
        if($fecha==""){
            $fecha         ='0000-00-00';
            $fechaOperator ='>=';
        }else{
            $fecha=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
        }



        \Input::merge([ 'fechaOperator'     =>$fechaOperator,
            'cobroIdOperator' =>$cobroIdOperator,
            'pagadoOperator'     =>$pagadoOperator,
            'depositadoOperator'     =>$depositadoOperator,
            'sortName'          =>$sortName,
            'sortType'          =>$sortType]);

        $modulo=\App\Modulo::where("nombre","like",$moduloNombre)->first();

        $cobros=\App\Cobro::select("cobros.*","clientes.nombre as clienteNombre")
            ->join('clientes','clientes.id' , '=', 'cobros.cliente_id')
            ->where('cobros.modulo_id', "=", $modulo->id)
            ->where('cobros.id', $cobroIdOperator, $cobroId)
            ->where('montodepositado', $depositadoOperator, $depositado)
            ->where('montofacturas', $pagadoOperator, $pagado)
            ->where('cobros.created_at', $fechaOperator, $fecha)
            ->where('observacion', 'like', "%$observacion%")
            ->where('clientes.nombre', 'like', "%$clienteNombre%")
            ->where('cobros.aeropuerto_id','=', session('aeropuerto')->id)
            ->with('cliente')
            ->orderBy($sortName, $sortType)->paginate(50);

        $cobros->setPath('');

		return view('cobranza.index', compact('cobros','modulo'))->withInput(\Input::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($moduloName)
	{
        $idOperator=">=";
        $id=0;
        if($moduloName!="Todos"){
            $modulo=\App\Modulo::where("nombre","like",$moduloName)->orderBy("nombre")->first();
            $id=$modulo->id;
            $idOperator="=";
        }

        $clientes=\App\Cliente::join('facturas','facturas.cliente_id' , '=', 'clientes.id')
            ->join('facturadetalles','facturas.nFactura' , '=', 'facturadetalles.factura_id')
        ->join('conceptos','conceptos.id' , '=', 'facturadetalles.concepto_id')
        ->where('facturas.aeropuerto_id','=', session('aeropuerto')->id)
        ->where('conceptos.modulo_id', $idOperator, $id)
        ->where('facturas.estado','=','P')
        ->orderBy('clientes.nombre')
        ->groupBy("clientes.id")->get();

        $bancos=\App\Banco::with('cuentas')->get();
        return view('cobranza.create',compact('clientes','moduloName', 'bancos','id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        \DB::transaction(function () use ($request) {
        $cobro=\App\Cobro::create([
            'cliente_id' => $request->get('cliente_id'),
            'modulo_id'=>$request->get('modulo_id'),
            'aeropuerto_id' => session('aeropuerto')->id]);
        $facturas=$request->get('facturas',[]);
        $pagos=$request->get('pagos',[]);
        foreach($facturas as $f){
            $factura=\App\Factura::find($f["nFactura"]);
            $facturaMetadata=\App\Facturametadata::firstOrCreate(["factura_id"=>$factura->id]);
            $facturaMetadata->ncobros++;
            /**
             * En el request me llega los porcentajes del iva e isrl que fueron usados en la retencion
             * y el monto de abonado. Debo hallar cuanto de ese monto abonado corresponde la base y al iva
             *
             */
            //Calculo el total de la retencion

            $totalRetencion=($factura->subtotalNeto*$f["islrpercentage"]/100)+($factura->iva*$f["ivapercentage"]/100);

            //Calculo el total que se debe pagar

            $totalPagar=$factura->total-$totalRetencion;

            //Con el total a pagar puedo calcular cuanto porcentualmente contribuye lo abonado al saldo

            $abonadoPorcentaje=$f["montoAbonado"]/$totalPagar;

            //total real abonado a la factura

            $abonadoReal=$abonadoPorcentaje*$factura->total;

            /*
             * ya tengo el abonado real, ahora debo calcular cuanto contribuye a la base y al iva
             */
            //calculo cuanto es el total sin la recarga

            $totalSinRecarga=$factura->total-$factura->recargoTotal;

            //ahora calculo la contribucion porcentual del iva y la base en el total

            $ivaPorcentaje=$factura->iva/$totalSinRecarga;
            $baseDespuesDescuentoPorcentaje=$factura->subtotal/$totalSinRecarga;

            //calculo cuanto es la contribucion de la base y el descuento en el subtotalDespuesDescuento

            $baseDescuentoPorcentaje=$factura->subtotalNeto/$factura->subtotal;

            //calculo cuanto del saldo abonado en la base

            $base=$abonadoReal*$baseDespuesDescuentoPorcentaje*$baseDescuentoPorcentaje;

            //calculo cuanto del saldo abonado en el iva

            $iva=$abonadoReal*$ivaPorcentaje;

            //Nota si no existiera descuento $base+$iva=$abonadoReal

            //Ya que tengo la base y el iva abonado puedo calcular la retencion abonada

            $retencion=($base*$f["islrpercentage"]/100)+($iva*$f["ivapercentage"]/100);


            $facturaMetadata->montopagado+=$f["montoAbonado"];
            $facturaMetadata->basepagado+=$base;
            $facturaMetadata->ivapagado+=$iva;
            $facturaMetadata->islrpercentage=$f["islrpercentage"];
            $facturaMetadata->ivapercentage=$f["ivapercentage"];
            $facturaMetadata->retencion+=$retencion;
            $facturaMetadata->total+=$abonadoReal;
            $facturaMetadata->save();
            $cobro->facturas()
            ->attach([$factura->nFactura =>
                ['monto' => $f["montoAbonado"],
                'base' => $base,
                'iva' => $iva,
                'islrpercentage' => $f["islrpercentage"],
                'ivapercentage' => $f["ivapercentage"],
                'retencion' => $retencion,
                'total' => $abonadoReal,
                'retencionFecha' => $f["retencionFecha"],
                'retencionComprobante' => $f["retencionComprobante"],
                ]]);
            if($facturaMetadata->total==(float)str_replace(",","",$factura->total)){
                $factura->estado="C";
                $factura->save();
            }
        }


        foreach($pagos as $p){
            $cobro->pagos()->create($p);
        }

        $cobro->montofacturas=$request->get("totalFacturas");
        $cobro->montodepositado=$request->get("totalDepositado");
        $ajuste=$request->get("ajuste");

        if($cobro->montodepositado>($cobro->montofacturas-$ajuste)){
            $cobro->ajustes()->create(["monto"=>$cobro->montodepositado-$cobro->montofacturas-$ajuste,
                                        "cliente_id" => $request->get("cliente_id")]);

        }
        $cobro->modulo_id=$request->get('modulo_id');
        $cobro->observacion=$request->get('observacion');
        $cobro->hasrecaudos=$request->get('hasrecaudos');
        $cobro->save();
        });

        return ["success"=>1];
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($moduloNombre, $id)
	{
        $cobro=\App\Cobro::find($id);
        $cobro->load('facturas', 'pagos', 'ajustes', 'cliente');
        return view('cobranza.show', compact('cobro'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($moduloNombre,  $id)
	{

        \DB::transaction(function () use ($moduloNombre, $id) {
            $cobro=\App\Cobro::find($id);
            $facturas=$cobro->facturas;
            foreach($facturas as $factura){
                $facturaMetadata=$factura->metadata;
                $facturaMetadata->ncobros--;
                $facturaMetadata->montopagado-=$factura->pivot->monto;
                $facturaMetadata->basepagado-=$factura->pivot->base;
                $facturaMetadata->ivapagado-=$factura->pivot->iva;
                $facturaMetadata->retencion-=$factura->pivot->retencion;
                $facturaMetadata->total-=$factura->pivot->total;
                $facturaMetadata->save();

                if($facturaMetadata->total!=(float)str_replace(",","",$factura->total)){
                    $factura->estado="P";
                    $factura->save();
                }
            }
            $cobro->delete();
        });

        return ["success"=>1, "text"=>"El cobro se ha eliminado con exito"];
	}


    public function getFacturasClientes($moduloName,Request $request){
        $idOperator=">=";
        $id=0;
        if($moduloName!="Todos"){
            $modulo=\App\Modulo::where("nombre","like",$moduloName)
                ->where('aeropuerto_id', session('aeropuerto')->id)
                ->first();
            $id=$modulo->id;
            $idOperator="=";
        }
        $codigo=$request->get('codigo');
        $cliente=\App\Cliente::where("codigo","=", $codigo)->get()->first();
        if(!$cliente)
            return ["facturas"=>[], "ajuste"=> []];
        $facturas=\App\Factura::with('metadata')
            ->where('cliente_id', $cliente->id)
            ->where('modulo_id', $idOperator, $id)
            ->where('aeropuerto_id', session('aeropuerto')->id)
            ->where('facturas.estado','=','P')
            ->groupBy("facturas.nFactura")->get();
        $ajusteCliente= \DB::table('ajustes')
            ->where('cliente_id', $cliente->id)
            ->sum('monto');

        return ["facturas"=>$facturas, "ajuste"=> $ajusteCliente];
    }



    protected function getModulos($moduloNombre){
        $modulos=session('aeropuerto')->modulos()->where("nombre","like",$moduloNombre)->orderBy("nombre")->get();
        return $modulos;
    }

}
