<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Http\Request;

class ReporteController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    //No sé si es el nombre
    public function getReporteMensual(Request $request){
        $mes=$request->get('mes', \Carbon\Carbon::now()->month);
        $anno=$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto=$request->get('aeropuerto',  0);
        $modulos=\App\Modulo::where('aeropuerto_id', session('aeropuerto')->id )->get();
        $montos=[];
        $montosTotales=[];
        $primerDiaMes=\Carbon\Carbon::create($anno, $mes,1)->startOfMonth();
        $ultimoDiaMes=\Carbon\Carbon::create($anno, $mes,1)->endOfMonth();
        for(;$primerDiaMes<=$ultimoDiaMes; $primerDiaMes->addDay()){
            $montos[$primerDiaMes->format('d/m/Y')]=[];
            foreach($modulos as $modulo){
                if(!isset($montos[$primerDiaMes->format('d/m/Y')][$modulo->nombre]))
                    $montos[$primerDiaMes->format('d/m/Y')][$modulo->nombre]=[];
                $montos[$primerDiaMes->format('d/m/Y')][$modulo->nombre]["total"]=\DB::table('facturas')
                    ->join('facturadetalles','facturas.nFactura' , '=', 'facturadetalles.factura_id')
                    ->join('conceptos','conceptos.id' , '=', 'facturadetalles.concepto_id')
                    ->where('conceptos.modulo_id', "=",$modulo->id)
                    ->where('facturas.fecha', $primerDiaMes)
                    ->where('facturas.aeropuerto_id',($aeropuerto==0)?">":"=" ,$aeropuerto)
                    ->where('facturas.deleted_at', null)
                    ->sum('facturas.total');
                foreach($modulo->conceptos as $concepto){
                    $montos[$primerDiaMes->format('d/m/Y')][$modulo->nombre][$concepto->nompre]=\DB::table('facturadetalles')
                        ->join('facturas','facturas.nFactura' , '=', 'facturadetalles.factura_id')
                        ->join('conceptos','conceptos.id' , '=', 'facturadetalles.concepto_id')
                        ->where('conceptos.modulo_id', "=",$modulo->id)
                        ->where('facturadetalles.concepto_id', $concepto->id)
                        ->where('facturas.fecha', $primerDiaMes)
                        ->where('facturas.aeropuerto_id',($aeropuerto==0)?">":"=" ,$aeropuerto)
                        ->where('facturas.deleted_at', null)
                        ->pluck('facturadetalles.totalDes');
                }
                if(!isset($montosTotales[$modulo->nombre]))
                    $montosTotales[$modulo->nombre]=[];
                if(!isset($montosTotales[$modulo->nombre]["total"]))
                    $montosTotales[$modulo->nombre]["total"]=0;
                $montosTotales[$modulo->nombre]["total"]+=($montos[$primerDiaMes->format('d/m/Y')][$modulo->nombre]["total"]);
                foreach($modulo->conceptos as $concepto){
                    if(!isset($montosTotales[$modulo->nombre][$concepto->nompre]))
                        $montosTotales[$modulo->nombre][$concepto->nompre]=0;
                    $montosTotales[$modulo->nombre][$concepto->nompre]+=($montos[$primerDiaMes->format('d/m/Y')][$modulo->nombre][$concepto->nompre]);
                }
            }
        }
        return view('reportes.reporteDiario', compact('modulos', 'montos', 'montosTotales', 'mes', 'anno', 'aeropuerto'));
    }


    //Control de Recaudacíón Mensual
    public function getControlDeRecaudacionMensual(Request $request){
        $anno          =$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto    =$request->get('aeropuerto',  session('aeropuerto')->id);
        $montos        =[];
        $montosTotales =[];
        $modulos       =\App\Modulo::where('aeropuerto_id', $aeropuerto)->get();
        $meses=[
            1  =>"ENERO",
            2  =>"FEBRERO",
            3  =>"MARZO",
            4  =>"ABRIL",
            5  =>"MAYO",
            6  =>"JUNIO",
            7  =>"JULIO",
            8  =>"AGOSTO",
            9  =>"SEPTIEMBRE",
            10 =>"OCTUBRE",
            11 =>"NOVIEMBRE",
            12 =>"DICIEMBRE"
        ];
        for($i=1;$i<=12; $i++){
                $diaMes=\Carbon\Carbon::create($anno, $i,1);
                $estacionamientos = 0;
                foreach ($modulos as $modulo) {
                    $montos[$meses[$diaMes->month]][$modulo->nombre]["total"]    =\App\Cobro::where('modulo_id', $modulo->id)
                                                                                    ->where('fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                                                                                    ->where('fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                                                                                    ->sum('montodepositado');
                    if($modulo->nombre == 'ESTACIONAMIENTO'){
                        $estacionamientos = \App\Estacionamiento::join('estacionamientoops', 'estacionamientoops.estacionamiento_id', '=', 'estacionamientos.id')
                                                                    ->where('estacionamientos.aeropuerto_id', $aeropuerto)
                                                                    ->where('estacionamientoops.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                                                                    ->where('estacionamientoops.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                                                                    ->sum('depositado');

                    }

                    $montos[$meses[$diaMes->month]][$modulo->nombre]["total"]    += $estacionamientos;

                    foreach($modulo->conceptos as $concepto){
                        $montos[$meses[$diaMes->month]][$modulo->nombre][$concepto->nompre]    =\App\Cobro::join('cobro_factura', 'cobro_factura.cobro_id', '=', 'cobros.id')
                                                                        ->join('facturas', 'facturas.id', '=', 'cobro_factura.factura_id')
                                                                        ->join('facturadetalles', 'facturadetalles.factura_id', '=', 'facturas.id')
                                                                        ->where('cobros.modulo_id', $modulo->id)
                                                                        ->where('facturas.modulo_id', $modulo->id)
                                                                        ->where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                                                                        ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                                                                        ->where('facturadetalles.concepto_id', $concepto->id)
                                                                        ->sum('facturadetalles.montoDes');


                    }
                    if(!isset($montosTotales[$modulo->nombre]))
                        $montosTotales[$modulo->nombre]=[];
                    if(!isset($montosTotales[$modulo->nombre]["total"]))
                        $montosTotales[$modulo->nombre]["total"]=0;
                    $montosTotales[$modulo->nombre]["total"]+=($montos[$meses[$diaMes->month]][$modulo->nombre]["total"]);
                    foreach($modulo->conceptos as $concepto){
                        if(!isset($montosTotales[$modulo->nombre][$concepto->nompre]))
                            $montosTotales[$modulo->nombre][$concepto->nompre]=0;
                        $montosTotales[$modulo->nombre][$concepto->nompre]+=($montos[$meses[$diaMes->month]][$modulo->nombre][$concepto->nompre]);
                    }
                }
            }

        return view('reportes.reporteControlDeRecaudacionMensual', compact('modulos', 'montos', 'montosTotales', 'mes', 'anno', 'aeropuerto'));
    }

    //Control de Recaudacíón Mensual
	public function getControlDeRecaudacionDiario(Request $request){
        $mes           =$request->get('mes', \Carbon\Carbon::now()->month);
        $anno          =$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto    =$request->get('aeropuerto',  session('aeropuerto')->id);
        $montos        =[];
        $montosTotales =[];
        $modulos       =\App\Modulo::where('aeropuerto_id', $aeropuerto)->get();
        $primerDiaMes  =\Carbon\Carbon::create($anno, $mes,1)->startOfMonth();
        $ultimoDiaMes  =\Carbon\Carbon::create($anno, $mes,1)->endOfMonth();
        for(;$primerDiaMes<=$ultimoDiaMes; $primerDiaMes->addDay()){
            $estacionamientos = 0;
            foreach ($modulos as $modulo) {
                $montos[$primerDiaMes->format('d/m/Y')][$modulo->nombre]["total"]    =\App\Cobro::where('modulo_id', $modulo->id)
                                                                                ->where('fecha', 'like', $primerDiaMes->toDateString().'%')
                                                                                ->sum('montodepositado');
                if($modulo->nombre == 'ESTACIONAMIENTO'){
                    $estacionamientos = \App\Estacionamiento::join('estacionamientoops', 'estacionamientoops.estacionamiento_id', '=', 'estacionamientos.id')
                                                                ->where('estacionamientos.aeropuerto_id', $aeropuerto)
                                                                ->where('estacionamientoops.fecha',$primerDiaMes->toDateString())
                                                                ->sum('depositado');

                }

                $montos[$primerDiaMes->format('d/m/Y')][$modulo->nombre]["total"]    += $estacionamientos;

                foreach($modulo->conceptos as $concepto){
                    $montos[$primerDiaMes->format('d/m/Y')][$modulo->nombre][$concepto->nompre]    =\App\Cobro::join('cobro_factura', 'cobro_factura.cobro_id', '=', 'cobros.id')
                                                                    ->join('facturas', 'facturas.id', '=', 'cobro_factura.factura_id')
                                                                    ->join('facturadetalles', 'facturadetalles.factura_id', '=', 'facturas.id')
                                                                    ->where('cobros.modulo_id', $modulo->id)
                                                                    ->where('facturas.modulo_id', $modulo->id)
                                                                    ->where('cobros.fecha' , 'like', $primerDiaMes->toDateString().'%')
                                                                    ->where('facturadetalles.concepto_id', $concepto->id)
                                                                    ->sum('facturadetalles.montoDes');

                }
                if(!isset($montosTotales[$modulo->nombre]))
                    $montosTotales[$modulo->nombre]=[];
                if(!isset($montosTotales[$modulo->nombre]["total"]))
                    $montosTotales[$modulo->nombre]["total"]=0;
                $montosTotales[$modulo->nombre]["total"]+=($montos[$primerDiaMes->format('d/m/Y')][$modulo->nombre]["total"]);
                foreach($modulo->conceptos as $concepto){
                    if(!isset($montosTotales[$modulo->nombre][$concepto->nompre]))
                        $montosTotales[$modulo->nombre][$concepto->nompre]=0;
                    $montosTotales[$modulo->nombre][$concepto->nompre]+=($montos[$primerDiaMes->format('d/m/Y')][$modulo->nombre][$concepto->nompre]);
                }
            }
        }


        return view('reportes.reporteControlDeRecaudacionDiario', compact('modulos', 'montos', 'montosTotales', 'mes', 'anno', 'aeropuerto'));
    }

    public function getReporteModuloMetaMensual(Request $request){
        $mes          =$request->get('mes', \Carbon\Carbon::now()->month);
        $anno         =$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto   =$request->get('aeropuerto',  0);
        $primerDiaMes =\Carbon\Carbon::create($anno, $mes,1)->startOfMonth();
        $ultimoDiaMes =\Carbon\Carbon::create($anno, $mes,1)->endOfMonth();
        $modulos      =\App\Modulo::where('aeropuerto_id', session('aeropuerto')->id )->get();
        $montos       =[];
        foreach($modulos as $modulo){
            $montos[$modulo->nombre]=\DB::table('facturas')
                ->join('facturadetalles','facturas.nFactura' , '=', 'facturadetalles.factura_id')
                ->join('conceptos','conceptos.id' , '=', 'facturadetalles.concepto_id')
                ->where('conceptos.modulo_id', "=",$modulo->id)
                ->where('facturas.fecha','>=' ,$primerDiaMes)
                ->where('facturas.fecha','<=' ,$ultimoDiaMes)
                ->where('facturas.aeropuerto_id',($aeropuerto==0)?">":"=" ,$aeropuerto)
                ->where('facturas.deleted_at', null)
                ->sum('facturas.total');
        }
        return view('reportes.reporteModuloMetaMensual', compact('montos', 'mes', 'anno', 'aeropuerto'));
    }

    //Reporte de Tráfico Aéreo (LISTO).
    public function getReporteTraficoAereo(Request $request){
        $diaDesde        =$request->get('diaDesde', \Carbon\Carbon::now()->day);
        $mesDesde        =$request->get('mesDesde', \Carbon\Carbon::now()->month);
        $annoDesde       =$request->get('annoDesde',  \Carbon\Carbon::now()->year);
        $diaHasta        =$request->get('diaHasta', \Carbon\Carbon::now()->day);
        $mesHasta        =$request->get('mesHasta', \Carbon\Carbon::now()->month);
        $annoHasta       =$request->get('annoHasta',  \Carbon\Carbon::now()->year);
        $destino         =$request->get('destino', 0);
        $procedencia     =$request->get('procedencia', 0);
        $cliente         =$request->get('cliente_id', 0);
        $aeropuerto      =session('aeropuerto');

        $procedenciaNombre =($procedencia==0)?'TODOS':\App\Puerto::find($procedencia)->nombre;
        $destinoNombre     =($destino==0)?'TODOS':\App\Puerto::find($destino)->nombre;

        if($cliente == 0){
            $clientes   = \App\Cliente::where('tipo', 'Mixto')
                                        ->OrWhere('tipo', 'Aeronáutico')
                                        ->orderBy('nombre')
                                        ->get();
        }else{
            $cliente_id = $cliente;
            $clientes   = \App\Cliente::where('id', $cliente_id)->orderBy('nombre')->get();
        }

        $datosCliente =[];

        foreach ($clientes as $index=>$cliente){

            $puertosNac = \App\Puerto::where('pais_id', '232')->lists('id');
            $puertosInt = \App\Puerto::where('pais_id', '<>', '232')->lists('id');


            $aterrizajesNac = \App\Aterrizaje::whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta))
                                        ->where('cliente_id', $cliente->id)
                                        ->where('aeropuerto_id', session('aeropuerto')->id)
                                        ->where('puerto_id', ($procedencia==0)?'>=':'=', $procedencia)
                                        ->whereIn('puerto_id', $puertosNac)
                                        ->get();
            $despeguesNac = \App\Despegue::whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde, $annoHasta.'-'.$mesHasta.'-'.$diaHasta))                                        ->where('cliente_id', $cliente->id)
                                        ->where('aeropuerto_id', session('aeropuerto')->id)
                                        ->where('puerto_id', ($destino==0)?'>=':'=', $destino)
                                        ->whereIn('puerto_id', $puertosNac)
                                        ->get();

            $aterrizajesInt = \App\Aterrizaje::whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta))
                                        ->where('cliente_id', $cliente->id)
                                        ->where('aeropuerto_id', session('aeropuerto')->id)
                                        ->where('puerto_id', ($procedencia==0)?'>=':'=', $procedencia)
                                        ->whereIn('puerto_id', $puertosInt)
                                        ->get();
            $despeguesInt = \App\Despegue::whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta))
                                        ->where('cliente_id', $cliente->id)
                                        ->where('aeropuerto_id', session('aeropuerto')->id)
                                        ->where('puerto_id', ($destino==0)?'>=':'=', $destino)
                                        ->whereIn('puerto_id', $puertosInt)
                                        ->get();

            if ($aterrizajesNac->count() != 0 || $aterrizajesInt->count() != 0 || $despeguesNac->count() != 0 || $despeguesInt->count()!= 0){
                $datosCliente[$cliente->nombre]=[
                    'desAdulNac'      => 0,
                    'desInfNac'       => 0,
                    'desTercNac'      => 0,

                    'EmbAdulNac'      => 0,
                    'EmbInfNac'       => 0,
                    'EmbTercNac'      => 0,
                    'TranAdulNac'     => 0,
                    'TranInfNac'      => 0,
                    'TranTercNac'     => 0,
                    'cargaEmbNac'     => 0,
                    'cargaDesNac'     => 0,
                    'aeroAterrizaNac' => 0,
                    'aeroDespegueNac' => 0,

                    'desAdulInt'      => 0,
                    'desInfInt'       => 0,
                    'desTercInt'      => 0,

                    'EmbAdulInt'      => 0,
                    'EmbInfInt'       => 0,
                    'EmbTercInt'      => 0,
                    'TranAdulInt'     => 0,
                    'TranInfInt'      => 0,
                    'TranTercInt'     => 0,
                    'cargaEmbInt'     => 0,
                    'cargaDesInt'     => 0,
                    'aeroAterrizaInt' => 0,
                    'aeroDespegueInt' => 0,
                ];

                if ($aterrizajesNac->count() != 0 || $aterrizajesInt->count() != 0){
                    $datosCliente[$cliente->nombre]['aeroAterrizaNac'] = $aterrizajesNac->count();
                    $datosCliente[$cliente->nombre]['aeroAterrizaInt'] = $aterrizajesInt->count();
                    foreach ($aterrizajesNac as $aterrizajeNac) {
                            $datosCliente[$cliente->nombre]['desAdulNac'] += $aterrizajeNac->desembarqueAdultos;
                            $datosCliente[$cliente->nombre]['desInfNac']  += $aterrizajeNac->desembarqueInfante;
                            $datosCliente[$cliente->nombre]['desTercNac'] += $aterrizajeNac->desembarqueTercera;
                    }
                    foreach ($aterrizajesInt as $aterrizajeInt) {
                            $datosCliente[$cliente->nombre]['desAdulInt'] += $aterrizajeInt->desembarqueAdultos;
                            $datosCliente[$cliente->nombre]['desInfInt']  += $aterrizajeInt->desembarqueInfante;
                            $datosCliente[$cliente->nombre]['desTercInt'] += $aterrizajeInt->desembarqueTercera;
                    }
                }
                if ($despeguesNac->count() != 0 || $despeguesInt->count() != 0){
                    $datosCliente[$cliente->nombre]['aeroDespegueNac'] = $despeguesNac->count();
                    $datosCliente[$cliente->nombre]['aeroDespegueInt'] = $despeguesInt->count();
                    foreach ($despeguesNac as $despegueNac) {
                            $datosCliente[$cliente->nombre]['EmbAdulNac']  += $despegueNac->embarqueAdultos;
                            $datosCliente[$cliente->nombre]['EmbInfNac']   += $despegueNac->embarqueInfantes;
                            $datosCliente[$cliente->nombre]['EmbTercNac']  += $despegueNac->embarqueTercera;
                            $datosCliente[$cliente->nombre]['TranAdulNac'] += $despegueNac->transitoAdultos;
                            $datosCliente[$cliente->nombre]['TranInfNac']  += $despegueNac->transitoInfantes;
                            $datosCliente[$cliente->nombre]['TranTercNac'] += $despegueNac->transitoTercera;
                            $datosCliente[$cliente->nombre]['cargaEmbNac'] += $despegueNac->peso_embarcado;
                            $datosCliente[$cliente->nombre]['cargaDesNac'] += $despegueNac->peso_desembarcado;
                    }
                    foreach ($despeguesInt as $despegueInt) {
                            $datosCliente[$cliente->nombre]['EmbAdulInt']  += $despegueInt->embarqueAdultos;
                            $datosCliente[$cliente->nombre]['EmbInfInt']   += $despegueInt->embarqueInfantes;
                            $datosCliente[$cliente->nombre]['EmbTercInt']  += $despegueInt->embarqueTercera;
                            $datosCliente[$cliente->nombre]['TranAdulInt'] += $despegueInt->transitoAdultos;
                            $datosCliente[$cliente->nombre]['TranInfInt']  += $despegueInt->transitoInfantes;
                            $datosCliente[$cliente->nombre]['TranTercInt'] += $despegueInt->transitoTercera;
                            $datosCliente[$cliente->nombre]['cargaEmbInt'] += $despegueInt->peso_embarcado;
                            $datosCliente[$cliente->nombre]['cargaDesInt'] += $despegueInt->peso_desembarcado;
                    }
                }
            }

        }
        return view('reportes.reporteTraficoAereo', compact('datosCliente', 'cliente', 'procedenciaNombre', 'destinoNombre', 'aeropuerto','procedencia', 'destino', 'clientes',  'diaDesde', 'mesDesde', 'annoDesde', 'diaHasta', 'mesHasta', 'annoHasta'));
    }

    public function getReporteRelacionIngresoMensual(Request $request){
        $anno        =$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto  =$request->get('aeropuerto',  0);
        $montosMeses =[];
        $metaGobernacion =\App\Meta::join('meta_detalles', 'metas.id', '=', 'meta_detalles.meta_id')->where('fecha_fin', null)->sum('gobernacion_meta');
        $meses=[
            1  =>"ENERO",
            2  =>"FEBRERO",
            3  =>"MARZO",
            4  =>"ABRIL",
            5  =>"MAYO",
            6  =>"JUNIO",
            7  =>"JULIO",
            8  =>"AGOSTO",
            9  =>"SEPTIEMBRE",
            10 =>"OCTUBRE",
            11 =>"NOVIEMBRE",
            12 =>"DICIEMBRE"
        ];
        for($i=1;$i<=12; $i++){
                $diaMes=\Carbon\Carbon::create($anno, $i,1);
                $cobrosPZO=\App\Cobro::where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('cobros.aeropuerto_id','1')
                ->get();

                $cobrosCBL=\App\Cobro::where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('cobros.aeropuerto_id','2')
                ->get();

                $cobrosSNV=\App\Cobro::where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('cobros.aeropuerto_id','3')
                ->get();

            $montosMeses[$meses[$diaMes->month]]=[
                    "cobradoPZO"   =>0,
                    "cobradoCBL"   =>0,
                    "cobradoSNV"   =>0,
                    "cobradoTotal" =>0
                ];


            foreach ($cobrosPZO as $cobroPZO) {
                $montosMeses[$meses[$diaMes->month]]["cobradoPZO"]+=$cobroPZO->montodepositado;
            }

            foreach ($cobrosCBL as $cobroCBL) {
                $montosMeses[$meses[$diaMes->month]]["cobradoCBL"]+=$cobroCBL->montodepositado;
            }

            foreach ($cobrosSNV as $cobroSNV) {
                $montosMeses[$meses[$diaMes->month]]["cobradoSNV"]+=$cobroSNV->montodepositado;
            }

            $montosMeses[$meses[$diaMes->month]]["cobradoTotal"]+=$montosMeses[$meses[$diaMes->month]]["cobradoPZO"]+$montosMeses[$meses[$diaMes->month]]["cobradoCBL"]+$montosMeses[$meses[$diaMes->month]]["cobradoSNV"];

        }
        $mesActual    =$meses[\Carbon\Carbon::now()->month];

        return view('reportes.reporteRelacionIngresoMensual', compact('montosMeses', 'anno', 'mesActual', 'metaGobernacion'));
    }

    public function getReporteDeMorosidad(Request $request){
        $anno           =$request->get('annoDesde',  \Carbon\Carbon::now()->year);
        $aeropuerto     =$request->get('aeropuerto', session('aeropuerto')->id);

        $modulos        = \App\Modulo::where('aeropuerto_id', $aeropuerto)->lists('nombre', 'id');
        $clientes       = \App\Cliente::get();
        $totales        =[];
        $totalesCliente =[];

        foreach ($modulos as $idModulo => $modulo) {
            $totales[$modulo] = \App\Factura::where('aeropuerto_id', $aeropuerto)
                                    ->where('modulo_id', $idModulo)
                                    ->where('condicionPago', 'Crédito')
                                    ->where('estado', 'P')
                                    ->sum('total');
        }

        /*foreach ($modulos as $idModulo => $modulo) {
            foreach ($clientes as $cliente) {
                $totalesCliente[$modulo][$cliente->nombre]= \App\Factura::where('aeropuerto_id', $aeropuerto)
                                                        ->where('modulo_id', $idModulo)
                                                        ->where('condicionPago', 'Crédito')
                                                        ->where('estado', 'P')
                                                        ->where('cliente_id', $cliente->id)
                                                        ->sum('total');
            }
        }*/

        $meses=[
            1  =>"ENERO",
            2  =>"FEBRERO",
            3  =>"MARZO",
            4  =>"ABRIL",
            5  =>"MAYO",
            6  =>"JUNIO",
            7  =>"JULIO",
            8  =>"AGOSTO",
            9  =>"SEPTIEMBRE",
            10 =>"OCTUBRE",
            11 =>"NOVIEMBRE",
            12 =>"DICIEMBRE"
        ];

        $clienteFacturaMes=[];

        foreach ($modulos as $idModulo => $modulo) {
            foreach ($clientes as $cliente) {
                for($i=1;$i<=12; $i++){
                    $diaMes=\Carbon\Carbon::create($anno, $i,1);
                    $clienteFacturaMes[$modulo][$meses[$i]][$cliente->nombre]= \App\Factura::where('aeropuerto_id', $aeropuerto)
                                                            ->where('modulo_id', $idModulo)
                                                            ->where('condicionPago', 'Crédito')
                                                            ->where('estado', 'P')
                                                            ->where('cliente_id', $cliente->id)
                                                            ->where('fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                                                            ->where('fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                                                            ->sum('total');
                }
            }
        }



        return view('reportes.reporteReporteDeMorosidad', compact('anno', 'aeropuerto', 'meses', 'modulos', 'totales', 'totalesCliente', 'clienteFacturaMes'));
    }

    public function getReporteRelacionMensualDeFacturacionCobradosYPorCobrar(Request $request){
        $anno        =$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto  =$request->get('aeropuerto',  session('aeropuerto')->id);
        $montosMeses =[];
        $meses=[
            1  =>"ENERO",
            2  =>"FEBRERO",
            3  =>"MARZO",
            4  =>"ABRIL",
            5  =>"MAYO",
            6  =>"JUNIO",
            7  =>"JULIO",
            8  =>"AGOSTO",
            9  =>"SEPTIEMBRE",
            10 =>"OCTUBRE",
            11 =>"NOVIEMBRE",
            12 =>"DICIEMBRE"
        ];
        for($i=1;$i<=12; $i++){
            $diaMes=\Carbon\Carbon::create($anno, $i,1);

            //Cobrado
            $cobros=\App\Cobro::where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
            ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
            ->where('cobros.aeropuerto_id',$aeropuerto)
            ->get();

            //Facturas por Cobrar
            $facturasPorCobrar=\App\Factura::where('facturas.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
            ->where('facturas.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
            ->where('facturas.aeropuerto_id',$aeropuerto)
            ->where('estado', 'P')
            ->where('facturas.deleted_at', null)
            ->get();

            //Facturación
            $facturas=\App\Factura::where('facturas.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
            ->where('facturas.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
            ->where('facturas.aeropuerto_id',$aeropuerto)
            ->where('facturas.deleted_at', null)
            ->get();

            $cobrosAnteriores=\App\Cobro::join('cobro_factura', 'cobros.id', '=', 'cobro_factura.factura_id')
            ->join('facturas', 'cobro_factura.factura_id', '=', 'facturas.id')
            ->where('facturas.fecha', '<',$diaMes->startOfMonth()->toDateTimeString())
            ->where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
            ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
            ->where('cobros.aeropuerto_id', $aeropuerto)
            ->get();

            $montosMeses[$meses[$diaMes->month]]=[
                    "facturado"     =>0,
                    "cobrado"       =>0,
                    "porCobrar"     =>0,
                    "cobroAnterior" =>0
                ];

            foreach ($facturas as $factura) {
                $montosMeses[$meses[$diaMes->month]]["facturado"]+=$factura->total;
            }
            foreach ($facturasPorCobrar as $facturaPorCobrar) {
                $montosMeses[$meses[$diaMes->month]]["porCobrar"]+=$facturaPorCobrar->total;
            }

            foreach ($cobros as $cobro) {
                $montosMeses[$meses[$diaMes->month]]["cobrado"]+=$cobro->montodepositado;
            }

            foreach ($cobrosAnteriores as $cobroAnterior) {
                $montosMeses[$meses[$diaMes->month]]["cobroAnterior"]+=$cobro->montodepositado;
            }
        }

        $aeropuertoNombre=\App\Aeropuerto::find($aeropuerto)->nombre;

        return view('reportes.reporteRelacionMensualDeFacturacionCobradosYPorCobrar', compact('montosMeses', 'anno', 'aeropuerto', 'aeropuertoNombre'));
    }


//Relación de Estacionamiento Diario
    public function getReporteRelacionEstacionamientoDiario(Request $request){
        $mes        =$request->get('mes', \Carbon\Carbon::now()->month);
        $anno       =$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto =$request->get('aeropuerto', session('aeropuerto')->id)+0;
        $estacionamientoDiario=[];
        $primerDiaMes=\Carbon\Carbon::create($anno, $mes,1)->startOfMonth();
        $ultimoDiaMes=\Carbon\Carbon::create($anno, $mes,1)->endOfMonth();
        for(;$primerDiaMes<=$ultimoDiaMes; $primerDiaMes->addDay()){

            $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]=[
                "ticketEstacionamiento"      =>0,
                "baseTicketEstacionamiento"  =>0,
                "ivaTicketEstacionamiento"   =>0,
                "totalTicketEstacionamiento" =>0,
                "ticketPernocta"             =>0,
                "baseTicketPernocta"         =>0,
                "ivaTicketPernocta"          =>0,
                "totalTicketPernocta"        =>0,
                "ticketExtraviado"           =>0,
                "baseTicketExtraviado"       =>0,
                "ivaTicketExtraviado"        =>0,
                "totalTicketExtraviado"      =>0,
                "totalTicketExtraviado"      =>0,
                "totalTicketExtraviado"      =>0,
                "totalTicketExtraviado"      =>0,
                "baseTotal"                  =>0,
                "ivaTotal"                   =>0,
                "montoTotal"                 =>0,
                "deposito"                   =>0,
                "baseTarjetas"               =>0,
                "ivaTarjetas"                =>0,
                "totalTarjetas"              =>0
            ];

            $iva=\App\Concepto::where('nompre', 'ESTACIONAMIENTO DE VEHICULOS')->where('aeropuerto_id', $aeropuerto)->first()->iva;

            $estacionamientos=\App\Estacionamientoopticket::join('estacionamientoops', 'estacionamientooptickets.estacionamientoop_id', '=', 'estacionamientoops.id')
                                                        ->join('estacionamientoopticketsdepositos', 'estacionamientoops.id', '=', 'estacionamientoopticketsdepositos.estacionamientoop_id')
                                                        ->where('estacionamientoops.fecha' ,$primerDiaMes)
                                                        ->get();

            $estacionamientosTarjetas=\App\Estacionamientooptarjeta::where('estacionamientooptarjetas.fecha' ,$primerDiaMes)
                                                        ->get();

            foreach ($estacionamientos as $estacionamiento) {


                if($estacionamiento->econcepto_id=='8' || $estacionamiento->econcepto_id=='11'|| $estacionamiento->econcepto_id=='13'){
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ticketEstacionamiento"]      +=$estacionamiento->cantidad;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"]   +=($estacionamiento->monto)*$iva/100;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"] +=$estacionamiento->monto;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["baseTicketEstacionamiento"]  =$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"]-$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"];

                }
                if($estacionamiento->econcepto_id=='10'){
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ticketEstacionamiento"]      +=$estacionamiento->cantidad;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"]   +=($estacionamiento->monto)*$iva/100;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"] +=$estacionamiento->monto;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["baseTicketEstacionamiento"]  =$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"]-$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"];

                }
                if($estacionamiento->econcepto_id=='9'){
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ticketEstacionamiento"]      +=$estacionamiento->cantidad;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"]   +=($estacionamiento->monto)*$iva/100;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"] +=$estacionamiento->monto;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["baseTicketEstacionamiento"]  =$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"]-$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"];

                }

                $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["deposito"]   =$estacionamiento->deposito;
                $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["montoTotal"] =$estacionamiento->total;
                $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTotal"]   =($estacionamiento->total)*$iva/100;
                $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["baseTotal"]  =$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["montoTotal"]-$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTotal"];


            }

            foreach ($estacionamientosTarjetas as $tarjetas) {
                        $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTarjetas"]   +=($tarjetas->total)*$iva/100;
                        $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTarjetas"] +=$tarjetas->total;
                        $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["baseTarjetas"]  =$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTarjetas"]-$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTarjetas"];
            }

        }

        $aeropuertoNombre=\App\Aeropuerto::find($aeropuerto)->nombre;
        return view('reportes.reporteRelacionEstacionamientoDiario', compact('mes', 'mesNombre', 'anno', 'aeropuerto', 'aeropuertoNombre', 'estacionamientoDiario'));
    }

