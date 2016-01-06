<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{


        \Html::macro('sortableColumnTitle', function($title, $varName){
            return "<th style='cursor:pointer' class='sortable-table-title' data-sort-name='".$varName."'> $title <span class='".((array_get(\Input::all(),"sortName") == $varName)?((array_get(\Input::all(),"sortType")=='ASC')?'glyphicon glyphicon-sort-by-attributes':'glyphicon glyphicon-sort-by-attributes-alt'):'glyphicon glyphicon-sort')."'></span></th>";
        });

        \Html::macro('pagination', function($page){

           return "Mostrando: ".(($page->currentPage()-1)*$page->perPage()+1)." - ".(($page->currentPage()-1)*$page->perPage()+$page->count())." de ".$page->total();
        });

		view()->composer(['partials.navbar', 'partials.menu'], function($view){
            $user      =\Auth::user();
            $userName  =ucwords($user->username);
            $createdAt =$user->created_at;
            $view->with(compact('userName', 'createdAt'));
        });

        view()->composer(['aeronaves.partials.index'], function($view){
            $nacionalidades= \App\NacionalidadMatricula::lists('nombre', 'siglas', 'id');
            $view->with(compact('nacionalidades'));
        });

        view()->composer(['cliente.partials.form', 'aeronaves.index', 'aeronaves.partials.form'], function($view){
            $hangars= \App\Hangar::where("aeropuerto_id","=", session('aeropuerto')->id)->lists('nombre', 'id');
            $view->with(compact('hangars'));
        });

        view()->composer(['aeronaves.partials.form', 'aeronaves.index', 'aterrizajes.index', 'aterrizajes.create', 'aterrizajes.partials.form', 'aterrizajes.partials.edit', 'aterrizajes.partials.show', 'despegues.index', 'despegues.create', 'despegues.partials.form', 'despegues.partials.edit', 'despegues.partials.show', 'cargas.index', 'cargas.create', 'cargas.partials.edit', 'cargas.partials.form', 'cargas.partials.show' ], function($view){
            $clientes= \App\Cliente::where("tipo","=", "Aeronáutico")->orWhere("tipo","=", "Mixto")->lists('nombre', 'id');
            $view->with(compact('clientes'));
        });

        view()->composer(['index','cliente.partials.form','factura.partials.form'], function($view){
            $aeropuertos = \App\Aeropuerto::lists('nombre', 'id');
            $view->with(compact('aeropuertos'));
        });



        view()->composer(['cliente.partials.form'], function($view){
            $paises = \App\Pais::lists('nombre','id');
            $view->with(compact('paises'));
        });

        view()->composer(['configuracionPrecios.confGeneral.index', 'configuracionPrecios.confGeneral.partials.edit', 'configuracionPrecios.confGeneral.partials.form', 'configuracionPrecios.confGeneral.partials.show', 'configuracionPrecios.confAterrizajeDespegue.index', 'configuracionPrecios.confAterrizajeDespegue.partials.edit', 'configuracionPrecios.confAterrizajeDespegue.partials.form', 'configuracionPrecios.confAterrizajeDespegue.partials.show', 'configuracionPrecios.confEstacionamientoAeronave.index', 'configuracionPrecios.confEstacionamientoAeronave.partials.edit', 'configuracionPrecios.confEstacionamientoAeronave.partials.form', 'configuracionPrecios.confEstacionamientoAeronave.partials.show', 'configuracionPrecios.confCargosVarios.index', 'configuracionPrecios.confCargosVarios.partials.edit', 'configuracionPrecios.confCargosVarios.partials.form', 'configuracionPrecios.confCargosVarios.partials.show', 'configuracionPrecios.confCarga.index', 'configuracionPrecios.confCarga.partials.edit', 'configuracionPrecios.confCarga.partials.form', 'configuracionPrecios.confCarga.partials.show'], function($view){
            $confGeneral = \App\MontosFijo::where("id", "=", "1")->get();
            $view->with(compact('confGeneral'));
        });

        view()->composer(['configuracionPrecios.confAterrizajeDespegue.index', 'configuracionPrecios.confAterrizajeDespegue.partials.edit', 'configuracionPrecios.confAterrizajeDespegue.partials.form', 'configuracionPrecios.confAterrizajeDespegue.partials.show'], function($view){
            $precioAterrizajeDespegue = \App\PreciosAterrizajesDespegue::where("id", "=", "1")->get();
            $view->with(compact('precioAterrizajeDespegue'));
        });


        view()->composer(['configuracionPrecios.confEstacionamientoAeronave.index', 'configuracionPrecios.confEstacionamientoAeronave.partials.edit', 'configuracionPrecios.confEstacionamientoAeronave.partials.form', 'configuracionPrecios.confEstacionamientoAeronave.partials.show'], function($view){
            $estacionamientoAeronave = \App\EstacionamientoAeronave::where("id", "=", "1")->get();
            $view->with(compact('estacionamientoAeronave'));
        });


        view()->composer(['configuracionPrecios.confHorarioAeronautico.index', 'configuracionPrecios.confHorarioAeronautico.partials.edit', 'configuracionPrecios.confHorarioAeronautico.partials.form', 'configuracionPrecios.confHorarioAeronautico.partials.show'], function($view){
            $horarioAeronautico  = \App\HorariosAeronautico::where("id", "=", "1")->get();
            $view->with(compact('horarioAeronautico'));
        });

        view()->composer(['configuracionPrecios.confCargosVarios.index', 'configuracionPrecios.confCargosVarios.partials.edit', 'configuracionPrecios.confCargosVarios.partials.form', 'configuracionPrecios.confCargosVarios.partials.show'], function($view){
            $cargosVarios  = \App\CargosVario::where("id", "=", "1")->get();
            $view->with(compact('cargosVarios'));
        });


        view()->composer(['configuracionPrecios.confCarga.index', 'configuracionPrecios.confCarga.partials.edit', 'configuracionPrecios.confCarga.partials.form', 'configuracionPrecios.confCarga.partials.show'], function($view){
            $precioCargas = \App\PreciosCarga::where("id", "=", "1")->get();
            $view->with(compact('precioCargas'));
        });


        view()->composer(['contrato.partials.form','factura.partials.form', 'aeronaves.partials.table'], function($view){
            $clientes =\App\Cliente::select('codigo', 'id', 'nombre','cedRif','cedRifPrefix')->get();
            $view->with(compact('clientes'));
        });

        view()->composer(['administracion.informacion', 'contrato.partials.form', 'configuracionPrecios.confAterrizajeDespegue.partials.edit', 'configuracionPrecios.confAterrizajeDespegue.partials.form', 'configuracionPrecios.confEstacionamientoAeronave.partials.edit', 'configuracionPrecios.confEstacionamientoAeronave.partials.form', 'configuracionPrecios.confCargosVarios.partials.edit', 'configuracionPrecios.confCargosVarios.partials.form', 'configuracionPrecios.confCarga.partials.edit', 'configuracionPrecios.confCarga.partials.form', 'configuracionPrecios.confOtrosCargos.index', 'configuracionPrecios.confOtrosCargos.partials.table'], function($view){
            $conceptos =[""=>"-- Seleccione un concepto --"]+session('aeropuerto')->conceptos()->orderBy('nompre', 'ASC')->lists('nompre', 'id');
            $view->with(compact('conceptos'));
        });


        view()->composer(['factura.edit', 'factura.create', 'factura.partials.show'], function($view){

            $route        =\Route::current();
            $params       =$route->parameters();
            $moduloNombre =($params["modulo"]=="Todos")?"%":$params["modulo"];
            $modulo       =\App\Modulo::where("nombre", "like", $moduloNombre)->where("aeropuerto_id","=", session('aeropuerto')->id)->lists("id");
            $conceptos    =\App\Concepto::select('nompre', 'id', 'iva')->whereIn("modulo_id",$modulo)->orderBy('nompre', 'ASC')->get();
            $view->with(compact('clientes', 'conceptos'));
        });

        view()->composer(['factura.partials.form', 'factura.facturaAeronautica.create', 'factura.facturaCarga.create'], function($view){
            $facturaMax=(\DB::table('facturas')->max('nFactura')+1);
            $view->with(compact('facturaMax'));
        });

        view()->composer(['factura.facturaAeronautica.create', 'factura.facturaCarga.create'], function($view){
            $facturaMaxPreview=(\DB::table('facturas')->max('nFactura'));
            $view->with(compact('facturaMaxPreview'));
        });

        view()->composer(['factura.partials.form', 'factura.automatica'], function($view){
            $nControlprefixMax=\App\Factura::getNControlMax();
            $view->with(compact('nControlprefixMax'));
        });

        view()->composer(['reportes.reporteClienteReciboMensual', 'reportes.reporteDiario', 'reportes.reporteModuloMetaMensual', 'reportes.reporterFacturadoCobradoMensual', 'reportes.reporteDES900'], function($view){
            $aeropuertos = \App\Aeropuerto::lists('nombre', 'id');
            $aeropuertos[0]="Todos";
            $view->with(compact('aeropuertos'));
        });

        \View::composer(['reportes.reporteClienteReciboMensual', 'reportes.reporteDiario', 'reportes.reporteModuloMetaMensual', 'reportes.reporterFacturadoCobradoMensual', 'reportes.reporteDES900','reportes.reporteCuadreCaja', 'factura.automatica'], function($view){
            $meses=[
                "01"=>"ENERO",
                "02"=>"FEBRERO",
                "03"=>"MARZO",
                "04"=>"ABRIL",
                "05"=>"MAYO",
                "06"=>"JUNIO",
                "07"=>"JULIO",
                "08"=>"AGOSTO",
                "09"=>"SEPTIEMBRE",
                "10"=>"OCTUBRE",
                "11"=>"NOVIEMBRE",
                "12"=>"DICIEMBRE"];

            $annos=[
                "2016"=>"2016", "2017"=>"2017",
                "2018"=>"2018", "2019"=>"2019",
                "2020"=>"2020", "2021"=>"2021",
                "2022"=>"2022", "2023"=>"2023",
                "2024"=>"2024", "2025"=>"2025",
                "2026"=>"2026", "2027"=>"2027",
                "2028"=>"2028", "2029"=>"2029",
                "2030"=>"2030", "2031"=>"2031",
                "2032"=>"2032", "2033"=>"2033",
                "2034"=>"2034", "2035"=>"2035",
            ];
            $view->with(compact('meses', 'annos'));
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
