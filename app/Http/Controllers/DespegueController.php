<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Despegue;
use App\Aterrizaje;
use App\Puerto;
use App\Piloto;
use App\NacionalidadVuelo;
use App\Aeronave;
use App\TipoMatricula;
use App\Cliente;
use App\OtrosCargo;
use App\Factura;

use Carbon\Carbon;

class DespegueController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request){

		if($request->ajax()){
			$sortName                  = $request->get('sortName','fecha');
			$sortName                  =($sortName=="")?"fecha":$sortName;

			$sortType                  = $request->get('sortType','DESC');
			$sortType                  =($sortType=="")?"DESC":$sortType;

			$fecha                     = $request->get('fecha', '%');
			$fecha                     =($fecha=="")?"%":$fecha;

			$hora                      = $request->get('hora', '%');
			$hora                      =($hora=="")?"%":$hora;

			$num_vuelo                 = $request->get('num_vuelo', '%');
			$num_vuelo                 =($num_vuelo=="")?"%":$num_vuelo;

			$aeronave_id               = $request->get('aeronave_id', 0);
			$aeronaveOperador          =($aeronave_id=="")?">":"=";

			$puerto_id                 = $request->get('puerto_id', 0);
			$puertoOperador            =($puerto_id=="")?">":"=";

			\Input::merge([
				'sortName'=>$sortName,
				'sortType'=>$sortType]);

			$aeronave = Aterrizaje::with("aeronave")
			->where('aeronave_id', '=', $aeronave_id)->get();

			$despegues = Despegue::with("puerto", "piloto", "tipo")
			->where('fecha', 'like', $fecha)
			->where('hora', 'like', $hora)
			->where('num_vuelo', 'like', $num_vuelo)
			->where('puerto_id', $puertoOperador, $puerto_id);

			if($puerto_id==''){
				$despegues=$despegues->orWhere('puerto_id','=' , null);
			}
			$despegues=	$despegues->orderBy($sortName, $sortType)
			->paginate(7);
			return view('despegues.partials.table', compact('despegues', 'aeronave'));
		}
		else
		{
			$aterrizajes         = Aterrizaje::all();
			$puertos             = Puerto::all();
			$pilotos             = Piloto::all();
			$nacionalidad_vuelos = NacionalidadVuelo::all();
			$aeronaves           = Aeronave::all();
			$tipoMatriculas      = TipoMatricula::all();
			$otrosCargos         = OtrosCargo::all();
			$today               = Carbon::now();
			$today->timezone     = 'America/Caracas';


			return view("despegues.index", compact("aterrizajes", "otrosCargos", "nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos", "today"));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($aterrizaje)
	{
		$aterrizaje         = Aterrizaje::with("aeronave", "puerto")->where('id', $aterrizaje)->first();
		$puertos             = Puerto::all();
		$pilotos             = Piloto::all();
		$nacionalidad_vuelos = NacionalidadVuelo::all();
		$aeronaves           = Aeronave::all();
		$tipoMatriculas      = TipoMatricula::all();
		$otrosCargos         = OtrosCargo::all();
		$today               = Carbon::now();
		$today->timezone     = 'America/Caracas';

		return view("despegues.create", compact("aterrizaje", "otrosCargos", "nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos", "today"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$despegue   = Despegue::create($request->except("nacionalidadVuelo_id", "piloto_id", "puerto_id", "cliente_id"));
		$aterrizaje = Aterrizaje::find($request->get("aterrizaje_id"));
		$aterrizaje->despegue()->save($despegue);
		$aterrizaje->update(["despego"=>"1"]);

		if($despegue)
		{

			$nacID      =$nacionalidad=NacionalidadVuelo::find($request->get("nacionalidadVuelo_id"));
			$puertoID   =$puerto=Puerto::find($request->get("puerto_id"));
			$pilotoID   =$piloto=Piloto::find($request->get("piloto_id"));
			$clienteID  =$cliente=Cliente::find($request->get("cliente_id"));

			if($nacionalidad&&$piloto&&$puerto&&$cliente){
				$nacID     =$nacionalidad->id;
				$puertoID  =$puerto->id;
				$pilotoID  =$piloto->id;
				$clienteID =$cliente->id;
			}

			$despegue->nacionalidadVuelo_id =$nacID;
			$despegue->puerto_id            =$puertoID;
			$despegue->piloto_id            =$pilotoID;
			$despegue->cliente_id           =$clienteID;
			$despegue->save();

			return response()->json(array("text"   =>'Despegue registrado exitósamente',
																		"success"=>1));
		}
		else
		{
			response()->json(array("text"=>'Error registrando el despegue',"success"=>0));
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

	public function getCrearFactura($id)
	{
		$despegue = Despegue::find($id);
		$factura  = new Factura();
		$modulo = \App\Modulo::find(5)->nombre;

		$factura->fill(['aeropuerto_id' => $despegue->aeropuerto_id,
	                  'fecha' => $despegue->fecha,
	                  'cliente_id'  => $despegue->cliente_id]);

		return view('factura.edit', compact('factura', 'modulo'));

	}

}
