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


    public function getReporteModuloMetaMensual(Request $request){
        $mes=$request->get('mes', \Carbon\Carbon::now()->month);
        $anno=$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto=$request->get('aeropuerto',  0);
        $primerDiaMes=\Carbon\Carbon::create($anno, $mes,1)->startOfMonth();
        $ultimoDiaMes=\Carbon\Carbon::create($anno, $mes,1)->endOfMonth();
        $modulos=\App\Modulo::where('aeropuerto_id', session('aeropuerto')->id )->get();
        $montos=[];
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

    public function getReporterFacturadoCobradoMensual(Request $request){
        $anno=$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto=$request->get('aeropuerto',  0);
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
                $facturas=\App\Factura::where('facturas.fecha','>=' ,$diaMes->startOfMonth()->toDateTimeString())
                ->where('facturas.fecha','<=' ,$diaMes->endOfMonth()->toDateTimeString())
                ->where('facturas.aeropuerto_id',($aeropuerto==0)?">":"=" ,$aeropuerto)
                ->where('facturas.deleted_at', null)
                ->get();
            $montosMeses[$meses[$diaMes->month]]=[
                    "facturado"=>0,
                    "cobrado"=>0,
                    "porCobrar"=>0,
                    "cobroAnterior"=>0
                ];

            foreach ($facturas as $factura) {
                $montosMeses[$meses[$diaMes->month]]["facturado"]+=$factura->total;
                $montosMeses[$meses[$diaMes->month]]["cobrado"]+=($factura->metadata)?$factura->metadata->total:0;

            }
            $montosMeses[$meses[$diaMes->month]]["porCobrar"]=$montosMeses[$meses[$diaMes->month]]["facturado"]-$montosMeses[$meses[$diaMes->month]]["cobrado"];
        }
        return view('reportes.reporterFacturadoCobradoMensual', compact('montosMeses', 'anno', 'aeropuerto'));
    }

    



    public function getReporteDES900(Request $request){
        $diaDesde   =$request->get('diaDesde', \Carbon\Carbon::now()->day);
        $mesDesde   =$request->get('mesDesde', \Carbon\Carbon::now()->month);
        $annoDesde  =$request->get('annoDesde',  \Carbon\Carbon::now()->year);
        $diaHasta   =$request->get('diaHasta', \Carbon\Carbon::now()->day);
        $mesHasta   =$request->get('mesHasta', \Carbon\Carbon::now()->month);
        $annoHasta  =$request->get('annoHasta',  \Carbon\Carbon::now()->year);
        $aeropuerto =session('aeropuerto');
        $despegues  = \App\Despegue::with("factura", "aterrizaje")->whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta) )->where('aeropuerto_id', session('aeropuerto')->id)->get();
        return view('reportes.reporteDES900', compact('diaDesde', 'mesDesde', 'annoDesde', 'diaHasta', 'mesHasta', 'annoHasta', 'aeropuerto', 'despegues'));
    }


    public function getReporteTraficoAereo(Request $request){
        $diaDesde    =$request->get('diaDesde', \Carbon\Carbon::now()->day);
        $mesDesde    =$request->get('mesDesde', \Carbon\Carbon::now()->month);
        $annoDesde   =$request->get('annoDesde',  \Carbon\Carbon::now()->year);
        $diaHasta    =$request->get('diaHasta', \Carbon\Carbon::now()->day);
        $mesHasta    =$request->get('mesHasta', \Carbon\Carbon::now()->month);
        $annoHasta   =$request->get('annoHasta',  \Carbon\Carbon::now()->year);
        $puerto      =$request->get('puerto', 0);
        $procedencia =$request->get('procedencia', 0);
        $destino     =$request->get('destino', 0);
        $cliente     =$request->get('cliente',  0);
        $aeropuerto  =session('aeropuerto');

        $clientes = \App\Cliente::with("despegue")
                ->join('despegues','clientes.id' , '=', 'despegues.cliente_id')
                ->groupBy('clientes.id')
                ->first();

    foreach ($clientes->despegue as $despegue) {
            $embarqueAdultos[] = $despegue->embarqueAdultos;
            $eAdultos[]=array_sum($embarqueAdultos);

    }

dd($clientes, $embarqueAdultos);
        return view('reportes.reporteTraficoAereo', compact('diaDesde', 'mesDesde', 'annoDesde', 'diaHasta', 'mesHasta', 'annoHasta', 'aeropuerto', 'despegues', 'embarqueAdultos'));
    }


    public function getReporteContratos(Request $request){
        $contratos = \App\Contrato::with("cliente")->get();
        return view('reportes.reporteContratos', compact('contratos'));
    }

    public function getReporteCuadreCaja(Request $request){
        $diaDesde        =$request->get('diaDesde', \Carbon\Carbon::now()->day);
        $mesDesde        =$request->get('mesDesde', \Carbon\Carbon::now()->month);
        $annoDesde       =$request->get('annoDesde',  \Carbon\Carbon::now()->year);
        $diaHasta        =$request->get('diaHasta', \Carbon\Carbon::now()->day);
        $mesHasta        =$request->get('mesHasta', \Carbon\Carbon::now()->month);
        $annoHasta       =$request->get('annoHasta',  \Carbon\Carbon::now()->year);
        $aeropuerto =session('aeropuerto');
        $facturas = \App\Factura::whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta) )
                                ->where('facturas.deleted_at', null)
                                ->where('aeropuerto_id', session('aeropuerto')->id)
                                ->where('nroDosa', '<>', 'NULL')
                                ->get();

        $facturasTotal = \App\Factura::whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta) )
                                ->where('facturas.deleted_at', null)
                                ->where('aeropuerto_id', session('aeropuerto')->id)
                                ->where('nroDosa', '<>', 'NULL')
                                    ->sum('facturas.total');

        $facturasCredito = \App\Factura::whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta) )
                                ->where('facturas.deleted_at', null)
                                ->where('aeropuerto_id', session('aeropuerto')->id)
                                ->where('nroDosa', '<>', 'NULL')
                                ->where('condicionPago', 'Crédito')
                                ->sum('facturas.total');

        $facturasContado = \App\Factura::whereBetween('fecha', array($annoDesde.'-'.$mesDesde.'-'.$diaDesde,  $annoHasta.'-'.$mesHasta.'-'.$diaHasta) )
                                ->where('facturas.deleted_at', null)
                                ->where('aeropuerto_id', session('aeropuerto')->id)
                                ->where('nroDosa', '<>', 'NULL')
                                ->where('condicionPago', 'Contado')
                                ->sum('facturas.total');
        return view('reportes.reporteCuadreCaja', compact('diaDesde', 'mesDesde', 'annoDesde', 'diaHasta', 'mesHasta', 'annoHasta', 'aeropuerto', 'facturas', 'facturasTotal', 'facturasContado', 'facturasCredito'));
    }

    public function getReporteRelacionCobranza(Request $request){
        $modulos      =\App\Modulo::where('aeropuerto_id', session('aeropuerto')->id )->lists('nombre','id');
        $clientes      =\App\Cliente::all();
        $mes          =$request->get('mes', \Carbon\Carbon::now()->month);
        $anno         =$request->get('anno',  \Carbon\Carbon::now()->year);
        $aeropuerto   =$request->get('aeropuerto',  0);
       
        $cliente      =$request->get('cliente', 0);
        $modulo       =$request->get('modulo',0);
        $moduloNombre =($modulo==0)?'TODOS':\App\Modulo::where('id', $modulo)->first()->nombre;
        $clienteNombre =($cliente==0)?'TODOS':(\App\Cliente::where('id', $cliente)->first()->nombre);
        $aeropuertoNombre =($aeropuerto==0)?'TODOS':(\App\Aeropuerto::where('id', $aeropuerto)->first()->nombre);
        $primerDiaMes =\Carbon\Carbon::create($anno, $mes,1)->startOfMonth();
        $ultimoDiaMes =\Carbon\Carbon::create($anno, $mes,1)->endOfMonth();
        $recibos=\App\Cobrospago::with('cobro','cuenta')->where('fecha','>=' ,$primerDiaMes)
                                ->where('fecha','<=' ,$ultimoDiaMes)
                                ->whereIn('cobro_id', function($query) use ($aeropuerto, $modulo, $cliente){
                                    $query->select('id')->from('cobros')
                                              ->where('aeropuerto_id',($aeropuerto==0)?">":"=", $aeropuerto)
                                              ->where('cobros.modulo_id',($modulo==0)?">":"=", $modulo)
                                              ->where('cobros.cliente_id',($cliente==0)?">":"=", $cliente);
                                })->groupBy('cobro_id')->orderBy('fecha', 'ASC', 'facturas.nFactura', 'ASC')
                                ->get();

        $totalFacturas   =$recibos->sum('cobro.montofacturas');
        $totalDepositado =$recibos->sum('cobro.montodepositado');
        return view('reportes.reporteRelacionCobranza', compact('mes', 'anno', 'aeropuerto', 'modulo', 'recibos', 'modulos', 'clientes', 'cliente', 'totalFacturas', 'totalDepositado', 'moduloNombre', 'clienteNombre', 'aeropuertoNombre'));

    }

    public function getReporteListadoFacturas(Request $request){

        $modulos      =\App\Modulo::all();
        $view=view('reportes.reporteListadoFacturas',compact('modulos'));
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
            else
                $desdeC        =\Carbon\Carbon::minValue();
            $facturas->where('facturas.fecha', '>=', $desdeC);

            $hasta= $request->get('hasta');
            if($desde!="")
                $hastaC        =\Carbon\Carbon::createFromFormat('d/m/Y', $hasta);
            else
                $hastaC        =\Carbon\Carbon::maxValue();
            $facturas->where('facturas.fecha', '<=', $hastaC);

            $nFactura     =$request->get('nFactura');
            if($nFactura!="")
            $facturas->where('facturas.nFactura', $nFactura);

            $cedRif         =$request->get('cedRif');
            $cedRifPrefix   =$request->get('cedRifPrefix');



            $nombre       =$request->get('nombre');
            $facturas->join('clientes','clientes.id' , '=', 'facturas.cliente_id');

            if($nombre!="")
                $facturas->where('clientes.nombre', 'like', "%$nombre%");
            if($cedRif!=""){
                $facturas->where('clientes.cedRif', 'like', "%$cedRif%");
                $facturas->where('clientes.cedRifPrefix', $cedRifPrefix);
            }


            $estatus      =$request->get('estatus');
            if($estatus=="A"){
                $facturas->onlyTrashed();
            }else{
                $facturas->with('cobros')->where('facturas.estado', 'like',$estatus);
            }


            //dd($facturas->toSql(), $facturas->getBindings());
            $facturas=$facturas->orderBy('fecha', 'DESC')->get();
            
            $total    =$facturas->sum('total');
            $subtotal =$facturas->sum('subtotal');
            $iva      =$facturas->sum('iva');
            $islr     =$facturas->sum('islr');

            $view->with( compact('facturas', 'aeropuerto', 'modulo', 'desde', 'hasta', 'nFactura', 'rif', 'nombre', 'estatus', 'total', 'subtotal', 'islr', 'iva'));


        }


        return $view;

    }

    public function postExportReport(Request $request){

       $table=$request->get('table');

       $pdf = new \TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

       $pdf->setPrintHeader(false);

       $pdf->setPrintFooter(false);

       // set default monospaced font

       $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

       // set margins

       $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

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

       // Add a page

       // This method has several options, check the source code documentation for more information.

       $pdf->AddPage();

       // set text shadow effect

       // Set some content to print

       //

       $html = view('pdf.generic', compact('table'))->render();

       // Print text using writeHTMLCell()

       $pdf->writeHTML($html);

       // --------------------------------------------------------       // Close and output PDF document

       // This method has several options, check the source code documentation for more information.

       $pdf->Output("reporte.pdf", 'I');

   }

}