//Reporte Diario de Ingresos
    public function getReporteDiarioIngreso(Request $request){
        $mes        =$request->get('mes', \Carbon\Carbon::now()->month);
        $anno       =$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto =$request->get('aeropuerto', session('aeropuerto')->id)+0;
        $ingresoDiario=[];
        $primerDiaMes=\Carbon\Carbon::create($anno, $mes,1)->startOfMonth();
        $ultimoDiaMes=\Carbon\Carbon::create($anno, $mes,1)->endOfMonth();
        for(;$primerDiaMes<=$ultimoDiaMes; $primerDiaMes->addDay()){

            $ingresoDiario[$primerDiaMes->format('d/m/Y')]=[
                "ticketEstacionamiento"      =>0,
                "baseTicketEstacionamiento"  =>0,
                "ivaTicketEstacionamiento"   =>0,
                "totalTicketEstacionamiento" =>0,
                "ticketPernocta"             =>0,
                "baseTicketPernocta"         =>0,
                "ivaTicketPernocta"          =>0,
                "totalTicketPernocta"        =>0,
                "ticketExtraviado"           =>0,
                "baseTicketExtraviado"       =>0,
                "ivaTicketExtraviado"        =>0,
                "totalTicketExtraviado"      =>0,
                "totalTicketExtraviado"      =>0,
                "totalTicketExtraviado"      =>0,
                "totalTicketExtraviado"      =>0,
                "baseTotal"                  =>0,
                "ivaTotal"                   =>0,
                "montoTotal"                 =>0,
                "deposito"                   =>0
            ];

            $iva=\App\Concepto::where('nompre', 'ESTACIONAMIENTO DE VEHICULOS')->where('aeropuerto_id', $aeropuerto)->first()->iva;

            $estacionamientos=\App\Estacionamientoopticket::join('estacionamientoops', 'estacionamientooptickets.estacionamientoop_id', '=', 'estacionamientoops.id')
                                                        ->join('estacionamientoopticketsdepositos', 'estacionamientoops.id', '=', 'estacionamientoopticketsdepositos.estacionamientoop_id')
                                                        ->where('estacionamientoops.fecha' ,$primerDiaMes)
                                                        ->get();

            foreach ($estacionamientos as $estacionamiento) {


                if($estacionamiento->econcepto_id=='8' || $estacionamiento->econcepto_id=='11'|| $estacionamiento->econcepto_id=='13'){
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ticketEstacionamiento"]      +=$estacionamiento->cantidad;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"]   +=($estacionamiento->monto)*$iva/100;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"] +=$estacionamiento->monto;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["baseTicketEstacionamiento"]  =$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"]-$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"];

                }
                if($estacionamiento->econcepto_id=='10'){
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ticketEstacionamiento"]      +=$estacionamiento->cantidad;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"]   +=($estacionamiento->monto)*$iva/100;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"] +=$estacionamiento->monto;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["baseTicketEstacionamiento"]  =$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"]-$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"];

                }
                if($estacionamiento->econcepto_id=='9'){
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ticketEstacionamiento"]      +=$estacionamiento->cantidad;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"]   +=($estacionamiento->monto)*$iva/100;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"] +=$estacionamiento->monto;
                    $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["baseTicketEstacionamiento"]  =$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["totalTicketEstacionamiento"]-$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTicketEstacionamiento"];

                }

                $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["deposito"]   =$estacionamiento->deposito;
                $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["montoTotal"] =$estacionamiento->total;
                $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTotal"]   =($estacionamiento->total)*$iva/100;
                $estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["baseTotal"]  =$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["montoTotal"]-$estacionamientoDiario[$primerDiaMes->format('d/m/Y')]["ivaTotal"];
            }

        }

        return view('reportes.reporteRelacionEstacionamientoDiario', compact('mes', 'anno', 'aeropuerto', 'estacionamientoDiario'));
    }

    //DES 900
    public function getReporteDES900(Request $request){
        $diaDesde   =$request->get('diaDesde', \Carbon\Carbon::now()->day);
        $mesDesde   =$request->get('mesDesde', \Carbon\Carbon::now()->month);
        $annoDesde  =$request->get('annoDesde',  \Carbon\Carbon::now()->year);
        $diaHasta   =$request->get('diaHasta', \Carbon\Carbon::now()->day);
        $mesHasta   =$request->get('mesHasta', \Carbon\Carbon::now()->month);
        $annoHasta  =$request->get('annoHasta',  \Carbon\Carbon::now()->year);
        $aeropuerto =session('aeropuerto');
        $aterrizajes = \App\Aterrizaje::whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta))->lists('id');
        $despegues  = \App\Despegue::with("factura", "aterrizaje")
                                ->where('aeropuerto_id', session('aeropuerto')->id)
                                ->whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta) )
                                ->OrwhereIn('aterrizaje_id', $aterrizajes)
                                ->orderBy('fecha')
                                ->get();

        return view('reportes.reporteDES900', compact('diaDesde', 'mesDesde', 'annoDesde', 'diaHasta', 'mesHasta', 'annoHasta', 'aeropuerto', 'despegues'));
    }

    //Formularios Anulados
    public function getFormulariosAnulados(Request $request){
        $mes          =$request->get('mes', \Carbon\Carbon::now()->month);
        $anno         =$request->get('anno',  \Carbon\Carbon::now()->year);
        $primerDiaMes =\Carbon\Carbon::create($anno, $mes,1)->startOfMonth();
        $ultimoDiaMes =\Carbon\Carbon::create($anno, $mes,1)->endOfMonth();
        $aeropuerto   =$request->get('aeropuerto', session('aeropuerto')->id);
        $recibosAnulados = \App\RecibosAnulado::where('fecha', '<=', $primerDiaMes)
                                                ->where('fecha', '=>', $ultimoDiaMes)
                                                ->where('aeropuerto_id', $aeropuerto)
                                                ->get();
        $facturasAnuladas = \App\Factura::onlyTrashed()
                                        ->where('fecha', '<=', $primerDiaMes)
                                        ->where('fecha', '=>', $ultimoDiaMes)
                                        ->where('aeropuerto_id', $aeropuerto)
                                        ->get();

        $mes = (int)$mes;
        $meses=[
            01=>"ENERO",
            02=>"FEBRERO",
            03=>"MARZO",
            04=>"ABRIL",
            05=>"MAYO",
            06=>"JUNIO",
            07=>"JULIO",
            08=>"AGOSTO",
            09=>"SEPTIEMBRE",
            10=>"OCTUBRE",
            11=>"NOVIEMBRE",
            12=>"DICIEMBRE"];

        $mesLetras = $meses[$mes];

        return view('reportes.reporteFormulariosAnulados', compact('mes', 'mesLetras', 'anno', 'aeropuerto', 'recibosAnulados', 'facturasAnuladas'));
    }

    //Listado de Clientes
    public function getListadoClientes(Request $request){
        $tipo = $request->get('tipo');
        if($tipo == 'TODOS'){
            $clientes = \App\Cliente::all();
        }else{
            $clientes = \App\Cliente::where('tipo', $tipo)->get();
        }
        return view('reportes.reporteListadoClientes', compact('clientes', 'tipo'));
    }

    //Relacion de Ingresos Aeronáuticos de Contado
    public function getReporteRelacionIngresosAeronauticosContado(Request $request){
        $modulos          =\App\Modulo::where('nombre', 'DOSAS')->lists('nombre','id');
        $mes              =$request->get('mes', \Carbon\Carbon::now()->month);
        $anno             =$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto       =session('aeropuerto')->id;
        $primerDiaMes     =\Carbon\Carbon::create($anno, $mes,1)->startOfMonth();
        $ultimoDiaMes     =\Carbon\Carbon::create($anno, $mes,1)->endOfMonth();



        $formulario      =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'FORMULARIO DOSA')->first();
        $aterrizaje      =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'ATERRIZAJE Y DESPEGUE DE AERONAVES')->first();
        $estacionamiento =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'ESTACIONAMIENTO DE AERONAVES')->first();
        $habilitacion    =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'HABILITACION')->first();
        $jetway          =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'JETWAY')->first();
        $carga           =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'CARGA')->first();

        $facturas = \App\Factura::with('detalles')
                             ->where('facturas.nroDosa', '<>', 'NULL')
                             ->where('facturas.aeropuerto_id', $aeropuerto)
                             ->where('facturas.fecha','>=' ,$primerDiaMes)
                             ->where('facturas.fecha','<=' ,$ultimoDiaMes)
                             ->where('facturas.condicionPago', 'Contado')
                             ->where('facturas.estado', 'C')
                            ->get();
        /*$tasas = \App\Tasaopdetalle::join('tasaops', 'tasaopdetalles.tasaop_id', '=', 'tasaops.id')
                                ->where('tasaops.fecha','>=' ,$primerDiaMes)
                                ->where('tasaops.fecha','<=' ,$ultimoDiaMes)
                                ->where('tasaops.aeropuerto_id', $aeropuerto)
                                ->get();


        $tasasNac = $tasas->where('serie', 'C1');
        $tasasInt = $tasas->where('serie', 'C2');*/

        $dosaFactura = [];

        foreach ($facturas as $factura) {

            $cobros = \App\Cobro::join('cobro_factura', 'cobros.id', '=', 'cobro_factura.cobro_id')
                                    ->where('cobro_factura.factura_id', $factura->id)
                                    ->first();


            $dosaFactura[$factura->nroDosa]=[
                "fecha"             =>0,
                "formulario"        =>0,
                "aterrizaje"        =>0,
                "estacionamiento"   =>0,
                "habilitacion"      =>0,
                "jetway"            =>0,
                "carga"             =>0,
                "otros"             =>0,
                "tasaNacional"      =>0,
                "tasaInternacional" =>0,
                "montoFacturado"    =>0,
                "montoDepositado"   =>0,
                "nroCobro"          =>0
            ];

            $dosaFactura[$factura->nroDosa]["nroCobro"]        =$cobros->id;
            $dosaFactura[$factura->nroDosa]["fecha"]           =$factura->fecha;
            $dosaFactura[$factura->nroDosa]["montoFacturado"]  =$cobros->montofacturas;
            $dosaFactura[$factura->nroDosa]["montoDepositado"] =$cobros->montodepositado;

            foreach ($factura->detalles as $detalle) {
                if($detalle->concepto_id == $formulario->id){
                    $dosaFactura[$factura->nroDosa]["formulario"]=$detalle->totalDes;
                }elseif($detalle->concepto_id == $aterrizaje->id){
                    $dosaFactura[$factura->nroDosa]["aterrizaje"]=$detalle->totalDes;
                }elseif($detalle->concepto_id == $estacionamiento->id){
                    $dosaFactura[$factura->nroDosa]["estacionamiento"]=$detalle->totalDes;
                }elseif($detalle->concepto_id == $habilitacion->id){
                    $dosaFactura[$factura->nroDosa]["habilitacion"]=$detalle->totalDes;
                }elseif($detalle->concepto_id == $jetway->id){
                    $dosaFactura[$factura->nroDosa]["jetway"]=$detalle->totalDes;
                }elseif($detalle->concepto_id == $carga->id){
                    $dosaFactura[$factura->nroDosa]["carga"]=$detalle->totalDes;
                }else{
                    $dosaFactura[$factura->nroDosa]["otros"]=$detalle->totalDes;
                }
            }
       /*     foreach ($tasasNac as $tNac) {
                $dosaFactura[$factura->nroDosa]["tasaNacional"]+=$tNac->total;
            }

            foreach ($tasasInt as $tInt) {
                $dosaFactura[$factura->nroDosa]["tasaInternacional"]+=$tInt->total;
            }*/
        }

        $meses=[
            01=>"ENERO",
            02=>"FEBRERO",
            03=>"MARZO",
            04=>"ABRIL",
            05=>"MAYO",
            06=>"JUNIO",
            07=>"JULIO",
            08=>"AGOSTO",
            09=>"SEPTIEMBRE",
            10=>"OCTUBRE",
            11=>"NOVIEMBRE",
            12=>"DICIEMBRE"];

        $mesLetras = $meses[(int)$mes];
        $aeropuertoNombre = \App\Aeropuerto::where('id', $aeropuerto)->first()->nombre;

        
        
        return view('reportes.reporteRelacionIngresosAeronauticosContado', compact('dosaFactura', 'aeropuertoNombre', 'mes', 'mesLetras', 'anno', 'aeropuerto'));

    }


    //Relación de Cobranza.
    public function getReporteRelacionCobranza(Request $request){
        $modulos          =\App\Modulo::where('aeropuerto_id', session('aeropuerto')->id )->lists('nombre','id');
        $clientes         =\App\Cliente::all();
        $mes              =$request->get('mes', \Carbon\Carbon::now()->month);
        $anno             =$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto       =$request->get('aeropuerto')+0;
        $cliente          =$request->get('cliente')+0;
        $modulo           =$request->get('modulo')+0;
        if($aeropuerto!=0){
            $moduloNombre =($modulo==0)?'TODOS':\App\Modulo::where('id', $modulo)->first()->nombre;
            if($moduloNombre!='TODOS'){
                $modulo=\App\Modulo::where('nombre', $moduloNombre)->where('aeropuerto_id', $aeropuerto)->first()->id;
            }
        }
        else{
            $moduloNombre     =($modulo==0)?'TODOS':\App\Modulo::where('id', $modulo)->first()->nombre;

        }
        $clienteNombre    =($cliente==0)?'TODOS':(\App\Cliente::where('id', $cliente)->first()->nombre);
        $aeropuertoNombre =($aeropuerto==0)?'TODOS':(\App\Aeropuerto::where('id', $aeropuerto)->first()->nombre);
        $primerDiaMes     =\Carbon\Carbon::create($anno, $mes,1)->startOfMonth();
        $ultimoDiaMes     =\Carbon\Carbon::create($anno, $mes,1)->endOfMonth();
        $recibos=\App\Cobro::with('pagos','facturas')
                              ->where('fecha','>=' ,$primerDiaMes)
                              ->where('fecha','<=' ,$ultimoDiaMes)
                              ->where('aeropuerto_id',($aeropuerto==0)?">":"=", $aeropuerto)
                              ->where('cobros.modulo_id',($modulo==0)?">":"=", $modulo)
                              ->where('cobros.cliente_id',($cliente==0)?">":"=", $cliente)
                              ->orderBy('fecha', 'ASC', 'facturas.nFactura', 'ASC')
                              ->get();

        $totalFacturas   =$recibos->sum('montofacturas');
        $totalDepositado =$recibos->sum('montodepositado');
        return view('reportes.reporteRelacionCobranza', compact('mes', 'anno', 'aeropuerto', 'modulo', 'recibos', 'modulos', 'clientes', 'cliente', 'totalFacturas', 'totalDepositado', 'moduloNombre', 'clienteNombre', 'aeropuertoNombre'));

    }

    public function getReporteRelacionMetaRecaudacionMensual(Request $request){
        $anno            =$request->get('anno',  \Carbon\Carbon::now()->year);
        $metaSaarPZO =\App\Meta::join('meta_detalles', 'metas.id', '=', 'meta_detalles.meta_id')
                                    ->where('fecha_fin', null)
                                    ->where('aeropuerto_id', 1)
                                    ->sum('saar_meta');
        $metaSaarCBL =\App\Meta::join('meta_detalles', 'metas.id', '=', 'meta_detalles.meta_id')
                                    ->where('fecha_fin', null)
                                    ->where('aeropuerto_id', 2)
                                    ->sum('saar_meta');
        $metaSaarSNV =\App\Meta::join('meta_detalles', 'metas.id', '=', 'meta_detalles.meta_id')
                                    ->where('fecha_fin', null)
                                    ->where('aeropuerto_id', 3)
                                    ->sum('saar_meta');

        $montosMeses =[];
        $meses=[
            1=>"ENERO",
            2=>"FEBRERO",
            3=>"MARZO",
            4=>"ABRIL",
            5=>"MAYO",
            6=>"JUNIO",
            7=>"JULIO",
            8=>"AGOSTO",
            9=>"SEPTIEMBRE",
            10=>"OCTUBRE",
            11=>"NOVIEMBRE",
            12=>"DICIEMBRE"];
       for($i=1;$i<=12; $i++){
                $diaMes=\Carbon\Carbon::create($anno, $i,1);

                //Cobrado
                $cobrosPZO=\App\Cobro::where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('cobros.aeropuerto_id','1')
                ->get();

                $cobrosCBL=\App\Cobro::where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('cobros.aeropuerto_id','2')
                ->get();

                $cobrosSNV=\App\Cobro::where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('cobros.aeropuerto_id','3')
                ->get();

            $montosMeses[$meses[$diaMes->month]]=[
                    "metaPZO"         =>0,
                    "recaudadoPZO"    =>0,
                    "diferenciaPZO"   =>0,
                    "metaCBL"         =>0,
                    "recaudadoCBL"    =>0,
                    "diferenciaCBL"   =>0,
                    "metaSNV"         =>0,
                    "recaudadoSNV"    =>0,
                    "diferenciaSNV"   =>0,
                    "metaTotal"       =>0,
                    "recaudadoTotal"  =>0,
                    "diferenciaTotal" =>0,
                ];

            $montosMeses[$meses[$diaMes->month]]["metaPZO"]+=$metaSaarPZO/12;
            $montosMeses[$meses[$diaMes->month]]["metaCBL"]+=$metaSaarCBL/12;
            $montosMeses[$meses[$diaMes->month]]["metaSNV"]+=$metaSaarSNV/12;

            foreach ($cobrosPZO as $cobroPZO) {
                $montosMeses[$meses[$diaMes->month]]["recaudadoPZO"]+=$cobroPZO->montodepositado;
            }

            foreach ($cobrosCBL as $cobroCBL) {
                $montosMeses[$meses[$diaMes->month]]["recaudadoCBL"]+=$cobroCBL->montodepositado;
            }

            foreach ($cobrosSNV as $cobroSNV) {
                $montosMeses[$meses[$diaMes->month]]["recaudadoSNV"]+=$cobroSNV->montodepositado;
            }

            $montosMeses[$meses[$diaMes->month]]["diferenciaPZO"]   =$montosMeses[$meses[$diaMes->month]]["recaudadoPZO"]-$montosMeses[$meses[$diaMes->month]]["metaPZO"];
            $montosMeses[$meses[$diaMes->month]]["diferenciaCBL"]   =$montosMeses[$meses[$diaMes->month]]["recaudadoCBL"]-$montosMeses[$meses[$diaMes->month]]["metaCBL"];
            $montosMeses[$meses[$diaMes->month]]["diferenciaSNV"]   =$montosMeses[$meses[$diaMes->month]]["recaudadoSNV"]-$montosMeses[$meses[$diaMes->month]]["metaSNV"];
            $montosMeses[$meses[$diaMes->month]]["metaTotal"]       =$montosMeses[$meses[$diaMes->month]]["metaPZO"]+$montosMeses[$meses[$diaMes->month]]["metaCBL"]+$montosMeses[$meses[$diaMes->month]]["metaSNV"];
            $montosMeses[$meses[$diaMes->month]]["recaudadoTotal"]  =$montosMeses[$meses[$diaMes->month]]["recaudadoPZO"]+$montosMeses[$meses[$diaMes->month]]["recaudadoCBL"]+$montosMeses[$meses[$diaMes->month]]["recaudadoSNV"];
            $montosMeses[$meses[$diaMes->month]]["diferenciaTotal"] =$montosMeses[$meses[$diaMes->month]]["diferenciaPZO"]+$montosMeses[$meses[$diaMes->month]]["diferenciaCBL"]+$montosMeses[$meses[$diaMes->month]]["diferenciaSNV"];
        }
        return view('reportes.reporteRelacionMetaRecaudacionMensual', compact('montosMeses', 'anno', 'metaSaarSNV', 'metaSaarCBL', 'metaSaarPZO'));
    }

    public function getReporteRelacionMensualDeIngresosRecaudacionPendiente(Request $request){
        $anno=$request->get('anno',  \Carbon\Carbon::now()->year);
        $montosMeses=[];
        $meses=[
            1=>"ENERO",
            2=>"FEBRERO",
            3=>"MARZO",
            4=>"ABRIL",
            5=>"MAYO",
            6=>"JUNIO",
            7=>"JULIO",
            8=>"AGOSTO",
            9=>"SEPTIEMBRE",
            10=>"OCTUBRE",
            11=>"NOVIEMBRE",
            12=>"DICIEMBRE"];
       for($i=1;$i<=12; $i++){
                $diaMes=\Carbon\Carbon::create($anno, $i,1);

                //Cobrado
                $cobrosPZO=\App\Cobro::where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('cobros.aeropuerto_id','1')
                ->get();

                $cobrosCBL=\App\Cobro::where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('cobros.aeropuerto_id','2')
                ->get();

                $cobrosSNV=\App\Cobro::where('cobros.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('cobros.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('cobros.aeropuerto_id','3')
                ->get();

                //Facturas por Cobrar
                $facturasPZO=\App\Factura::where('facturas.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('facturas.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('facturas.aeropuerto_id','1')
                ->where('estado', 'P')
                ->where('facturas.deleted_at', null)
                ->get();
                $facturasCBL=\App\Factura::where('facturas.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('facturas.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('facturas.aeropuerto_id','2')
                ->where('estado', 'P')
                ->where('facturas.deleted_at', null)
                ->get();
                $facturasSNV=\App\Factura::where('facturas.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('facturas.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('facturas.aeropuerto_id','3')
                ->where('estado', 'P')
                ->where('facturas.deleted_at', null)
                ->get();

            $montosMeses[$meses[$diaMes->month]]=[
                    "cobradoPZO"     =>0,
                    "porCobrarPZO"   =>0,
                    "cobradoCBL"     =>0,
                    "porCobrarCBL"   =>0,
                    "cobradoSNV"     =>0,
                    "porCobrarSNV"   =>0,
                    "cobradoTotal"   =>0,
                    "porCobrarTotal" =>0,
                ];

            foreach ($cobrosPZO as $cobroPZO) {
                $montosMeses[$meses[$diaMes->month]]["cobradoPZO"]+=$cobroPZO->montodepositado;
            }

            foreach ($cobrosCBL as $cobroCBL) {
                $montosMeses[$meses[$diaMes->month]]["cobradoCBL"]+=$cobroCBL->montodepositado;
            }

            foreach ($cobrosSNV as $cobroSNV) {
                $montosMeses[$meses[$diaMes->month]]["cobradoSNV"]+=$cobroSNV->montodepositado;
            }

            foreach ($facturasPZO as $facturaPZO) {
                $montosMeses[$meses[$diaMes->month]]["porCobrarPZO"]+=$facturaPZO->total;
            }

            foreach ($facturasCBL as $facturaCBL) {
                $montosMeses[$meses[$diaMes->month]]["porCobrarCBL"]+=$facturaCBL->total;
            }

            foreach ($facturasSNV as $facturaSNV) {
                $montosMeses[$meses[$diaMes->month]]["porCobrarSNV"]+=$facturaSNV->total;
            }

            $montosMeses[$meses[$diaMes->month]]["cobradoTotal"]=$montosMeses[$meses[$diaMes->month]]["cobradoPZO"]+$montosMeses[$meses[$diaMes->month]]["cobradoCBL"]+$montosMeses[$meses[$diaMes->month]]["cobradoSNV"];
            $montosMeses[$meses[$diaMes->month]]["porCobrarTotal"]=$montosMeses[$meses[$diaMes->month]]["porCobrarPZO"]+$montosMeses[$meses[$diaMes->month]]["porCobrarCBL"]+$montosMeses[$meses[$diaMes->month]]["porCobrarSNV"];
        }
        return view('reportes.reporteRelacionMensualDeIngresosRecaudacionPendiente', compact('montosMeses', 'anno'));
    }



    //Este si es el nombre
    public function getReporteContratos(Request $request){
        $contratos = \App\Contrato::with("cliente")->get();
        return view('reportes.reporteContratos', compact('contratos'));
    }


    public function getReporteCuadreCaja(Request $request){
        $diaDesde   =$request->get('diaDesde', \Carbon\Carbon::now()->day);
        $mesDesde   =$request->get('mesDesde', \Carbon\Carbon::now()->month);
        $annoDesde  =$request->get('annoDesde',  \Carbon\Carbon::now()->year);
        $diaHasta   =$request->get('diaHasta', \Carbon\Carbon::now()->day);
        $mesHasta   =$request->get('mesHasta', \Carbon\Carbon::now()->month);
        $annoHasta  =$request->get('annoHasta',  \Carbon\Carbon::now()->year);
        $aeropuerto =session('aeropuerto');

        $facturas = \App\Factura::whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta) )
                                ->where('facturas.deleted_at', null)
                                ->where('aeropuerto_id', session('aeropuerto')->id)
                                ->where('nroDosa', '<>', 'NULL')
                                ->orderBy('nControl', 'ASC')
                                ->orderBy('nFactura', 'ASC')
                                ->orderBy('nroDosa', 'ASC')
                                ->get();

        $facturasTotal   = $facturas->sum('total');

        $facturasCredito = $facturas->where('condicionPago', 'Crédito')
                                    ->sum('total');

        $facturasContado = $facturas->where('condicionPago', 'Contado')
                                    ->sum('total');

        return view('reportes.reporteCuadreCaja', compact('diaDesde', 'mesDesde', 'annoDesde', 'diaHasta', 'mesHasta', 'annoHasta', 'aeropuerto', 'facturas', 'facturasTotal', 'facturasContado', 'facturasCredito'));
    }


    public function getReporteLibroDeVentas(Request $request){
        $diaDesde   =$request->get('diaDesde', \Carbon\Carbon::now()->day);
        $mesDesde   =$request->get('mesDesde', \Carbon\Carbon::now()->month);
        $annoDesde  =$request->get('annoDesde',  \Carbon\Carbon::now()->year);
        $diaHasta   =$request->get('diaHasta', \Carbon\Carbon::now()->day);
        $mesHasta   =$request->get('mesHasta', \Carbon\Carbon::now()->month);
        $annoHasta  =$request->get('annoHasta',  \Carbon\Carbon::now()->year);
        $aeropuerto =session('aeropuerto');

        $facturas = \App\Factura::with('cobros', 'detalles')
                                ->join('cobro_factura', 'facturas.id', '=', 'cobro_factura.factura_id')
                                ->join('facturadetalles', 'facturadetalles.factura_id', '=', 'facturas.id')
                                ->whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta) )
                                ->where('aeropuerto_id', session('aeropuerto')->id)
                                ->orderBy('nFactura')
                                ->get();        

        return view('reportes.reporteLibroDeVentas', compact('diaDesde', 'mesDesde', 'annoDesde', 'diaHasta', 'mesHasta', 'annoHasta', 'aeropuerto', 'facturas'));
    }


    public function getReporteListadoFacturas(Request $request){

        $modulos =\App\Modulo::all();
        $clientes =\App\Cliente::all();
        $view=view('reportes.reporteListadoFacturas',compact('clientes', 'modulos'));
        if($request->isMethod("post")){
            $facturas=\App\Factura::select('facturas.*');

            $aeropuerto   =$request->get('aeropuerto');
            $modulo       =$request->get('modulo', 0);
            if ($modulo==0){
                 if($aeropuerto==0){
                    //como se van a mostrar todos los nombres de los modulos de todos los aeropuertos
                    //debo buscar por nimbre en vez de id
                    $facturas->where('facturas.aeropuerto_id', ">", $aeropuerto);

                }else{
                    $facturas->where('facturas.aeropuerto_id', $aeropuerto);
                }
            }else{
                if($aeropuerto==0){
                    //como se van a mostrar todos los nombres de los modulos de todos los aeropuertos
                    //debo buscar por nimbre en vez de id
                    $moduloO=\App\Modulo::find($modulo);
                    $facturas->where('facturas.aeropuerto_id', ">", $aeropuerto);
                    $facturas->join('modulos','modulos.id' , '=', 'facturas.modulo_id');
                    $facturas->where('modulos.nombre', 'like', "%$moduloO->nombre%");

                }else{
                    $facturas->where('facturas.aeropuerto_id', $aeropuerto);
                    $facturas->where('facturas.modulo_id', $modulo);
                }
            }
            $desde= $request->get('desde');
            if($desde!="")
                $desdeC        =\Carbon\Carbon::createFromFormat('d/m/Y', $desde);
            else{

                $desdeC        =\Carbon\Carbon::minValue();
            }

            $facturas->where('facturas.fecha', '>=', $desdeC->toDateString());

            $hasta= $request->get('hasta');
            if($desde!="")
                $hastaC        =\Carbon\Carbon::createFromFormat('d/m/Y', $hasta);
            else
                $hastaC        =\Carbon\Carbon::maxValue();
            $facturas->where('facturas.fecha', '<=', $hastaC->toDateString());

            $nFactura     =$request->get('nFactura');
            if($nFactura!="")
            $facturas->where('facturas.nFactura', $nFactura);

            $cliente_id         =$request->get('cliente_id');
            $facturas->join('clientes','clientes.id' , '=', 'facturas.cliente_id');

            if($cliente_id!="")
                $facturas->where('clientes.id', $cliente_id);

            $estatus      =$request->get('estatus');
            if($estatus=="A"){
                $facturas->onlyTrashed();
            }else{
                $facturas->with('cobros')->where('facturas.estado', 'like',$estatus);
            }


            //dd($facturas->toSql(), $facturas->getBindings());
            $facturas=$facturas->orderBy('fecha', 'ASC')->orderBy('nFactura', 'ASC')->get();

            $total    =$facturas->sum('total');
            $subtotal =$facturas->sum('subtotal');
            $iva      =$facturas->sum('iva');
            $islr     =$facturas->sum('islr');
            if($modulo != '' || $modulo != 0){
                $moduloName=\App\Modulo::find($modulo);
                $moduloNombre = $moduloName->nombre;
            }else{
                $moduloNombre="TODOS";
            }
            if($aeropuerto != 0){
                $aeropuertoName=\App\Aeropuerto::find($aeropuerto);
                $aeropuertoNombre = $aeropuertoName->nombre;
            }else{
                $aeropuertoNombre="TODOS";
            }
            if($cliente_id != ''){
                $clienteName=\App\Cliente::find($cliente_id);
                $clienteNombre = $clienteName->nombre;
            }else{
                $clienteNombre="TODOS";
            }


            $view->with( compact('facturas', 'aeropuerto','cliente', 'cliente_id', 'modulo', 'desde', 'hasta', 'nFactura', 'rif', 'nombre', 'estatus', 'total', 'subtotal', 'islr', 'iva', 'moduloNombre', 'aeropuertoNombre', 'clienteNombre'));


        }


        return $view;

    }
    public function getReporteListadoFacturasCliente(Request $request){

        $modulos  =\App\Modulo::all();
        $clientes =\App\Cliente::all();
        $view     =view('reportes.reporteListadoFacturasCliente',compact('clientes', 'modulos'));
        if($request->isMethod("post")){
            $facturas=\App\Factura::select('facturas.*', 'clientes.nombre');

            $aeropuerto   =$request->get('aeropuerto');
            $modulo       =$request->get('modulo', 0);
            if ($modulo==0){
                 if($aeropuerto==0){
                    //como se van a mostrar todos los nombres de los modulos de todos los aeropuertos
                    //debo buscar por nimbre en vez de id
                    $facturas->where('facturas.aeropuerto_id', ">", $aeropuerto);

                }else{
                    $facturas->where('facturas.aeropuerto_id', $aeropuerto);
                }
            }else{
                if($aeropuerto==0){
                    //como se van a mostrar todos los nombres de los modulos de todos los aeropuertos
                    //debo buscar por nimbre en vez de id
                    $moduloO=\App\Modulo::find($modulo);
                    $facturas->where('facturas.aeropuerto_id', ">", $aeropuerto);
                    $facturas->join('modulos','modulos.id' , '=', 'facturas.modulo_id');
                    $facturas->where('modulos.nombre', 'like', "%$moduloO->nombre%");

                }else{
                    $facturas->where('facturas.aeropuerto_id', $aeropuerto);
                    $facturas->where('facturas.modulo_id', $modulo);
                }
            }
            
            $desde= $request->get('desde');
            if($desde!="")
                $desdeC        =\Carbon\Carbon::createFromFormat('d/m/Y', $desde);
            else{

                $desdeC        =\Carbon\Carbon::minValue();
            }

            $facturas->where('facturas.fecha', '>=', $desdeC->toDateString());

            $hasta= $request->get('hasta');
            if($desde!="")
                $hastaC        =\Carbon\Carbon::createFromFormat('d/m/Y', $hasta);
            else
                $hastaC        =\Carbon\Carbon::maxValue();
            $facturas->where('facturas.fecha', '<=', $hastaC->toDateString());

            $nFactura     =$request->get('nFactura');
            if($nFactura!="")
            $facturas->where('facturas.nFactura', $nFactura);

            $cliente_id         =$request->get('cliente_id');
            $facturas->join('clientes','clientes.id' , '=', 'facturas.cliente_id');

            if($cliente_id!="")
                $facturas->where('clientes.id', $cliente_id);

            $estatus      =$request->get('estatus');
            if($estatus=="A"){
                $facturas->onlyTrashed();
            }else{
                $facturas->with('cobros')->where('facturas.estado', 'like', $estatus);
            }

            //dd($facturasCliente->toSql(), $facturasCliente->getBindings());
            $facturas=$facturas->orderBy('nombre', 'ASC')->orderBy('fecha', 'ASC')->orderBy('nFactura', 'ASC')->get();
            $total    =$facturas->sum('total');
            $subtotal =$facturas->sum('subtotal');
            $iva      =$facturas->sum('iva');
            $islr     =$facturas->sum('islr');

            $view->with( compact('facturas', 'numero', 'aeropuerto','cliente', 'cliente_id', 'modulo', 'desde', 'hasta', 'nFactura', 'rif', 'nombre', 'estatus', 'total', 'subtotal', 'islr', 'iva'));
        }
        return $view;

    }

    public function getReporteRelacionFacturasAeronauticasCredito(Request $request)
    {
        $diaDesde         =$request->get('diaDesde', \Carbon\Carbon::now()->day);
        $mesDesde         =$request->get('mesDesde', \Carbon\Carbon::now()->month);
        $annoDesde        =$request->get('annoDesde', \Carbon\Carbon::now()->year);
        $diaHasta         =$request->get('diaHasta', \Carbon\Carbon::now()->day);
        $mesHasta         =$request->get('mesHasta', \Carbon\Carbon::now()->month);
        $annoHasta        =$request->get('annoHasta', \Carbon\Carbon::now()->year);
        $aeropuerto       =$request->get('aeropuerto_id', session('aeropuerto')->id);
        $aeropuertoNombre =\App\Aeropuerto::find($aeropuerto)->nombre;
        $cliente          =$request->get('cliente_id', 0);

        $formulario      =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'FOMULARIO DOSA (CRÉDITO)')->first();
        $aterrizaje      =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'ATERRIZAJE Y DESPEGUE DE AERONAVES (CRÉDITO)')->first();
        $estacionamiento =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'ESTACIONAMIENTO DE AERONAVES (CRÉDITO)')->first();
        $habilitacion    =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'HABILITACION (CRÉDITO)')->first();
        $jetway          =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'JETWAY (CRÉDITO)')->first();
        $carga           =\App\Concepto::where('aeropuerto_id', $aeropuerto)->where('nompre', 'CARGA (CRÉDITO)')->first();

        $facturas        =\App\Factura::select('facturas.*', 'clientes.nombre')
                                ->join('clientes', 'facturas.cliente_id', '=', 'clientes.id')
                                ->whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta))
                                ->where('deleted_at', null)
                                ->where('aeropuerto_id', $aeropuerto)
                                ->where('nroDosa', '<>', 'NULL')
                                ->where('estado', 'C')
                                ->where('cliente_id', ($cliente==0)?'>=':'=', $cliente)
                                ->where('facturas.condicionPago', 'Crédito')
                                ->orderBy('nombre', 'ASC')
                                ->get();

        $dosaFactura=[];

        foreach ($facturas as $factura) {
            $dosaFactura[$factura->nroDosa] =[
                                'fecha'             => 0,
                                'reciboCaja'        => [],
                                'nCobro'            => [],
                                'refBancaria'       => [],
                                'formularioBs'      => 0,
                                'aterrizajeBs'      => 0,
                                'estacionamientoBs' => 0,
                                'habilitacionBs'    => 0,
                                'jetwayBs'          => 0,
                                'cargaBs'           => 0,
                                'otrosCargosBs'     => 0,
                                'totalDosa'         => 0,
                                'fechaDeposito'     => 0,
                                'totalDepositado'   => 0
                            ];
            $dosaFactura[$factura->nroDosa]["fecha"]           =$factura->fecha;
            $dosaFactura[$factura->nroDosa]["cliente"]         =$factura->cliente->nombre;
            $dosaFactura[$factura->nroDosa]["totalDosa"]       =$factura->total;
            foreach ($factura->detalles as $detalle) {
                if($detalle->concepto_id == $formulario->id){
                    $dosaFactura[$factura->nroDosa]["formularioBs"]=$detalle->totalDes;
                }elseif($detalle->concepto_id == $aterrizaje->id){
                    $dosaFactura[$factura->nroDosa]["aterrizajeBs"]=$detalle->totalDes;
                }elseif($detalle->concepto_id == $estacionamiento->id){
                    $dosaFactura[$factura->nroDosa]["estacionamientoBs"]=$detalle->totalDes;
                }elseif($detalle->concepto_id == $habilitacion->id){
                    $dosaFactura[$factura->nroDosa]["habilitacionBs"]=$detalle->totalDes;
                }elseif($detalle->concepto_id == $jetway->id){
                    $dosaFactura[$factura->nroDosa]["jetwayBs"]=$detalle->totalDes;
                }elseif($detalle->concepto_id == $carga->id){
                    $dosaFactura[$factura->nroDosa]["cargaBs"]=$detalle->totalDes;
                }else{
                    $dosaFactura[$factura->nroDosa]["otrosCargosBs"]=$detalle->totalDes;
                }
            }
            foreach ($factura->cobros as $recibo){
                    $dosaFactura[$factura->nroDosa]["reciboCaja"]=$recibo->nRecibo;
                    $dosaFactura[$factura->nroDosa]["nCobro"]=$recibo->id;
                foreach ($recibo->pagos as $pago){
                        $dosaFactura[$factura->nroDosa]["refBancaria"]     =$pago->ncomprobante;
                        $dosaFactura[$factura->nroDosa]["fechaDeposito"]   =$pago->fecha;
                        $dosaFactura[$factura->nroDosa]["totalDepositado"] +=$pago->monto;
                }
            }
        }



        return view('reportes.reporteRelacionFacturasAeronauticasCredito', compact('aeropuertoNombre', 'diaDesde', 'mesDesde', 'annoDesde', 'diaHasta', 'mesHasta', 'annoHasta', 'aeropuerto', 'cliente', 'facturas', 'dosaFactura', 'clientes'));

    }



    //Función para exportar los reportes
    public function postExportReport(Request $request){

        $table        =$request->get('table');
        $tableFirmas  =$request->get('tableFirmas');
        $departamento =$request->get('departamento');
        $gerencia     =$request->get('gerencia');

       $pdf = new \TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set default header data

        $pdf->SetHeaderData(asset('imgs/gobernacion.png'), '33', "SERVICIO AUTÓNOMO DE AEROPUERTOS REGIONALES DEL EDO. BOLÍVAR","SAAR BOLÍVAR\n".$gerencia."\n".$departamento);


        $pdf->setHeaderFont(Array(PDF_FONT_NAME_DATA, '', '8'));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


       // set default monospaced font

       $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

       // set margins

       $pdf->SetMargins('5', '18', '5');

       $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


       // set some language-dependent strings (optional)

       if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {

           require_once(dirname(__FILE__).'/lang/eng.php');

           $pdf->setLanguageArray($l);

       }

       // --------------------------------------------------------       // set default font subsetting mode

       $pdf->setFontSubsetting(true);

       // Set font

       // dejavusans is a UTF-8 Unicode font, if you only need to

       // print standard ASCII chars, you can use core fonts like

       // helvetica or times to reduce file size.

       $pdf->SetFont('dejavusans', '', 8, '', true);


       // Start First Page Group
       $pdf->startPageGroup();

       // Add a page

       // This method has several options, check the source code documentation for more information.

       $pdf->AddPage();

       // set text shadow effect

       // Set some content to print

       //

       $html = view('pdf.generic', compact('table', 'tableFirmas'))->render();

       // Print text using writeHTMLCell()

       $pdf->writeHTML($html);

       // --------------------------------------------------------       // Close and output PDF document

       // This method has several options, check the source code documentation for more information.

       $pdf->Output("reporte.pdf", 'I');

   }

}
