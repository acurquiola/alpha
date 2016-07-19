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
			$fecha            = $request->get('fecha');
			if($fecha == ""){
				$fecha = "0000-00-00";
			}else{
				$fecha            =\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
				$fecha            = $fecha->toDateString();
			}
			$hora            = $request->get('hora');
			if($hora == ""){
				$hora = "00:00:00";
			}
			$aeropuerto_id    =session('aeropuerto')->id;
			$despegues      = Despegue::filter($fecha, $hora, $request->get('aeronave_id'), $request->get('num_vuelo'),$request->get('puerto_id'), $request->get('cliente_id'), $aeropuerto_id);
			$despegues->with('factura');
			$totalDespegues = $despegues->count();
			$despegues      = $despegues->paginate(7);
			return view('despegues.partials.table', compact('despegues', 'totalDespegues'));
		}
		else
		{
			$aterrizajes         = Aterrizaje::all();
			$aeronaves           = Aeronave::all();
			$puertos             = Puerto::all();
			$pilotos             = Piloto::all();
			$nacionalidad_vuelos = NacionalidadVuelo::all();
			$aeronaves           = Aeronave::all();
			$tipoMatriculas      = TipoMatricula::all();
			$otrosCargos         = OtrosCargo::all();
			$today               = Carbon::now();
			$today->timezone     = 'America/New_York';


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
		$aterrizaje          = Aterrizaje::with("aeronave", "puerto", "nacionalidad_vuelo")->where('id', $aterrizaje)->first();
		$hangarLocal=false;
		if($aterrizaje->aeronave->hangar_id != NULL){
			$hangarID = $aterrizaje->aeronave->hangar_id;
			$hangar = \App\Hangar::find($hangarID);
			if($hangar->aeropuerto_id == session('aeropuerto')->id){
				$hangarLocal=true;
			}
		}
		$puertos             = Puerto::all();
		$pilotos             = Piloto::all();
		$nacionalidad_vuelos = NacionalidadVuelo::all();
		$aeronaves           = Aeronave::all();
		$tipoMatriculas      = TipoMatricula::all();
		$otrosCargos         = OtrosCargo::lists('nombre_cargo', 'id');
		$today               = Carbon::now();
		$today->timezone     = 'America/New_York';
		return view("despegues.create", compact("aterrizaje", "hangarLocal", "otrosCargos", "nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos", "today"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(DespegueRequest $request)
	{
		$despegue                         = Despegue::create($request->except("piloto_id", "puerto_id", "cliente_id", "cobrar_estacionamiento", "cobrar_puenteAbordaje", "cobrar_Formulario", "cobrar_AterDesp", "cobrar_habilitacion", "cobrar_carga", "cobrar_otrosCargos", "otrosCargo_id"));
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

			$puertoID  =$puerto=Puerto::find($request->get("puerto_id"));
			$pilotoID  =$piloto=Piloto::find($request->get("piloto_id"));
			$clienteID =$cliente=Cliente::find($request->get("cliente_id"));
			
			$puertoID  =($puertoID)?$puerto->id:NULL;
			$pilotoID  =($pilotoID)?$piloto->id:NULL;
			$clienteID =($clienteID)?$cliente->id:NULL;
			
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

	public function show( $aterrizaje, $id)
	{
		$despegue            = Despegue::find($id);
		$puertos             = Puerto::all();
		$pilotos             = Piloto::all();
		$nacionalidad_vuelos = NacionalidadVuelo::all();
		$aeronaves           = Aeronave::all();
		$tipoMatriculas      = TipoMatricula::all();
		$otrosCargos         = OtrosCargo::lists('nombre_cargo', 'id');
        return view("despegues.partials.show", compact("despegue", "otrosCargos", "nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($aterrizaje, $id)
	{
		$despegue            = Despegue::find($id);
		$puertos             = Puerto::all();
		$clientes             = Cliente::all();
		$pilotos             = Piloto::all();
		$nacionalidad_vuelos = NacionalidadVuelo::all();
		$aeronaves           = Aeronave::all();
		$tipoMatriculas      = TipoMatricula::all();
		$otrosCargos         = OtrosCargo::lists('nombre_cargo', 'id');
        return view("despegues.partials.edit", compact("despegue", "otrosCargos", "nacionalidad_vuelos", "tipoMatriculas", "aeronaves", "puertos", "pilotos"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($aterrizaje, $id, DespegueRequest $request)
	{
		$despegue     = Despegue::find($id);
		$despegue->update($request->except("nacionalidadVuelo_id", "piloto_id", "puerto_id", "cliente_id", "cobrar_estacionamiento", "cobrar_puenteAbordaje", "cobrar_Formulario", "cobrar_AterDesp", "cobrar_habilitacion", "cobrar_carga", "tiempo_estacionamiento"));
			
			$cobrarAterrizaje      =$request->input('cobrar_AterDesp');
			$cobrarFormulario      =$request->input('cobrar_Formulario');
			$cobrarPuentes         =$request->input('cobrar_puenteAbordaje');
			$cobrarEstacionamiento =$request->input('cobrar_estacionamiento');
			$cobrarCarga           =$request->input('cobrar_carga');
			
			$cobrarAterrizaje      =($cobrarAterrizaje)?1:0;
			$cobrarFormulario      =($cobrarFormulario)?1:0;
			$cobrarPuentes         =($cobrarPuentes)?1:0;
			$cobrarEstacionamiento =($cobrarEstacionamiento)?1:0;
			$cobrarCarga           =($cobrarCarga)?1:0;
			
			$despegue->cobrar_AterDesp        =$cobrarAterrizaje;
			$despegue->cobrar_Formulario      =$cobrarFormulario;
			$despegue->cobrar_puenteAbordaje  =$cobrarPuentes;
			$despegue->cobrar_estacionamiento =$cobrarEstacionamiento;
			$despegue->cobrar_carga           =$cobrarCarga;

			if($cobrarEstacionamiento == 1){

				$fechaAterrizaje       = $despegue->aterrizaje->fecha;
				$fechaAterrizaje       = Carbon::createFromFormat('d/m/Y', $fechaAterrizaje);
				$fechaAterrizaje       = $fechaAterrizaje->format('Y-m-d');
				$horaAterrizaje        = $despegue->aterrizaje->hora;
				$fecha_hora_aterrizaje = $fechaAterrizaje.' '.$horaAterrizaje;
				
				
				$fechaDespegue         = $request->fecha;
				$fechaDespegue         = Carbon::createFromFormat('d/m/Y', $fechaDespegue);
				$fechaDespegue         = $fechaDespegue->format('Y-m-d');
				$horaDespegue          = $despegue->hora;
				$fecha_hora_despegue   = $fechaDespegue.' '.$horaDespegue;
				
				$startTime             = Carbon::parse($fecha_hora_aterrizaje);
				$finishTime            = Carbon::parse($fecha_hora_despegue);

				$totalDuration = $finishTime->diffInMinutes($startTime);
				
				$despegue->tiempo_estacionamiento = $totalDuration;
			}


			//$despegue->cobrar_otrosCargos     =$request->input('cobrar_otrosCargos', 0);
			/*$otrosCargos =$request->input('otrosCargo_id', []);
			foreach ($otrosCargos as $oc) {
				$precio[] = \App\OtrosCargo::where('id', $oc)->first()->precio_cargo;
			}
			$despegue->otros_cargos()->sync($otrosCargos, array('precio'));
			*/
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
	public function destroy($aterrizaje, $id)
	{
		$despegue   = Despegue::find($id);
		$aterrizaje = Aterrizaje::find($aterrizaje);
        if(\App\Despegue::destroy($id)){
        	$aterrizaje->update(['despego'=>'0']);
            return ["success"=>1, "text" => "Despegue eliminado con éxito."];
        }else{
            return ["success"=>0, "text" => "Error eliminando el registro."];
        }

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
		$nroDosa = '1';
		$facturas = Factura::all()->count();
		if ($facturas>0){
			$dosas = Factura::where('nroDosa', '<>', 'NULL')->count();
			if($dosas>0){
				$nroDosa = Factura::where('nroDosa', '<>', 'NULL')->orderBy('nroDosa', 'DESC')->first()->nroDosa;
				if($nroDosa != NULL){
					$nroDosa = $nroDosa + 1;
				}
			}
		}
		
		$factura->fill(['aeropuerto_id' => $despegue->aeropuerto_id,
						'cliente_id'    => $despegue->cliente_id,
						'nroDosa'       => $nroDosa]);

		$factura->detalles = new Collection();

		//Ítem de Formulario.
		if($despegue->cobrar_Formulario == '1'){
			$formulario        = new Facturadetalle();
			$eq_formulario     = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_formulario;
			$precio_formulario = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->precio_formulario;
			switch ($condicionPago) {
				case 'Contado':
				$concepto_id  = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->formularioContado_id;
				break;
				case 'Crédito':
				$concepto_id  = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->formularioCredito_id;
				break;
			}
			$montoDes          = $precio_formulario+0;
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
			$nacionalidad    = $despegue->aterrizaje->nacionalidadVuelo_id;

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
				$minutosLibre           = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->tiempoLibreNac;
				$eq_bloque              = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_bloqueNac;
				$precio_estacionamiento = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->precio_estNac;
				$minutosBloque          = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->minBloqueNac;
				break;
				case 2:
				$minutosLibre           = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->tiempoLibreInt;
				$eq_bloque              = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_bloqueInt;
				$precio_estacionamiento = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->precio_estInt;
				$minutosBloque          = EstacionamientoAeronave::where('aeropuerto_id', session('aeropuerto')->id)->first()->minBloqueInt;
				break;

			}

			$tiempo_estacionamiento = $despegue->tiempo_estacionamiento;
			$tiempoAFacturar        = ($tiempo_estacionamiento - $minutosLibre)/$minutosBloque;


			if($tiempoAFacturar > 0){
                $tiempoAFacturar=ceil($tiempoAFacturar);

				$equivalente            = number_format($precio_estacionamiento, 2);
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
			$nacionalidad       = $despegue->aterrizaje->nacionalidadVuelo_id;
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
					$precio_AterDesp     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->precio_diurnoNac;
					$tipoAterrizaje  = 'Diuno Nacional';
					break;
					case 2:
					$eq_aterDesp     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_diurnoInt;
					$precio_AterDesp     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->precio_diurnoInt;
					$tipoAterrizaje  = 'Nocturno Nacional';
					break;
				}
			}else{
				switch ($nacionalidad) {
					case 1:
					$eq_aterDesp     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_nocturNac;
					$precio_AterDesp     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->precio_nocturNac;
					$tipoAterrizaje  = 'Diuno Internacional';
					break;
					case 2:
					$eq_aterDesp     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_nocturInt;
					$precio_AterDesp     = PreciosAterrizajesDespegue::where('aeropuerto_id', session('aeropuerto')->id)->first()->precio_nocturInt;
					$tipoAterrizaje  = 'Nocturno Internacional';
					break;
				}

			}
			$montoDes          = $precio_AterDesp * $peso_aeronave;
			$cantidadDes       = '1';
			$iva               = Concepto::find($concepto_id)->iva;
			$montoIva          = ($iva * $montoDes)/100 ;
			$totalDes          = $montoDes + $montoIva;
			$descripcionAterrizaje = '- Aterrizaje '.$tipoAterrizaje;
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
				$eq_puenteAbordaje     = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_usoAbordajeSinHab;
				$precio_puenteAbordaje = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->precio_usoAbordajeSinHab;
			}else{
				$eq_puenteAbordaje     = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_usoAbordajeConHab;
				$precio_puenteAbordaje = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->precio_usoAbordajeConHab;
			}


			$tiempoUsoPuenteAbordaje = $despegue->tiempo_puenteAbord;
			$equivalente             = $precio_puenteAbordaje+0;
			$montoDes                = $equivalente * $tiempoUsoPuenteAbordaje;
			$cantidadDes             = '1';
			$iva                     = Concepto::find($concepto_id)->iva;
			$montoIva                = ($iva * $montoDes)/100 ;
			$totalDes                = $montoDes + $montoIva;
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

			$pesoEmb      = $despegue->peso_embarcado;
			$pesoDesemb   = $despegue->peso_desembarcado;
			$pesoBloque   = PreciosCarga::where('aeropuerto_id', session('aeropuerto')->id)->first()->toneladaPorBloque;
			$pesoCargado  = ($pesoDesemb + $pesoEmb / $pesoBloque);
			$eq_Carga     = PreciosCarga::where('aeropuerto_id', session('aeropuerto')->id)->first()->equivalenteUT;
			$precio_carga = PreciosCarga::where('aeropuerto_id', session('aeropuerto')->id)->first()->precio_carga;
			$equivalente  = $precio_carga+0;
			
			$montoDes     = $equivalente * $pesoCargado;
			$cantidadDes  = '1';
			$iva          = Concepto::find($concepto_id)->iva;
			$montoIva     = ($iva * $montoDes)/100 ;
			$totalDes     = $montoDes + $montoIva;
			$carga->fill(compact('concepto_id', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($carga);

		}

		//Ítem de Habilitación

		if($despegue->cobrar_habilitacion == '1'){
			$habilitacion               = new Facturadetalle();
			$eq_derechoHabilitacion     = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->eq_derechoHabilitacion;
			$precio_derechoHabilitacion = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->precio_derechoHabilitacion;


			switch ($condicionPago) {
				case 'Contado':
				$concepto_id            = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->habilitacionContado_id;
				break;
				case 'Crédito':
				$concepto_id            = CargosVario::where('aeropuerto_id', session('aeropuerto')->id)->first()->habilitacionCredito_id;
				break;
			}

			$montoDes     = $precio_derechoHabilitacion+0;
			$cantidadDes  = '1';
			$iva          = Concepto::find($concepto_id)->iva;
			$montoIva     = ($iva * $montoDes)/100 ;
			$totalDes     = $montoDes + $montoIva;
			$habilitacion->fill(compact('concepto_id', 'condicionPago', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
			$factura->detalles->push($habilitacion);
		}


		//Ítem de Otros Cargos

		if($despegue->cobrar_otrosCargos == '1'){

			$otros = $despegue->otros_cargos()->get();

			foreach($otros as $oc){
				$otrosCargos           = new Facturadetalle();


					switch ($condicionPago) {
						case 'Contado':
						$concepto_id            = $oc->conceptoContado_id;
						break;
						case 'Crédito':
						$concepto_id            = $oc->conceptoCredito_id;
						break;
					}

							/*$precioTotal = 0;
							foreach ($cargos as $oc) {
								$precio = \App\OtrosCargo::where('id', $oc->id)->first()->precio_cargo;
								$precioTotal = $precio + $precioTotal;
							}*/


				$montoDes     = $oc->precio_cargo;
				$cantidadDes  = '1';
				$iva          = Concepto::find($concepto_id)->iva;
				$montoIva     = ($iva * $montoDes)/100 ;
				$totalDes     = $montoDes + $montoIva;
				$otrosCargos->fill(compact('concepto_id', 'condicionPago', 'montoDes', 'cantidadDes', 'iva', 'totalDes'));
				$factura->detalles->push($otrosCargos);
		}
	}

        $modulo= \App\Modulo::where('nombre','DOSAS')->where('aeropuerto_id', session('aeropuerto')->id)->first();
        if(!$modulo){
            return response("No se consiguio el modulo 'DOSAS' en el aeropuerto de sesion", 500);
        }
        $modulo_id=$modulo->id;

		$view=view('factura.facturaAeronautica.create', compact('factura', 'condicionPago', 'modulo_id', 'modulo'))->with(['despegue_id'=>$despegue->id]);

		if(isset($descripcionAterrizaje))
			$view->with(['descripcionAterrizaje'=>$descripcionAterrizaje]);
		return $view;

	}

	public function getGenerarCobranza($id){

        $despegue = Despegue::find($id);
        $factura = $despegue->factura;
        $cliente = $factura->cliente;
		$idOperator=">=";
        $id=0;
        $moduloName='DOSAS';
        $modulo=\App\Modulo::where("nombre","like",$moduloName)->where('aeropuerto_id', session(aeropuerto)->id)->orderBy("nombre")->first();
        $id=$modulo->id;
        $idOperator="=";
        $today               = \Carbon\Carbon::now();
        $today->timezone     = 'America/New_York';

/*
        $clientes=\App\Cliente::join('facturas','facturas.cliente_id' , '=', 'clientes.id')
            ->join('facturadetalles','facturas.nFactura' , '=', 'facturadetalles.factura_id')
        ->join('conceptos','conceptos.id' , '=', 'facturadetalles.concepto_id')
        ->where('facturas.nFactura','=',$despegue->factura_id)
        ->where('facturas.aeropuerto_id','=', session('aeropuerto')->id)
        ->where('conceptos.modulo_id', $idOperator, $id)
        ->where('facturas.estado','=','P')
        ->where('facturas.cliente_id','=',$cliente->id)
        ->orderBy('clientes.nombre')
        ->groupBy("clientes.id")->get();*/
        $bancos=\App\Banco::with('cuentas')->get();
        return view('cobranza.cobranzaSCV.create',compact('factura', 'cliente','moduloName', 'bancos','id', 'despegue', 'today'));
	}



    public function getDosaClientes($id, Request $request){
		$dosa       = Despegue::find($id)->factura;
		$idOperator =">=";
		$id         =0;
        $modulo=\App\Modulo::where("nombre","like",'DOSAS')
            ->where('aeropuerto_id', session('aeropuerto')->id)
            ->first();
        $id=$modulo->id;
        $idOperator="=";
        $codigo=$request->get('codigo');
        $cliente=\App\Cliente::where("codigo","=", $codigo)->get()->first();
        if(!$cliente)
            return ["facturas"=>[], "ajuste"=> []];
        $facturas=\App\Factura::with('metadata')
            ->where('cliente_id', $cliente->id)
            ->where('modulo_id', $idOperator, $id)
            ->where('aeropuerto_id', session('aeropuerto')->id)
            ->where('facturas.estado','=','P')
            ->where('facturas.condicionPago','=','Contado')
            ->where('facturas.id','=', $dosa->id)
            ->groupBy("facturas.id")->get();
        $ajusteCliente= \DB::table('ajustes')
            ->where('cliente_id', $cliente->id)
            ->sum('monto');
            

        return ["facturas"=>$facturas];
    }

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postGenerarCobranza(Request $request)
	{

        \DB::transaction(function () use ($request) {
        $cobro=\App\Cobro::create([
            'cliente_id' => $request->get('cliente_id'),
            'modulo_id'=>$request->get('modulo_id'),
            'aeropuerto_id' => session('aeropuerto')->id]);
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
            $cobro->facturas()
            ->attach([$factura->id =>
                ['monto' => $f["montoAbonado"],
                'base' => $base,
                'iva' => $iva,
                'islrpercentage' => $f["islrpercentage"],
                'ivapercentage' => $f["ivapercentage"],
                'retencion' => $retencion,
                'total' => $abonadoReal,
                'retencionFecha' => $f["retencionFecha"],
                'retencionComprobante' => $f["retencionComprobante"],
                ]]);
            if($facturaMetadata->total==$factura->total){
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
        $cobro->observacion=$request->get('observacion');
        $cobro->hasrecaudos=$request->get('hasrecaudos');
        $cobro->save();
        });

        return ["success"=>1];
	}

}
