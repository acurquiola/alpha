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

		$sortType                  = $request->get('sortType','DES');
		$sortType                  =($sortType=="")?"DES":$sortType;

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
		return view("despegues.create", compact("aterrizaje", "otrosCargos", "nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos", "today"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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

}
