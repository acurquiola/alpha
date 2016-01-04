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
use App\PreciosCarga;

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
			->where('puerto_id', $puertoOperador, $puerto_id)
			->where('aeropuerto_id', session('aeropuerto')->id);

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
		$aterrizaje          = Aterrizaje::with("aeronave", "puerto")->where('id', $aterrizaje)->first();
		$puertos             = Puerto::all();
		$pilotos             = Piloto::all();
		$nacionalidad_vuelos = NacionalidadVuelo::all();
		$aeronaves           = Aeronave::all();
		$tipoMatriculas      = TipoMatricula::all();
		$otrosCargos         = OtrosCargo::lists('nombre_cargo', 'id');
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
		$despegue                         = Despegue::create($request->except("nacionalidadVuelo_id", "piloto_id", "puerto_id", "cliente_id", "cobrar_estacionamiento", "cobrar_puenteAbordaje", "cobrar_Formulario", "cobrar_AterDesp", "cobrar_habilitacion", "cobrar_carga", "cobrar_otrosCargos", "otrosCargo_id"));
		$aterrizaje                       = Aterrizaje::find($request->get("aterrizaje_id"));
		$aterrizaje->despegue()->save($despegue);
		$aterrizaje->update(["despego"    =>"1"]);
		$despegue->cobrar_estacionamiento =$request->input('cobrar_estacionamiento', 0);
		$despegue->cobrar_puenteAbordaje  =$request->input('cobrar_puenteAbordaje', 0);
		$despegue->cobrar_Formulario      =$request->input('cobrar_Formulario', 1);
		$despegue->cobrar_AterDesp        =$request->input('cobrar_AterDesp', 0);
		$despegue->cobrar_AterDesp        =$request->input('cobrar_AterDesp', 0);	
		$despegue->cobrar_carga           =$request->input('cobrar_carga', 0);	
		$despegue->cobrar_otrosCargos     =$request->input('cobrar_otrosCargos', 0);
		$otrosCargos =$request->input('otrosCargo_id', []);
		foreach ($otrosCargos as $oc) {
			$precio[] = \App\OtrosCargo::where('id', $oc)->first()->precio_cargo;
		}
		$despegue->otros_cargos()->sync($otrosCargos, array('precio'));
		
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
	public function show(Despegue $despegue)
	{
		$aterrizaje          = Aterrizaje::with("aeronave", "puerto")->where('id', $aterrizaje)->first();
		$puertos             = Puerto::all();
		$pilotos             = Piloto::all();
		$nacionalidad_vuelos = NacionalidadVuelo::all();
		$aeronaves           = Aeronave::all();
		$tipoMatriculas      = TipoMatricula::all();
		$otrosCargos         = OtrosCargo::lists('nombre_cargo', 'id');
        return view("despegues.partials.show", compact("aterrizaje", "otrosCargos", "nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$aterrizaje          = Aterrizaje::with("aeronave", "puerto")->where('id', $aterrizaje)->first();
		$puertos             = Puerto::all();
		$pilotos             = Piloto::all();
		$nacionalidad_vuelos = NacionalidadVuelo::all();
		$aeronaves           = Aeronave::all();
		$tipoMatriculas      = TipoMatricula::all();
		$otrosCargos         = OtrosCargo::lists('nombre_cargo', 'id');
        return view("despegues.partials.edit", compact("aterrizaje", "otrosCargos", "nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$despegue   = Despegue::find($id);
		$despegue   = Despegue::update($request->except("nacionalidadVuelo_id", "piloto_id", "puerto_id", "cliente_id", "cobrar_estacionamiento", "cobrar_puenteAbordaje", "cobrar_Formulario", "cobrar_AterDesp", "cobrar_habilitacion", "cobrar_carga", "cobrar_otrosCargos", "otrosCargo_id"));
		$aterrizaje = Aterrizaje::find($request->get("aterrizaje_id"));
		$aterrizaje->despegue()->save($despegue);
		$aterrizaje->update(["despego"    =>"1"]);
		$despegue->cobrar_estacionamiento =$request->input('cobrar_estacionamiento', 0);
		$despegue->cobrar_puenteAbordaje  =$request->input('cobrar_puenteAbordaje', 0);
		$despegue->cobrar_Formulario      =$request->input('cobrar_Formulario', 1);
		$despegue->cobrar_AterDesp        =$request->input('cobrar_AterDesp', 0);
		$despegue->cobrar_AterDesp        =$request->input('cobrar_AterDesp', 0);	
		$despegue->cobrar_carga           =$request->input('cobrar_carga', 0);	
		$despegue->cobrar_otrosCargos     =$request->input('cobrar_otrosCargos', 0);
		$otrosCargos =$request->input('otrosCargo_id', []);
		foreach ($otrosCargos as $oc) {
			$precio[] = \App\OtrosCargo::where('id', $oc)->first()->precio_cargo;
		}
		$despegue->otros_cargos()->sync($otrosCargos, array('precio'));
		
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

			return response()->json(array("text"   =>'Despegue modificado exitósamente',
			                       				"success"=>1));
		}
		else
		{
			response()->json(array("text"=>'Error modificando el despegue',"success"=>0));
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
		//
	}

	public function getCrearFactura($id)
	{
		//Información general de la factura a crear.
		$despegue      = Despegue::find($id);
		$factura       = new Factura();
		$modulo        = \App\Modulo::find(5)->nombre;
		$ut            = MontosFijo::where('aeropuerto_id', session('aeropuerto')->id)->first()->unidad_tributaria;
		$condicionPago = $despegue->condicionPago;
		$peso          = ($despegue->aterrizaje->aeronave->peso)/1000;
		$peso_aeronave = ceil($peso);
		$nroDosa = Factura::where('nroDosa', '<>', 'NULL')->orderBy('nroDosa', 'DESC')->first()->nroDosa;
		$nroDosa = $nroDosa + 1;
		
		$factura->fill(['aeropuerto_id' => $despegue->aeropuerto_id,
										'cliente_id'    => $despegue->cliente_id,
										'nroDosa'       => $nroDosa]);

		$factura->detalles = new Collection();

		//Ítem de Formulario.
		if($despegue->cobrar_Formulario == '1'){
			$formulario        = new Facturadetalle();
			$eq_formulario     = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_formulario;
			switch ($condicionPago) {
				case 'Contado':
				$concepto_id  = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->formularioContado_id;
				break;
				case 'Crédito':
				$concepto_id  = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->formularioCredito_id;
				break;
			}
			$montoDes          = $eq_formulario * $ut;
			$cantidadDes       = '1';
			$iva               = Concepto::find($concepto_id)->iva;
			$montoIva          = ($iva * $montoDes)/100 ;
			$totalDes          = $montoDes + $montoIva;
			$formulario->fill(compact('concepto_id', 'condicionPago', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($formulario);
		}

		//Ítem de Estacionamiento.

		if($despegue->cobrar_estacionamiento == '1'){
			$estacionamiento = new Facturadetalle();
			$nacionalidad    = $despegue->nacionalidadVuelo_id;

			switch ($condicionPago) {
				case 'Contado':
				$concepto_id     = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->conceptoContado_id;
				break;
				case 'Crédito':
				$concepto_id     = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->conceptoCredito_id;
				break;
			}

			switch ($nacionalidad) {
				case 1:
				$minutosLibre  = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->tiempoLibreNac;
				$eq_bloque     = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_bloqueNac;
				$minutosBloque = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->minBloqueNac;
				break;
				case 2:
				$minutosLibre  = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->tiempoLibreInt;
				$eq_bloque     = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_bloqueInt;
				$minutosBloque = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->minBloqueInt;
				break;

			}

			$tiempo_estacionamiento = $despegue->tiempo_estacionamiento;
			$tiempoAFacturar        = ($tiempo_estacionamiento - $minutosLibre)/$minutosBloque;

			if($tiempoAFacturar > 0){
                $tiempoAFacturar=ceil($tiempoAFacturar);

				$equivalente            = ($eq_bloque * $ut);
				$montoDes               = $equivalente * $tiempoAFacturar * $peso_aeronave;
				$cantidadDes            = '1';
				$iva                    = Concepto::find($concepto_id)->iva;
				$montoIva               = ($iva * $montoDes)/100 ;
				$totalDes               = $montoDes + $montoIva;		
				$estacionamiento->fill(compact('concepto_id', 'condicionPago',  'montoDes', 'cantidadDes', 'iva', 'totalDes'));
				$factura->detalles->push($estacionamiento);
			}
		}

		//Ítem de Aterrizaje y Despegue

		if($despegue->cobrar_AterDesp == '1'){
			$aterrizajeDespegue = new Facturadetalle();
			$nacionalidad       = $despegue->nacionalidadVuelo_id;
			$hora               = $despegue->aterrizaje->hora;
			$salidaSol          = HorariosAeronautico::where('aeropuerto_id', session('aeropuerto')->id)->first()->sol_salida;
			$puestaSol          = HorariosAeronautico::where('aeropuerto_id', session('aeropuerto')->id)->first()->sol_puesta;

			switch ($condicionPago) {
				case 'Contado':
				$concepto_id     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->conceptoContado_id;
				break;
				case 'Crédito':
				$concepto_id     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->conceptoCredito_id;
				break;
			}


			if ($hora > $salidaSol && $hora < $puestaSol){
				switch ($nacionalidad) {
					case 1:
					$eq_aterDesp     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_diurnoNac;
					$tipoAterrizaje  = 'Diuno Nacional';
					break;
					case 2:
					$eq_aterDesp     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_diurnoInt;
					$tipoAterrizaje  = 'Nocturno Nacional';
					break;
				}
			}else{
				switch ($nacionalidad) {
					case 1:
					$eq_aterDesp     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_nocturNac;
					$tipoAterrizaje  = 'Diuno Internacional';
					break;
					case 2:
					$eq_aterDesp     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_nocturInt;
					$tipoAterrizaje  = 'Nocturno Internacional';
					break;
				}

			}

			$montoDes          = $eq_aterDesp * $ut * $peso_aeronave;
			$cantidadDes       = '1';
			$iva               = Concepto::find($concepto_id)->iva;
			$montoIva          = ($iva * $montoDes)/100 ;
			$totalDes          = $montoDes + $montoIva;
			$aterrizajeDespegue->fill(compact('concepto_id', 'condicionPago',  'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($aterrizajeDespegue);
		}
		
		//Ítem de Puentes de Abordaje.
		if($despegue->cobrar_puenteAbordaje == '1'){
			$puenteAbordaje    = new Facturadetalle();		
			$hora              = $despegue->aterrizaje->hora;
			$inicioOperaciones = HorariosAeronautico::where('aeropuerto_id', session('aeropuerto')->id)->first()->operaciones_inicio;
			$finOperaciones    = HorariosAeronautico::where('aeropuerto_id', session('aeropuerto')->id)->first()->operaciones_fin;


			switch ($condicionPago) {
				case 'Contado':
				$concepto_id     = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->abordajeContado_id;
				break;
				case 'Crédito':
				$concepto_id     = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->abordajeCredito_id;
				break;
			}

			if ($hora > $inicioOperaciones && $hora < $finOperaciones){
				$eq_puenteAbordaje = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_usoAbordajeSinHab;
			}else{
				$eq_puenteAbordaje = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_usoAbordajeConHab;
			}


			$tiempoUsoPuenteAbordaje = $despegue->tiempo_puenteAbord;
			$equivalente = $eq_puenteAbordaje * $ut;
			$montoDes          = $equivalente * $tiempoUsoPuenteAbordaje;
			$cantidadDes       = '1';
			$iva               = Concepto::find($concepto_id)->iva;
			$montoIva          = ($iva * $montoDes)/100 ;
			$totalDes          = $montoDes + $montoIva;
			$puenteAbordaje->fill(compact('concepto_id', 'condicionPago',  'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($puenteAbordaje);

		}
		
		//Ítem de Puentes de Abordaje.
		if($despegue->cobrar_carga == '1'){

			$carga    = new Facturadetalle();		
			
			switch ($condicionPago) {
				case 'Contado':
				$concepto_id     = PreciosCarga::where('aeropuerto_id', session('aeropuerto')->id)->first()->conceptoContado_id;
				break;
				case 'Crédito':
				$concepto_id     = PreciosCarga::where('aeropuerto_id', session('aeropuerto')->id)->first()->conceptoCredito_id;
				break;
			}

			$pesoEmb     = $despegue->peso_embarcado;
			$pesoDesemb  = $despegue->peso_desembarcado;
			$pesoBloque  = PreciosCarga::where('aeropuerto_id', session('aeropuerto')->id)->first()->toneladaPorBloque;
			$pesoCargado = ($pesoDesemb + $pesoEmb / $pesoBloque);
			$eq_Carga    = PreciosCarga::where('aeropuerto_id', session('aeropuerto')->id)->first()->equivalenteUT;
			$equivalente = $eq_Carga  * $ut;

			$montoDes          = $equivalente * $pesoCargado;
			$cantidadDes       = '1';
			$iva               = Concepto::find($concepto_id)->iva;
			$montoIva          = ($iva * $montoDes)/100 ;
			$totalDes          = $montoDes + $montoIva;
			$carga->fill(compact('concepto_id', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($carga);

		}

		//Ítem de Habilitación

		if($despegue->cobrar_habilitacion == '1'){
			$habilitacion           = new Facturadetalle();
			$eq_derechoHabilitacion = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_derechoHabilitacion;


			switch ($condicionPago) {
				case 'Contado':
				$concepto_id            = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->habilitacionContado_id;
				break;
				case 'Crédito':
				$concepto_id            = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->habilitacionCredito_id;
				break;
			}

			$montoDes     = $eq_derechoHabilitacion * $ut;
			$cantidadDes  = '1';
			$iva          = Concepto::find($concepto_id)->iva;
			$montoIva     = ($iva * $montoDes)/100 ;
			$totalDes     = $montoDes + $montoIva;
			$habilitacion->fill(compact('concepto_id', 'condicionPago', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($habilitacion);
		}


		//Ítem de Otros Cargos

		if($despegue->cobrar_otrosCargos == '1'){
			$otrosCargos           = new Facturadetalle();

			switch ($condicionPago) {
				case 'Contado':
				$concepto_id            = OtrosCargo::where('aeropuerto_id', session('aeropuerto')->id)->first()->conceptoContado_id;
				break;
				case 'Crédito':
				$concepto_id            = OtrosCargo::where('aeropuerto_id', session('aeropuerto')->id)->first()->conceptoCredito_id;
				break;
			}


			$cargos = $despegue->otros_cargos()->get();

			$precioTotal = 0;
				foreach ($cargos as $oc) {
					$precio = \App\OtrosCargo::where('id', $oc->id)->first()->precio_cargo;
					$precioTotal = $precio + $precioTotal;
				}


			$montoDes     = $precioTotal;
			$cantidadDes  = '1';
			$iva          = Concepto::find($concepto_id)->iva;
			$montoIva     = ($iva * $montoDes)/100 ;
			$totalDes     = $montoDes + $montoIva;
			$otrosCargos->fill(compact('concepto_id', 'condicionPago', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($otrosCargos);
		}

        $modulo= \App\Modulo::where('nombre','DOSAS')->where('aeropuerto_id', session('aeropuerto')->id)->first();
        if(!$modulo){
            return response("No se consiguio el modulo 'DOSAS' en el aeropuerto de sesion", 500);
        }
        $modulo_id=$modulo->id;

		$view=view('factura.facturaAeronautica.create', compact('factura', 'condicionPago', 'modulo_id', 'modulo'))->with(['despegue_id'=>$despegue->id]);

		if(isset($tipoAterrizaje))
			$view->with(['tipoAterrizaje'=>$tipoAterrizaje]);
		return $view;

	}
}
