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
		$transitoTotal                   = 0;

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

			$transitoTotal                   = $despegues->sum('transitoAdultos')+$despegues->sum('transitoInfante')+$despegues->sum('transitoTercera');


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


		return view('dashboards.SCV.partials.index', compact('hoy', 'aterrizajesComerciales', 'despeguesComerciales', 'aterrizajesComercialPrivado','despeguesComercialPrivado', 'aterrizajesPrivados', 'despeguesPrivados', 'otrosDespegues' ,'otrosAterrizajes', 'desembarqueComercial', 'desembarquePrivado', 'desembarqueComercialPrivado', 'desembarqueOtrosVuelos','embarqueComercial', 'embarquePrivado', 'embarqueComercialPrivado', 'embarqueOtrosVuelos', 'transitoTotal', 'embarqueTotal', 'desembarqueTotal', 'aterrizajesPendientes', 'aterrizajesTotal', 'despeguesRecientes', 'facturasTotal', 'facturasCredito', 'facturasContado'));
	}

	public function indexRecaudacion()
	{

		$hoy  =\Carbon\Carbon::now()->toDateString();
		$anno =\Carbon\Carbon::now()->year;        
		$mes  =\Carbon\Carbon::now()->month;        
        $facturas=\App\Factura::select("facturas.*","clientes.nombre as clienteNombre", "modulos.nombre as moduloNombre")
                            ->join('clientes','clientes.id' , '=', 'facturas.cliente_id')
                            ->join('modulos','modulos.id' , '=', 'facturas.modulo_id')
                            ->where('facturas.aeropuerto_id','=', session('aeropuerto')->id)
                            ->where('estado', 'like', 'P')
                            ->where('facturas.deleted_at', null)
                            ->orderBy('nFactura', 'DESC')
                            ->limit(5)
                            ->get();  
        $metaSaarPZO =\App\Meta::join('meta_detalles', 'metas.id', '=', 'meta_detalles.meta_id')
                                    ->where('fecha_fin', null)
                                    ->where('aeropuerto_id', 1)
                                    ->sum('saar_meta');     
        $metaSaarCBL =\App\Meta::join('meta_detalles', 'metas.id', '=', 'meta_detalles.meta_id')
                                    ->where('fecha_fin', null)
                                    ->where('aeropuerto_id', 2)
                                    ->sum('saar_meta');     
        $metaSaarSNV =\App\Meta::join('meta_detalles', 'metas.id', '=', 'meta_detalles.meta_id')
                                    ->where('fecha_fin', null)
                                    ->where('aeropuerto_id', 3)
                                    ->sum('saar_meta');

        $diaMes=\Carbon\Carbon::create($anno, $mes,1);
        $diaInicio=\Carbon\Carbon::create($anno, 1,1);

        //Cobrado Mes
        $cobrosPZO=\App\Cobro::where('cobros.created_at','>=' ,$diaMes->startOfMonth()->toDateTimeString())
        ->where('cobros.created_at','<=' ,$diaMes->endOfMonth()->toDateTimeString())
        ->where('cobros.aeropuerto_id','1')
        ->get();

        $cobrosCBL=\App\Cobro::where('cobros.created_at','>=' ,$diaMes->startOfMonth()->toDateTimeString())
        ->where('cobros.created_at','<=' ,$diaMes->endOfMonth()->toDateTimeString())
        ->where('cobros.aeropuerto_id','2')
        ->get();

        $cobrosSNV=\App\Cobro::where('cobros.created_at','>=' ,$diaMes->startOfMonth()->toDateTimeString())
        ->where('cobros.created_at','<=' ,$diaMes->endOfMonth()->toDateTimeString())
        ->where('cobros.aeropuerto_id','3')
        ->get();

        //Cobrado Anual
        $cobrosPZOAnual=\App\Cobro::where('cobros.created_at','>=' ,$diaInicio->startOfMonth()->toDateTimeString())
        ->where('cobros.created_at','<=' ,$diaMes->endOfMonth()->toDateTimeString())
        ->where('cobros.aeropuerto_id','1')
        ->get();

        $cobrosCBLAnual=\App\Cobro::where('cobros.created_at','>=' ,$diaInicio->startOfMonth()->toDateTimeString())
        ->where('cobros.created_at','<=' ,$diaMes->endOfMonth()->toDateTimeString())
        ->where('cobros.aeropuerto_id','2')
        ->get();

        $cobrosSNVAnual=\App\Cobro::where('cobros.created_at','>=' ,$diaInicio->startOfMonth()->toDateTimeString())
        ->where('cobros.created_at','<=' ,$diaMes->endOfMonth()->toDateTimeString())
        ->where('cobros.aeropuerto_id','3')
        ->get();
            
        $montosMeses[$mes]=[
				"metaPZO"              =>0,
				"recaudadoPZO"         =>0,
				"diferenciaPZO"        =>0,
				"metaCBL"              =>0,
				"recaudadoCBL"         =>0,
				"diferenciaCBL"        =>0,
				"metaSNV"              =>0,
				"recaudadoSNV"         =>0,
				"diferenciaSNV"        =>0,
				"metaTotal"            =>0,
				"recaudadoTotal"       =>0,
				"diferenciaTotal"      =>0,
				"metaPZOAnual"         =>0,
				"recaudadoPZOAnual"    =>0,
				"diferenciaPZOAnual"   =>0,
				"metaCBLAnual"         =>0,
				"recaudadoCBLAnual"    =>0,
				"diferenciaCBLAnual"   =>0,
				"metaSNVAnual"         =>0,
				"recaudadoSNVAnual"    =>0,
				"diferenciaSNVAnual"   =>0,
				"metaTotalAnual"       =>0,
				"recaudadoTotalAnual"  =>0,
				"diferenciaTotalAnual" =>0,
            ];

        $montosMeses[$mes]["metaPZO"]+=$metaSaarPZO/12;
        $montosMeses[$mes]["metaCBL"]+=$metaSaarCBL/12;
        $montosMeses[$mes]["metaSNV"]+=$metaSaarSNV/12;


        $montosMeses[$mes]["metaPZOAnual"]+=$metaSaarPZO;
        $montosMeses[$mes]["metaCBLAnual"]+=$metaSaarCBL;
        $montosMeses[$mes]["metaSNVAnual"]+=$metaSaarSNV;

        //Mes Actual
        foreach ($cobrosPZO as $cobroPZO) {
            $montosMeses[$mes]["recaudadoPZO"]+=$cobroPZO->montodepositado;
        }

        foreach ($cobrosCBL as $cobroCBL) {
            $montosMeses[$mes]["recaudadoCBL"]+=$cobroCBL->montodepositado;
        }

        foreach ($cobrosSNV as $cobroSNV) {
            $montosMeses[$mes]["recaudadoSNV"]+=$cobroSNV->montodepositado;
        }
        //Anual
        foreach ($cobrosPZOAnual as $cobroPZOAnual) {
            $montosMeses[$mes]["recaudadoPZOAnual"]+=$cobroPZOAnual->montodepositado;
        }

        foreach ($cobrosCBLAnual as $cobroCBLAnual) {
            $montosMeses[$mes]["recaudadoCBLAnual"]+=$cobroCBLAnual->montodepositado;
        }

        foreach ($cobrosSNVAnual as $cobroSNVAnual) {
            $montosMeses[$mes]["recaudadoSNVAnual"]+=$cobroSNVAnual->montodepositado;
        }

		$montosMeses[$mes]["diferenciaPZO"]        =$montosMeses[$mes]["recaudadoPZO"]-$montosMeses[$mes]["metaPZO"];
		$montosMeses[$mes]["diferenciaCBL"]        =$montosMeses[$mes]["recaudadoCBL"]-$montosMeses[$mes]["metaCBL"];
		$montosMeses[$mes]["diferenciaSNV"]        =$montosMeses[$mes]["recaudadoSNV"]-$montosMeses[$mes]["metaSNV"];
		$montosMeses[$mes]["diferenciaPZOAnual"]   =$montosMeses[$mes]["recaudadoPZOAnual"]-$montosMeses[$mes]["metaPZOAnual"];
		$montosMeses[$mes]["diferenciaCBLAnual"]   =$montosMeses[$mes]["recaudadoCBLAnual"]-$montosMeses[$mes]["metaCBLAnual"];
		$montosMeses[$mes]["diferenciaSNVAnual"]   =$montosMeses[$mes]["recaudadoSNVAnual"]-$montosMeses[$mes]["metaSNVAnual"];
		$montosMeses[$mes]["metaTotal"]            =$montosMeses[$mes]["metaPZO"]+$montosMeses[$mes]["metaCBL"]+$montosMeses[$mes]["metaSNV"];
		$montosMeses[$mes]["recaudadoTotal"]       =$montosMeses[$mes]["recaudadoPZO"]+$montosMeses[$mes]["recaudadoCBL"]+$montosMeses[$mes]["recaudadoSNV"];
		$montosMeses[$mes]["diferenciaTotal"]      =$montosMeses[$mes]["diferenciaPZO"]+$montosMeses[$mes]["diferenciaCBL"]+$montosMeses[$mes]["diferenciaSNV"];
		$montosMeses[$mes]["metaTotalAnual"]       =$montosMeses[$mes]["metaPZOAnual"]+$montosMeses[$mes]["metaCBLAnual"]+$montosMeses[$mes]["metaSNVAnual"];
		$montosMeses[$mes]["recaudadoTotalAnual"]  =$montosMeses[$mes]["recaudadoPZOAnual"]+$montosMeses[$mes]["recaudadoCBLAnual"]+$montosMeses[$mes]["recaudadoSNVAnual"];
		$montosMeses[$mes]["diferenciaTotalAnual"] =$montosMeses[$mes]["diferenciaPZOAnual"]+$montosMeses[$mes]["diferenciaCBLAnual"]+$montosMeses[$mes]["diferenciaSNVAnual"];
		
		return view('dashboards.recaudacion.partials.index', compact('hoy', 'facturas', 'montosMeses' ));
	}

	public function indexDireccion()
	{
		$fecha            = \Carbon\Carbon::now();
		$hoy              = $fecha->toDateString();


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
		$transitoTotal                   = 0;

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

			$transitoTotal                   = $despegues->sum('transitoAdultos')+$despegues->sum('transitoInfante')+$despegues->sum('transitoTercera');


		}
		return view('dashboards.direccion.partials.index', compact('hoy', 'aterrizajesComerciales', 'despeguesComerciales', 'aterrizajesComercialPrivado','despeguesComercialPrivado', 'aterrizajesPrivados', 'despeguesPrivados', 'otrosDespegues' ,'otrosAterrizajes', 'desembarqueComercial', 'desembarquePrivado', 'desembarqueComercialPrivado', 'desembarqueOtrosVuelos','embarqueComercial', 'embarquePrivado', 'embarqueComercialPrivado', 'embarqueOtrosVuelos', 'transitoTotal', 'embarqueTotal', 'desembarqueTotal'));
	}
	public function indexOtros()
	{
		return view('dashboards.general.index');
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
