<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CargaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;


use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Carga;
use App\PreciosCarga;
use App\Cliente;
use App\Concepto;
use App\Aeronave;
use App\MontosFijo;
use App\Factura;
use App\Facturadetalle;

class CargaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if($request->ajax()){
			$sortName         = $request->get('sortName','fecha');
			$sortName         =($sortName=="")?"fecha":$sortName;
			
			$sortType         = $request->get('sortType','DESC');
			$sortType         =($sortType=="")?"DESC":$sortType;
			
			$fecha            = $request->get('fecha', '%');
			$fecha            =($fecha=="")?"%":$fecha;		
			
			$num_vuelo        = $request->get('num_vuelo', '%');
			$num_vuelo        =($num_vuelo=="")?"%":$num_vuelo;
			
			$aeronave_id      = $request->get('aeronave_id', 0);
			$aeronaveOperador =($aeronave_id=="")?">":"=";
			
			$cliente_id       = $request->get('cliente_id', 0);
			$clienteOperador  =($cliente_id=="")?">":"=";
			
			
			\Input::merge([
	            'sortName'=>$sortName,
	            'sortType'=>$sortType]);
		
			$cargas= CArga::with("cliente", "aeronave")
										->where('fecha', 'like', '%'.$fecha.'%')
										->where('num_vuelo', 'like', '%'.$num_vuelo.'%')
										->where('aeronave_id', $aeronaveOperador, $aeronave_id)
										->where('cliente_id', $clienteOperador, $cliente_id)
										->orderBy($sortName, $sortType)
										->paginate(7);

			return view('cargas.partials.table', compact('cargas'));
		}
		else
		{

			$clientes  = Cliente::all();
			$aeronaves = Aeronave::all();
			
			return view('cargas.index', compact('clientes', 'aeronaves'));
		}
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$aeronaves      = Aeronave::all();
		$today          = Carbon::now();
		$precios_cargas = PreciosCarga::first();
		$montos_fijos   = MontosFijo::first();
		return view('cargas.create', compact('today', 'aeronaves', 'montos_fijos', 'precios_cargas'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CargaRequest $request)
	{
		$carga = Carga::create($request->except('precio_carga'));

		if ($carga){
			$precio_carga        = PreciosCarga::first();
			$carga->precio_carga = $precio_carga;
			return response()->json(array("text"=>'Registro almacenado con éxito',
																	  "success"=>1));
		}
		else
		{
			response()->json(array("text"=>'Error almacenando el registro',"success"=>0));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$carga          = Carga::find($id);
		$aeronaves      = Aeronave::all();
		$today          = Carbon::now();
		$precios_cargas = PreciosCarga::first();
		$montos_fijos   = MontosFijo::first();
		return view('cargas.partials.edit', compact('aeronaves', 'today', 'precios_cargas', 'montos_fijos', 'carga'));
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
        if(Carga::destroy($id)){
            return ["success"=>1, "text" => "Registro eliminado con éxito."];
        }else{
            return ["success"=>0, "text" => "Error eliminando el registro."];
        }
    }

    public function getCrearFactura($id)
	{
		//Información general de la factura a crear.

		$carga         = Carga::find($id);
		$factura       = new Factura();
		$modulo        = \App\Modulo::find(6)->nombre;
		$ut            = MontosFijo::first()->unidad_tributaria;
		$condicionPago = $carga->condicionPago;

		$factura->fill(['aeropuerto_id' => $carga->aeropuerto_id,
			               'cliente_id'   => $carga->cliente_id]);
		
		$factura->detalles = new Collection();

		//Item de Comcepto
		$cobrarCarga       = new Facturadetalle();

		switch ($condicionPago) {
			    case 'Contado':
			        $concepto_id       = PreciosCarga::first()->conceptoContado_id;
			        break;
			    case 'Crédito':
							$concepto_id       = PreciosCarga::first()->conceptoCredito_id;
			        break;
			}
		$montoDes          = $carga->monto_total;
		$cantidadDes       = '1';
		$iva               = Concepto::find($concepto_id)->iva;
		$montoIva          = ($iva * $montoDes)/100 ;
		$totalDes          = $montoDes + $montoIva;
		$cobrarCarga->fill(compact('concepto_id', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
		$factura->detalles->push($cobrarCarga);


		return view('factura.facturaCarga.create', compact('factura', 'condicionPago'))->with(['carga_id'=>$carga->id]);

	}

}
