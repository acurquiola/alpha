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

    public function main($id){
        $id=($id=="Todos")?"%":$id;
        $modulos=$this->getModulos($id);
        return view('cobranza.main', compact('modulos'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($moduloNombre)
	{
        $modulo=\App\Modulo::where("nombre","like",$moduloNombre)->first();
        $cobros=\App\Cobro::where('modulo_id','=',$modulo->id)->get();
		return view('cobranza.index', compact('cobros','modulo'));
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
            ->join('facturadetalles','facturas.id' , '=', 'facturadetalles.factura_id')
        ->join('conceptos','conceptos.id' , '=', 'facturadetalles.concepto_id')
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
        $cobro=\App\Cobro::create(['cliente_id' => $request->get('cliente_id'), 'modulo_id'=>$request->get('modulo_id')]);
        $facturas=$request->get('facturas',[]);
        $pagos=$request->get('pagos',[]);

        foreach($facturas as $f){
            $factura=\App\Factura::find($f["id"]);
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
            $cobro->facturas()->attach([$factura->id => ['monto' => $f["montoAbonado"]]]);
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
	public function show($id)
	{
        return view('cobranza.show');
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
	public function destroy($id)
	{
		//
	}


    public function getFacturasClientes($moduloName,Request $request){
        $idOperator=">=";
        $id=0;
        if($moduloName!="Todos"){
            $modulo=\App\Modulo::where("nombre","like",$moduloName)->orderBy("nombre")->first();
            $id=$modulo->id;
            $idOperator="=";
        }
        $codigo=$request->get('codigo');
        $cliente=\App\Cliente::where("codigo","=", $codigo)->get()->first();
        $facturas=\App\Factura::select("facturas.*")
            ->join('clientes','facturas.cliente_id' , '=', 'clientes.id')
            ->join('facturadetalles','facturas.id' , '=', 'facturadetalles.factura_id')
            ->join('conceptos','conceptos.id' , '=', 'facturadetalles.concepto_id')
            ->where('conceptos.modulo_id', $idOperator, $id)
            ->where('clientes.codigo', '=', $codigo)
            ->where('facturas.estado','=','P')
            ->groupBy("facturas.id")->get();
        $facturas->load('metadata');

        $ajusteCliente= \DB::table('ajustes')
            ->where('cliente_id', $cliente->id)
            ->sum('monto');


        return ["facturas"=>$facturas, "ajuste"=> $ajusteCliente];
    }



    protected function getModulos($id){
        $modulos=\App\Modulo::where("nombre","like",$id)->orderBy("nombre")->get();
        foreach($modulos as $modulo){
            $modulo->facturas=\App\Factura::select("facturas.*")
                ->join('facturadetalles','facturas.id' , '=', 'facturadetalles.factura_id')
                ->join('conceptos','conceptos.id' , '=', 'facturadetalles.concepto_id')
                ->where('conceptos.modulo_id', "=", $modulo->id)
                ->where('facturas.estado','=','P')
                ->where('facturas.aeropuerto_id','=', session('aeropuerto')->id)
                ->groupBy("facturas.id")->get();
            $modulo->facturas->load('cliente', 'metadata');
        }
        return $modulos;
    }

}
