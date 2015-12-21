<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\AterrizajeRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Aterrizaje;
use App\Puerto;
use App\Piloto;
use App\NacionalidadVuelo;
use App\Aeronave;
use App\TipoMatricula;
use App\Cliente;

use Carbon\Carbon;

class AterrizajeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//Mostrar tabla
	public function index(Request $request)
	{
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

		$tipoMatricula_id          = $request->get('tipoMatricula_id', 0);
		$tipoMatriculaOperador     =($tipoMatricula_id=="")?">":"=";

		$puerto_id                 = $request->get('puerto_id', 0);
		$puertoOperador            =($puerto_id=="")?">":"=";

		$cliente_id                = $request->get('cliente_id', 0);
		$clienteOperador           =($cliente_id=="")?">":"=";
		 \Input::merge([
            'sortName'=>$sortName,
            'sortType'=>$sortType]);


		$aterrizajes = Aterrizaje::with("puerto", "piloto", "nacionalidad_vuelo", "aeronave" , "cliente", "tipo")
									->where('despego', '=', '0')
									->where(function($query) use ($fecha,	$hora,
									  $num_vuelo, $aeronaveOperador,
									    $aeronave_id,
									    $tipoMatriculaOperador, $tipoMatricula_id,
									    $puertoOperador, $puerto_id,
									    $clienteOperador, $cliente_id,
									     $puerto_id,
									      $cliente_id){
										$query->where('fecha', 'like', $fecha)
													->where('hora', 'like', $hora)
													->where('num_vuelo', 'like', $num_vuelo)
													->where('aeronave_id', $aeronaveOperador, $aeronave_id)
													->where('tipoMatricula_id', $tipoMatriculaOperador, $tipoMatricula_id)
													->where('puerto_id', $puertoOperador, $puerto_id)
													->where('aeropuerto_id', '=', session('aeropuerto')->id)
													->where('cliente_id', $clienteOperador, $cliente_id);

											if($puerto_id==''){
												$query->orWhere('puerto_id','=' , null);
											}
											if($cliente_id==''){
												$query->orWhere('cliente_id','=' , null);
											}

									});



		$aterrizajes=	$aterrizajes->orderBy($sortName, $sortType)
									->paginate(7);

		return view('aterrizajes.partials.table', compact('aterrizajes'));
		}
		else
			{
				$aterrizajes         = Aterrizaje::where('despego', '=', '0')->where('aeropuerto_id', '=', session('aeropuerto')->id)->paginate(7);
				$puertos             = Puerto::all();
				$pilotos             = Piloto::all();
				$nacionalidad_vuelos = NacionalidadVuelo::all();
				$aeronaves           = Aeronave::all();
				$tipoMatriculas      = TipoMatricula::all();
				$today               = Carbon::now();
				$today->timezone     = 'America/Caracas';

			return view("aterrizajes.index", compact('aterrizajes',"nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos", "today"));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
			$aterrizajes         = Aterrizaje::all();
			$puertos             = Puerto::all();
			$pilotos             = Piloto::all();
			$nacionalidad_vuelos = NacionalidadVuelo::all();
			$aeronaves           = Aeronave::all();
			$tipoMatriculas      = TipoMatricula::all();
			$today               = Carbon::now();
			$today->timezone     = 'America/Caracas';
		return view("aterrizajes.create", compact("nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos", "today"));


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AterrizajeRequest $request)
	{

		$aterrizaje = Aterrizaje::create($request->except("nacionalidadVuelo_id", "piloto_id", "puerto_id", "cliente_id"));

		if($aterrizaje)
		{

			$nacID     =$nacionalidad=NacionalidadVuelo::find($request->get("nacionalidadVuelo_id"));
			$puertoID  =$puerto=Puerto::find($request->get("puerto_id"));
			$pilotoID  =$piloto=Piloto::find($request->get("piloto_id"));
			$clienteID =$cliente=Cliente::find($request->get("cliente_id"));
			
			$nacID     =($nacID)?$nacionalidad->id:NULL;
			$puertoID  =($puertoID)?$puerto->id:NULL;
			$pilotoID  =($pilotoID)?$piloto->id:NULL;
			$clienteID =($clienteID)?$cliente->id:NULL;

			$aterrizaje->nacionalidadVuelo_id =$nacID;
			$aterrizaje->puerto_id            =$puertoID;
			$aterrizaje->piloto_id            =$pilotoID;
			$aterrizaje->cliente_id           =$clienteID;
			$aterrizaje->save();

			return response()->json(array("text"		 =>'Aterrizaje registrado exitósamente',
									      "success"      =>1));
		}
		else
		{
			response()->json(array("text"=>'Error registrando el aterrizaje',"success"=>0));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Aterrizaje $aterrizaje)
	{
		$aterrizaje          = Aterrizaje::find($aterrizaje);
		$puertos             = Puerto::all();
		$pilotos             = Piloto::all();
		$nacionalidad_vuelos = NacionalidadVuelo::all();
		$aeronaves           = Aeronave::all();
		$tipoMatriculas      = TipoMatricula::all();
        return view("aterrizajes.partials.show", compact('aterrizaje', "nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos"));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$aterrizaje          = Aterrizaje::find($id);
		$puertos             = Puerto::all();
		$pilotos             = Piloto::all();
		$nacionalidad_vuelos = NacionalidadVuelo::all();
		$aeronaves           = Aeronave::all();
		$tipoMatriculas      = TipoMatricula::all();
		return view("aterrizajes.partials.edit", compact("aterrizaje", "nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, AterrizajeRequest $request)
	{
		$aterrizaje = Aterrizaje::find($id);
		$aterrizaje = Aterrizaje::update($request->except("nacionalidadVuelo_id", "piloto_id", "puerto_id", "cliente_id"));

		if($aterrizaje)
		{

			$nacID     =$nacionalidad=NacionalidadVuelo::find($request->get("nacionalidadVuelo_id"));
			$puertoID  =$puerto=Puerto::find($request->get("puerto_id"));
			$pilotoID  =$piloto=Piloto::find($request->get("piloto_id"));
			$clienteID =$cliente=Cliente::find($request->get("cliente_id"));

			if($nacionalida){
				$nacID     =$nacionalidad->id;
				$puertoID  =$puerto->id;
				$pilotoID  =$piloto->id;
				$clienteID =$cliente->id;
			}

			$aterrizaje->nacionalidadVuelo_id =$nacID;
			$aterrizaje->puerto_id            =$puertoID;
			$aterrizaje->piloto_id            =$pilotoID;
			$aterrizaje->cliente_id           =$clienteID;
			$aterrizaje->save();

			return response()->json(array("text"=>'Aterrizaje modificado exitósamente',
										  "aterrizaje"=>$aterrizaje->load("nacionalidad_vuelo", "tipo", "aeronave", "puerto", "piloto"),
										  "success"=>1));
		}
		else
		{
			response()->json(array("text"=>'Error modificando el registro',"success"=>0));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
    {
        if(\App\Aterrizaje::destroy($id)){
            return ["success"=>1, "text" => "Aterrizaje eliminado con éxito."];
        }else{
            return ["success"=>0, "text" => "Error eliminando el registro."];
        }


    }

}
