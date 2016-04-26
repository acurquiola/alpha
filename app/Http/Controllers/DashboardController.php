<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {

	public function indexSCV()
	{
		$comerciales      = \App\TipoMatricula::where('nombre', 'Comercial')->first()->id;
		$comercialPrivado = \App\TipoMatricula::where('nombre', 'Comercial Privado')->first()->id;
		$privado          = \App\TipoMatricula::where('nombre', 'Privado')->first()->id;
		$fecha            = \Carbon\Carbon::now();
		$hoy              = $fecha->toDateString();
		
		$aterrizajes                     = 0;
		$despegues                       = 0;
		$aterrizajesComerciales          = 0;
		$despeguesComerciales            = 0;
		$aterrizajesComercialPrivado     = 0;
		$despeguesComercialPrivado       = 0;
		$aterrizajesPrivados             = 0;
		$despeguesPrivados               = 0;
		$otrosDespegues                  = 0;
		$otrosAterrizajes                = 0;
		
		$desembarqueComercialAd          = 0;
		$desembarqueComercialInf         = 0;
		$desembarqueComercialTerc        = 0;
		$desembarqueComercial            = 0;
		$desembarquePrivadoAd            = 0;
		$desembarquePrivadoInf           = 0;
		$desembarquePrivadoTerc          = 0;
		$desembarquePrivado              = 0;
		$desembarqueComercialPrivadoAd   = 0;
		$desembarqueComercialPrivadoInf  = 0;
		$desembarqueComercialPrivadoTerc = 0;
		$desembarqueComercialPrivado     = 0;
		$desembarqueTotal                = 0;
		$desembarqueOtrosVuelos          = 0;
		
		$embarqueComercialAd             = 0;
		$embarqueComercialInf            = 0;
		$embarqueComercialTerc           = 0;
		$embarqueComercial               = 0;
		$embarquePrivadoAd               = 0;
		$embarquePrivadoInf              = 0;
		$embarquePrivadoTerc             = 0;
		$embarquePrivado                 = 0;
		$embarqueComercialPrivadoAd      = 0;
		$embarqueComercialPrivadoInf     = 0;
		$embarqueComercialPrivadoTerc    = 0;
		$embarqueComercialPrivado        = 0;
		$embarqueTotal                   = 0;
		$embarqueOtrosVuelos             = 0;

		$aterrizajes = \App\Aterrizaje::where('aeropuerto_id', session('aeropuerto')->id)
									   ->where('fecha', $hoy)
									   ->get();


		$despegues = \App\Despegue::where('aeropuerto_id', session('aeropuerto')->id)
								   ->where('fecha', $hoy)
								   ->get();

		$aterrizajesTotal =$aterrizajes->count();
		$despeguesTotal   =$despegues->count();

		if($aterrizajesTotal!=0 || $despeguesTotal!=0){
			
			$aterrizajesComerciales          = $aterrizajes->where('tipoMatricula_id', $comerciales)->count();
			$despeguesComerciales            = $despegues->where('tipoMatricula_id', $comerciales)->count();
			$aterrizajesComercialPrivado     = $aterrizajes->where('tipoMatricula_id', $comercialPrivado)->count();
			$despeguesComercialPrivado       = $despegues->where('tipoMatricula_id', $comercialPrivado)->count();
			$aterrizajesPrivados             = $aterrizajes->where('tipoMatricula_id', $privado)->count();
			$despeguesPrivados               = $despegues->where('tipoMatricula_id', $privado)->count();
			
			$otrosDespegues                  = $despeguesTotal-($despeguesComerciales+$despeguesComercialPrivado+$despeguesPrivados);
			$otrosAterrizajes                = $aterrizajesTotal-($aterrizajesComerciales+$aterrizajesComercialPrivado+$aterrizajesPrivados);
			
			$desembarqueComercialAd          = $aterrizajes->where('tipoMatricula_id', $comerciales)->sum('desembarqueAdultos');
			$desembarqueComercialInf         = $aterrizajes->where('tipoMatricula_id', $comerciales)->sum('desembarqueInfantes');
			$desembarqueComercialTerc        = $aterrizajes->where('tipoMatricula_id', $comerciales)->sum('desembarqueTercera');
			$desembarqueComercial            = $desembarqueComercialAd+$desembarqueComercialInf+$desembarqueComercialTerc;
			$desembarquePrivadoAd            = $aterrizajes->where('tipoMatricula_id', $privado)->sum('desembarqueAdultos');
			$desembarquePrivadoInf           = $aterrizajes->where('tipoMatricula_id', $privado)->sum('desembarqueInfantes');
			$desembarquePrivadoTerc          = $aterrizajes->where('tipoMatricula_id', $privado)->sum('desembarqueTercera');
			$desembarquePrivado              = $desembarquePrivadoAd+$desembarquePrivadoInf+$desembarquePrivadoTerc;
			$desembarqueComercialPrivadoAd   = $aterrizajes->where('tipoMatricula_id', $comercialPrivado)->sum('desembarqueAdultos');
			$desembarqueComercialPrivadoInf  = $aterrizajes->where('tipoMatricula_id', $comercialPrivado)->sum('desembarqueInfantes');
			$desembarqueComercialPrivadoTerc = $aterrizajes->where('tipoMatricula_id', $comercialPrivado)->sum('desembarqueTercera');
			$desembarqueComercialPrivado     = $desembarqueComercialPrivadoAd+$desembarqueComercialPrivadoInf+$desembarqueComercialPrivadoTerc;
			$desembarqueTotal                = $aterrizajes->sum('desembarqueAdultos')+$aterrizajes->sum('desembarqueInfantes')+$aterrizajes->sum('desembarqueTercera');
			$desembarqueOtrosVuelos          = $desembarqueTotal-($desembarqueComercial+$desembarquePrivado+$desembarqueComercialPrivado);
			
			$embarqueComercialAd             = $despegues->where('tipoMatricula_id', $comerciales)->sum('embarqueAdultos');
			$embarqueComercialInf            = $despegues->where('tipoMatricula_id', $comerciales)->sum('embarqueInfante');
			$embarqueComercialTerc           = $despegues->where('tipoMatricula_id', $comerciales)->sum('embarqueTercera');
			$embarqueComercial               = $embarqueComercialAd+$embarqueComercialInf+$embarqueComercialTerc;
			$embarquePrivadoAd               = $despegues->where('tipoMatricula_id', $privado)->sum('embarqueAdultos'); 
			$embarquePrivadoInf              = $despegues->where('tipoMatricula_id', $privado)->sum('embarqueInfante');
			$embarquePrivadoTerc             = $despegues->where('tipoMatricula_id', $privado)->sum('embarqueTercera');
			$embarquePrivado                 = $embarquePrivadoAd+$embarquePrivadoInf+$embarquePrivadoTerc;
			$embarqueComercialPrivadoAd      = $despegues->where('tipoMatricula_id', $comercialPrivado)->sum('embarqueAdultos');
			$embarqueComercialPrivadoInf     = $despegues->where('tipoMatricula_id', $comercialPrivado)->sum('embarqueInfante');
			$embarqueComercialPrivadoTerc    = $despegues->where('tipoMatricula_id', $comercialPrivado)->sum('embarqueTercera');
			$embarqueComercialPrivado        = $embarqueComercialPrivadoAd+$embarqueComercialPrivadoInf+$embarqueComercialPrivadoTerc;
			$embarqueTotal                   = $despegues->sum('embarqueAdultos')+$despegues->sum('embarqueInfante')+$despegues->sum('embarqueTercera');
			$embarqueOtrosVuelos             = $embarqueTotal-($embarqueComercial+$embarquePrivado+$embarqueComercialPrivado);


		}

		$aterrizajesPendientes = \App\Aterrizaje::where('aeropuerto_id',session('aeropuerto')->id)
												->where('despego', 0)
												->orderBy('fecha', 'DESC')
												->orderBy('hora', 'DESC')
												->limit(5)
												->get();


		$despeguesRecientes = \App\Despegue::where('aeropuerto_id', session('aeropuerto')->id)
											->orderBy('fecha', 'DESC')
											->orderBy('hora', 'DESC')
											->limit(5)
											->get();

        $facturas = \App\Factura::where('fecha', $hoy)
                                ->where('facturas.deleted_at', null)
                                ->where('aeropuerto_id', session('aeropuerto')->id)
                                ->where('nroDosa', '<>', 'NULL')
                                ->get();

        $facturasTotal   = $facturas->sum('total');

        $facturasCredito = $facturas->where('condicionPago', 'Crédito')
                                    ->sum('total');

        $facturasContado = $facturas->where('condicionPago', 'Contado')
                                    ->sum('total');


		return view('dashboards.SCV.partials.index', compact('hoy', 'aterrizajesComerciales', 'despeguesComerciales', 'aterrizajesComercialPrivado','despeguesComercialPrivado', 'aterrizajesPrivados', 'despeguesPrivados', 'otrosDespegues' ,'otrosAterrizajes', 'desembarqueComercial', 'desembarquePrivado', 'desembarqueComercialPrivado', 'desembarqueOtrosVuelos','embarqueComercial', 'embarquePrivado', 'embarqueComercialPrivado', 'embarqueOtrosVuelos', 'aterrizajesPendientes', 'aterrizajesTotal', 'despeguesRecientes', 'facturasTotal', 'facturasCredito', 'facturasContado'));
	}

	public function indexRecaudacion()
	{

        $facturas=\App\Factura::select("facturas.*","clientes.nombre as clienteNombre", "modulos.nombre as moduloNombre")
                            ->join('clientes','clientes.id' , '=', 'facturas.cliente_id')
                            ->join('modulos','modulos.id' , '=', 'facturas.modulo_id')
                            ->where('facturas.aeropuerto_id','=', session('aeropuerto')->id)
                            ->where('estado', 'like', 'P')
                            ->where('facturas.deleted_at', null)
                            ->orderBy('nFactura', 'DESC')
                            ->limit(5)
                            ->get();  

        $cobros=\App\Factura::with('cobros')
        					->select("facturas.*","clientes.nombre as clienteNombre", "modulos.nombre as moduloNombre")
                            ->join('clientes','clientes.id' , '=', 'facturas.cliente_id')
                            ->join('modulos','modulos.id' , '=', 'facturas.modulo_id')
                            ->where('facturas.aeropuerto_id','=', session('aeropuerto')->id)
                            ->where('estado', 'like', 'C')
                            ->where('facturas.deleted_at', null)
                            ->orderBy('nFactura', 'DESC')
                            ->limit(5)
                            ->get();  

		$hoy     = \Carbon\Carbon::now()->toDateString();
		
		$diaAnno =\Carbon\Carbon::create(\Carbon\Carbon::now()->year, 1,1);

        $recaudadoAnual=\App\Cobro::where('cobros.created_at','>=' ,$diaAnno->toDateTimeString())
			            ->where('cobros.aeropuerto_id',session('aeropuerto')->id)
			            ->sum('montodepositado');

        //Facturas por Cobrar
        $porRecaudarAnual=\App\Factura::where('facturas.fecha','>=' ,$diaAnno->toDateTimeString())
			            ->where('facturas.aeropuerto_id',session('aeropuerto')->id)
			            ->where('estado', 'P')
			            ->where('facturas.deleted_at', null)
			            ->sum('total');

        $diaMes=\Carbon\Carbon::create(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month,1);

        //Recaudado
        $recaudadoMes=\App\Cobro::where('cobros.created_at','>=' ,$diaMes->toDateTimeString())
			            ->where('cobros.aeropuerto_id',session('aeropuerto')->id)
			            ->sum('montodepositado');

        //Facturas por Cobrar
        $porRecaudarMes=\App\Factura::where('facturas.fecha','>=' ,$diaMes->toDateTimeString())
			            ->where('facturas.aeropuerto_id',session('aeropuerto')->id)
			            ->where('estado', 'P')
			            ->where('facturas.deleted_at', null)
			            ->sum('total');
		            
		//Meta Gobernación
   		$metaGobernacion =\App\Meta::join('meta_detalles', 'metas.id', '=', 'meta_detalles.meta_id')
                                    ->where('fecha_fin', null)
                                    ->sum('gobernacion_meta');

		//Meta SAAR
   		$metaSaar =\App\Meta::join('meta_detalles', 'metas.id', '=', 'meta_detalles.meta_id')
                                    ->where('fecha_fin', null)
                                    ->sum('saar_meta');

		return view('dashboards.recaudacion.partials.index', compact('hoy', 'facturas', 'cobros', 'metaGobernacion', 'metaSaar', 'recaudadoAnual', 'porRecaudarAnual', 'recaudadoMes', 'porRecaudarMes'));
	}

	public function indexOtros()
	{
		return view('dashboards.general.index');
	}

	public function indexDireccion()
	{
		return view('dashboards.direccion.index');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
