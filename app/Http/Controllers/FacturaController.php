<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\FacturaRequest;
use App\Http\Controllers\Controller;
use \App\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FacturaController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param $factura
     * @param string $output
     * I = imprimir en el explorador
     * F =  guardar en un archivo
     *
     *
     */
    protected function crearFactura($factura, $output= 'I', $dir='facturas/'){
        $despegue = \App\Despegue::with('aterrizaje')->where('factura_id', $factura->nFactura)->first();

        $factura->load('detalles');
        //return view('pdf.factura', compact('factura'));
        // create new PDF document
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 9, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // set text shadow effect
        // Set some content to print
        //


        if($despegue){
            $html = view('pdf.dosa', compact('factura', 'despegue'))->render();
        }else{
            $html = view('pdf.factura', compact('factura'))->render();
        }

        // Print text using writeHTMLCell()
        $pdf->writeHTML($html);

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        if($output=='I')
        $pdf->Output($factura->nFactura."factura.pdf", $output);
        else{
            $path=$dir.$factura->nFactura."factura.pdf";
            $pdf->Output($path, $output);
            return $path;
        }



    }


    public function getPrint($modulo, Factura $factura){

        $this->crearFactura($factura);

    }


    public function main($nFactura){
        $nFactura      =($nFactura=="Todos")?"%":$nFactura;
        $modulos =$this->getModulos($nFactura);
        return view('factura.main', compact('modulos'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($moduloNombre, Request $request)
	{

        $sortName          = $request->get('sortName','nFactura');
        $sortName          =($sortName=="")?"nFactura":$sortName;

        $sortType          = $request->get('sortType','ASC');
        $sortType          =($sortType=="")?"ASC":$sortType;


        $facturaId         = $request->get('nFactura');
        $facturaId         =($facturaId=="")?0:$facturaId;
        $facturaIdOperator = $request->get('facturaIdOperator', '>=');
        $facturaIdOperator =($facturaIdOperator=="")?'>=':$facturaIdOperator;
        $facturaIdOperator =($facturaId==0)?">=":$facturaIdOperator;

        $clienteNombre     = $request->get('clienteNombre', '%');

        $descripcion       = $request->get('descripcion', '%');

        $total             = $request->get('total');
        $total             =($total=="")?0:$total;
        $totalOperator     = $request->get('totalOperator', '>=');
        $totalOperator     =($totalOperator=="")?'>=':$totalOperator;
        $totalOperator     =($total==0)?">=":$totalOperator;


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
                        'facturaIdOperator' =>$facturaIdOperator,
                        'totalOperator'     =>$totalOperator,
                        'sortName'          =>$sortName,
                        'sortType'          =>$sortType]);

        $modulo=\App\Modulo::where("nombre","like",$moduloNombre)->first();



            $modulo->facturas=\App\Factura::select("facturas.*","clientes.nombre as clienteNombre")
                                            ->join('clientes','clientes.id' , '=', 'facturas.cliente_id')
                                            ->where('facturas.modulo_id', "=", $modulo->id)
                                            ->where('facturas.nFactura', $facturaIdOperator, $facturaId)
                                            ->where('total', $totalOperator, $total)
                                            ->where('fecha', $fechaOperator, $fecha)
                                            ->where('descripcion', 'like', "%$descripcion%")
                                            ->where('clientes.nombre', 'like', "%$clienteNombre%")
                                            ->where('facturas.aeropuerto_id','=', session('aeropuerto')->id)
                                            ->with('cliente')->groupBy("facturas.nFactura")
                                            ->orderBy($sortName, $sortType)->paginate(50);

        $modulo->facturas->setPath('');

		return view('factura.index', compact('modulo'))->withInput(\Input::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($modulo,Factura $factura)
	{
		return view('factura.create', compact('factura', 'modulo'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($moduloNombre, FacturaRequest $request)
	{

        $impresion="";
        \DB::transaction(function () use ($moduloNombre, $request, &$impresion) {
            $facturaData = $this->getFacturaDataFromRequest($request);
            $facturaDetallesData = $this->getFacturaDetallesDataFromRequest($request);
            $facturaData['estado'] = 'P';
            $facturaData['modulo_id'] = \App\Modulo::where("nombre","like",$moduloNombre)->first()->id;
            if ($request->has('nroDosa'))
                $facturaData['nroDosa'] = $request->get('nroDosa');
            $factura = \App\Factura::create($facturaData);
            $factura->detalles()->createMany($facturaDetallesData);
            $cliente = $factura->cliente;
            if ($cliente && $cliente->isEnvioAutomatico == true && $cliente->email != "") {
                $path = $this->crearFactura($factura, 'F');
                Mail::send('emails.test', ['name' => $cliente->nombre], function ($message) use ($factura, $cliente, $path) {
                    $message
                        ->to($cliente->email, $cliente->nombre)
                        ->subject('Vuestra factura #' . $factura->codigo . ' esta lista')
                        ->attach($path);
                });
            }

            if ($request->has('despegue_id')) {
                $despegue = \App\Despegue::find($request->get('despegue_id'));
                $despegue->factura_id = $factura->nFactura;
                $despegue->save();
            }
            if ($request->has('carga_id')) {
                $carga = \App\Carga::find($request->get('carga_id'));
                $carga->factura_id = $factura->nFactura;
                $carga->save();
            }
            $impresion=action('FacturaController@getPrint', [$moduloNombre, $factura->nFactura]);
        });
        return ["success" => 1, "impresion" => $impresion];

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id,Factura $factura)
	{
        $factura->load('detalles');
		return view('factura.partials.show', compact('factura'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($modulo, Factura $factura)
	{

        $factura->load('detalles');
        return view('factura.edit', compact('factura', 'modulo'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($moduloNombre, Factura $factura, FacturaRequest $request)
	{

        \DB::transaction(function () use ($moduloNombre, $factura, $request) {
            $facturaData = $this->getFacturaDataFromRequest($request);
            $facturaDetallesData = $this->getFacturaDetallesDataFromRequest($request);
            $factura->update($facturaData);
            $factura->detalles()->delete();
            $factura->detalles()->createMany($facturaDetallesData);
        });
        return ["success" => 1, "impresion" => action('FacturaController@getPrint', [$moduloNombre, $factura->nFactura])];

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,Factura $factura)
	{
        if($factura->cobros()->count()>0){
            return ["success"=>0, "text"=>"No se pudo eliminar la factura ya que posee cobros asociados"];
        }

        if($factura->delete())
            return ["success"=>1, "text"=>"La factura se ha eliminado con exito"];
        else
            return ["success"=>0, "text"=>"No se pudo eliminar la factura con exito"];
	}



    protected function getFacturaDataFromRequest($request){
        return  $request->only('aeropuerto_id',
                                'condicionPago',
                                'nControlPrefix',
                                'nControl',
                                'fecha',
                                'fechaVencimiento',
                                'cliente_id',
                                'subtotalNeto',
                                'descuentoTotal',
                                'subtotal',
                                'iva',
                                'recargoTotal',
                                'total',
                                'descripcion',
                                'comentario');

    }
    protected function getFacturaDetallesDataFromRequest($request){
        $detalles=$request->only(   'concepto_id',
                                    'cantidadDes',
                                    'montoDes',
                                    'descuentoPerDes',
                                    'descuentoTotalDes',
                                    'ivaDes',
                                    'recargoPerDes',
                                    'recargoTotalDes',
                                    'totalDes' );

        $size                =count($detalles["concepto_id"]);
        $facturaDetallesData =array();
        for($i=0; $i<$size; $i++){
            $facturaDetallesData[]=array(   'concepto_id'       => $detalles["concepto_id"][$i],
                                            'cantidadDes'       => $detalles["cantidadDes"][$i],
                                            'montoDes'          => $detalles["montoDes"][$i],
                                            'descuentoPerDes'   => $detalles["descuentoPerDes"][$i],
                                            'descuentoTotalDes' => $detalles["descuentoTotalDes"][$i],
                                            'ivaDes'            => $detalles["ivaDes"][$i],
                                            'recargoPerDes'     => $detalles["recargoPerDes"][$i],
                                            'recargoTotalDes'   => $detalles["recargoTotalDes"][$i],
                                            'totalDes'          => $detalles["totalDes"][$i]);
        }
        return $facturaDetallesData;

    }

     protected function getModulos($moduloNombre){
        $modulos=\App\Modulo::where("nombre","like",$moduloNombre)->orderBy("nombre")->get();
        foreach($modulos as $modulo){
            $modulo->facturas=\App\Factura::where('facturas.modulo_id', "=", $modulo->id)
                                            ->where('facturas.aeropuerto_id','=', session('aeropuerto')->id)
                                            ->groupBy("facturas.nFactura")->get();
            $modulo->facturas->load('cliente');
        }
         return $modulos;
    }

}
