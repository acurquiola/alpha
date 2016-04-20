<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {

	public function indexSCV()
	{
		$comerciales                = \App\TipoMatricula::where('nombre', 'Comercial')->first()->id;
		$comercialPrivado           = \App\TipoMatricula::where('nombre', 'Comercial Privado')->first()->id;
		$privado                    = \App\TipoMatricula::where('nombre', 'Privado')->first()->id;
		$oficial                    = \App\TipoMatricula::where('nombre', 'Oficial / Gobierno')->first()->id;
		$fecha                      = \Carbon\Carbon::now();
		$hoy                        = $fecha->toDateString();
		
		$vuelosComerciales          = 0;
		$vuelosComercialPrivado     = 0;
		$vuelosPrivados             = 0;
		$vuelosOficiales            = 0;
		
		$vuelosComercialesPorc      = 0;
		$vuelosComercialPrivadoPorc = 0;
		$vuelosPrivadosPorc         = 0;
		$vuelosOficialesPorc        = 0;
		$totalVuelos                = 0;

		$totalVuelos = \App\Despegue::where('fecha', $hoy)
									->where('aeropuerto_id', session('aeropuerto')->id)
									->count();
		if($totalVuelos!=0){

			$vuelosComerciales = \App\Despegue::where('tipoMatricula_id', $comerciales)
											   ->where('aeropuerto_id', session('aeropuerto')->id)
											   ->where('fecha', $hoy)
											   ->count();

			$vuelosComercialPrivado = \App\Despegue::where('tipoMatricula_id', $comercialPrivado)
											   ->where('aeropuerto_id', session('aeropuerto')->id)
											   ->where('fecha', $hoy)
											   ->count();
			$vuelosPrivados  = \App\Despegue::where('tipoMatricula_id', $privado)
											   ->where('aeropuerto_id', session('aeropuerto')->id)
											   ->where('fecha', $hoy)
											   ->count();
			$vuelosOficiales = \App\Despegue::where('tipoMatricula_id', $oficial)
											   ->where('aeropuerto_id', session('aeropuerto')->id)
											   ->where('fecha', $hoy)
											   ->count();

			$vuelosComercialesPorc      = ($vuelosComerciales*100)/$totalVuelos;
			$vuelosComercialPrivadoPorc = ($vuelosComercialPrivado*100)/$totalVuelos;
			$vuelosPrivadosPorc         = ($vuelosPrivados*100)/$totalVuelos;
			$vuelosOficialesPorc        = ($vuelosOficiales*100)/$totalVuelos;
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

		return view('dashboards.SCV.partials.index', compact('hoy', 'vuelosComerciales', 'vuelosComercialPrivado', 'vuelosPrivados', 'vuelosOficiales', 'vuelosComercialesPorc', 'vuelosComercialPrivadoPorc', 'vuelosPrivadosPorc', 'vuelosOficialesPorc', 'aterrizajesPendientes', 'aterrizajesTotal', 'despeguesRecientes', 'facturasTotal', 'facturasCredito', 'facturasContado'));
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

            $diaMes=\Carbon\Carbon::create(\Carbon\Carbon::now()->year, 1,1);

            //Recaudado
            $recaudado=\App\Cobro::where('cobros.created_at','>=' ,$diaMes->toDateTimeString())
		            ->where('cobros.aeropuerto_id',session('aeropuerto')->id)
		            ->sum('montodepositado');

            //Facturas por Cobrar
            $porRecaudar=\App\Factura::where('facturas.fecha','>=' ,$diaMes->toDateTimeString())
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

		$fecha = \Carbon\Carbon::now();
		return view('dashboards.recaudacion.partials.index', compact('fecha', 'facturas', 'cobros', 'recaudado', 'porRecaudar', 'metaGobernacion', 'metaSaar'));
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
