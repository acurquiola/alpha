<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\DespegueRequest;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

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
use App\CargosVario;
use App\Facturadetalle;
use App\MontosFijo;
use App\Concepto;
use App\HorariosAeronautico;
use App\EstacionamientoAeronave;
use App\PreciosAterrizajesDespegue;

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
	public function store(DespegueRequest $request)
	{
		$despegue                         = Despegue::create($request->except("nacionalidadVuelo_id", "piloto_id", "puerto_id", "cliente_id", "cobrar_estacionamiento", "cobrar_puenteAbordaje", "cobrar_Formulario", "cobrar_AterDesp", "cobrar_Combustible", "cobrar_servHandling", "cobrar_habilitacion"));
		$aterrizaje                       = Aterrizaje::find($request->get("aterrizaje_id"));
		$aterrizaje->despegue()->save($despegue);
		$aterrizaje->update(["despego"    =>"1"]);

		$despegue->cobrar_estacionamiento =$request->input('cobrar_estacionamiento', 0);
		$despegue->cobrar_puenteAbordaje  =$request->input('cobrar_puenteAbordaje', 0);
		$despegue->cobrar_Formulario      =$request->input('cobrar_Formulario', 0);
		$despegue->cobrar_AterDesp        =$request->input('cobrar_AterDesp', 0);
		$despegue->cobrar_AterDesp        =$request->input('cobrar_AterDesp', 0);
		$despegue->cobrar_Combustible     =$request->input('cobrar_Combustible', 0);
		$despegue->cobrar_servHandling    =$request->input('cobrar_servHandling', 0);	
		
		$hora              = $aterrizaje->hora;
		$inicioOperaciones = HorariosAeronautico::first()->operaciones_inicio;
		$finOperaciones    = HorariosAeronautico::first()->operaciones_fin;

		if ($hora > $inicioOperaciones && $hora < $finOperaciones){
			$despegue->cobrar_habilitacion  = '0';
		}else{
			$despegue->cobrar_habilitacion  = '1';
		}

		if($despegue)
		{

			$nacID     =$nacionalidad=NacionalidadVuelo::find($request->get("nacionalidadVuelo_id"));
			$puertoID  =$puerto=Puerto::find($request->get("puerto_id"));
			$pilotoID  =$piloto=Piloto::find($request->get("piloto_id"));
			$clienteID =$cliente=Cliente::find($request->get("cliente_id"));
			
			$nacID     =($nacID)?$nacionalidad->id:NULL;
			$puertoID  =($puertoID)?$puerto->id:NULL;
			$pilotoID  =($pilotoID)?$piloto->id:NULL;
			$clienteID =($clienteID)?$cliente->id:NULL;
			
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
		//Información general de la factura a crear.
		$despegue  = Despegue::find($id);
		$factura   = new Factura();
		$modulo    = \App\Modulo::find(5)->nombre;
		$ut        = MontosFijo::first()->unidad_tributaria;

		$factura->fill(['aeropuerto_id' => $despegue->aeropuerto_id,
				         'cliente_id'   => $despegue->cliente_id]);


		
		$factura->detalles = new Collection();

		//Ítem de Formulario.
		if($despegue->cobrar_Formulario == '1'){
			$formulario        = new Facturadetalle();
			$eq_formulario     = CargosVario::first()->eq_formulario;
			$concepto_id       = CargosVario::first()->formularioCredito_id;
			$montoDes          = $eq_formulario * $ut;
			$cantidadDes       = '1';
			$iva               = Concepto::find($concepto_id)->iva;
			$montoIva          = ($iva * $montoDes)/100 ;
			$totalDes          = $montoDes + $montoIva;
			$formulario->fill(compact('concepto_id', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($formulario);
		}

		//Ítem de Estacionamiento.
		if($despegue->cobrar_estacionamiento == '1'){
			$estacionamiento = new Facturadetalle();
			$nacionalidad    = $despegue->nacionalidadVuelo_id;
			$concepto_id     = EstacionamientoAeronave::first()->conceptoCredito_id;
			switch ($nacionalidad) {
			    case 1:
			        $minutosLibre  = EstacionamientoAeronave::first()->tiempoLibreNac;
					$eq_bloque     = EstacionamientoAeronave::first()->eq_bloqueNac;
					$minutosBloque = EstacionamientoAeronave::first()->minBloqueNac;
			        break;
			    case 2:
			        $minutosLibre  = EstacionamientoAeronave::first()->tiempoLibreInt;
					$eq_bloque     = EstacionamientoAeronave::first()->eq_bloqueInt;
					$minutosBloque = EstacionamientoAeronave::first()->minBloqueInt;
			        break;
			}

			$tiempo_estacionamiento = $despegue->tiempo_estacionamiento;
			$tiempoAFacturar        = ($tiempo_estacionamiento - $minutosLibre)/$minutosBloque;
			$equivalente            = ($eq_bloque * $ut);
			$montoDes               = $equivalente * $tiempoAFacturar;
			$cantidadDes            = '1';
			$iva                    = Concepto::find($concepto_id)->iva;
			$montoIva               = ($iva * $montoDes)/100 ;
			$totalDes               = $montoDes + $montoIva;
			$estacionamiento->fill(compact('concepto_id', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($estacionamiento);
		}

		//Ítem de Aterrizaje y Despegue
		if($despegue->cobrar_AterDesp == '1'){
			$aterrizajeDespegue = new Facturadetalle();
			$nacionalidad    = $despegue->nacionalidadVuelo_id;
			$concepto_id     = PreciosAterrizajesDespegue::first()->conceptoCredito_id;

			$hora      = $despegue->aterrizaje->hora;
			$salidaSol = HorariosAeronautico::first()->sol_salida;
			$puestaSol = HorariosAeronautico::first()->sol_puesta;

			if ($hora > $salidaSol && $hora < $puestaSol){
				switch ($nacionalidad) {
			    case 1:
					$eq_aterDesp     = PreciosAterrizajesDespegue::first()->eq_diurnoNac;
			        break;
			    case 2:
					$eq_aterDesp     = PreciosAterrizajesDespegue::first()->eq_diurnoInt;
			        break;
				}
			}else{
				switch ($nacionalidad) {
			    case 1:
					$eq_aterDesp     = PreciosAterrizajesDespegue::first()->eq_nocturNac;
			        break;
			    case 2:
					$eq_aterDesp     = PreciosAterrizajesDespegue::first()->eq_nocturInt;
			        break;
				}

			}

			$montoDes          = $eq_aterDesp * $ut;
			$cantidadDes       = '1';
			$iva               = Concepto::find($concepto_id)->iva;
			$montoIva          = ($iva * $montoDes)/100 ;
			$totalDes          = $montoDes + $montoIva;
			$aterrizajeDespegue->fill(compact('concepto_id', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($aterrizajeDespegue);
		}
		
		//Ítem de Puentes de Abordaje.
		if($despegue->cobrar_puenteAbordaje == '1'){
			$puenteAbordaje    = new Facturadetalle();
			$concepto_id       = CargosVario::first()->abordajeCredito_id;
			
			$hora = $despegue->aterrizaje->hora;
			$inicioOperaciones = HorariosAeronautico::first()->operaciones_inicio;
			$finOperaciones    = HorariosAeronautico::first()->operaciones_fin;

			if ($hora > $inicioOperaciones && $hora < $finOperaciones){
				$eq_puenteAbordaje = CargosVario::first()->eq_usoAbordajeSinHab;
			}else{
				$eq_puenteAbordaje = CargosVario::first()->eq_usoAbordajeConHab;
			}

			$tiempoUsoPuenteAbordaje = $despegue->tiempo_puenteAbord;
			$equivalente = $eq_puenteAbordaje * $ut;
			$montoDes          = $equivalente * $tiempoUsoPuenteAbordaje;
			$cantidadDes       = '1';
			$iva               = Concepto::find($concepto_id)->iva;
			$montoIva          = ($iva * $montoDes)/100 ;
			$totalDes          = $montoDes + $montoIva;
			$puenteAbordaje->fill(compact('concepto_id', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($puenteAbordaje);

		}

		//Ítem de Habilitación
		if($despegue->cobrar_habilitacion){
			$habilitacion           = new Facturadetalle();
			$concepto_id            = CargosVario::first()->habilitacionCredito_id;
			$eq_derechoHabilitacion = CargosVario::first()->eq_derechoHabilitacion;
			
			$montoDes     = $eq_derechoHabilitacion * $ut;
			$cantidadDes  = '1';
			$iva          = Concepto::find($concepto_id)->iva;
			$montoIva     = ($iva * $montoDes)/100 ;
			$totalDes     = $montoDes + $montoIva;
			$habilitacion->fill(compact('concepto_id', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($habilitacion);
		}

		return view('factura.facturaAeronautica.create', compact('factura'))->with(['despegue_id'=>$despegue->id]);
	}
}
