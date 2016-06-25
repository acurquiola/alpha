<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Mail;

Route::get('oracleTest', function(){



    //Ejemplo 1
    //buscamos un objeto oracle

    $empresa=\App\Models\Oracle\Empresa::find(1);

    //buscamos un objeto de mysql
    //
    //

    $aeropuerto=\App\Aeropuerto::find(1);


    //actualizamos el nombre de la empresa de oracle con el nombre que se le haya dado en el sistema
    $empresa->em_nombre=$aeropuerto->nombre;

    $empresa->save();


    //Ejemplo 2
    //buscamos fascturas de mysql
    //
    //
    $facturas=\App\Facturas::where('...')->get();

    foreach($facturas as $factura){

        $facturaOracle=\App\Models\Oracle\Factura::create(
            [
            //como estamos creadon un objeto oracle
            //se coloca a la izuierda campos de oracle
            //y a la derecha los campos correspondientes en mysql
            "prc_fec" =>$factura->fecha,
            //y asi con todos los datos
            //
            //...

            ]);
        //y seguimos manejando las relcaCIONES DE FACTURA QUE HAGAN FALTA
        foreach($factura->detalles as $detalle){
            //manejamos los detalles
        }

    }

});



Route::group(['prefix' => 'systas/'], function () {
    Route::get('configurar', 'SysTasController@configurar');
    Route::get('imprimir', 'SysTasController@imprimir');
    Route::get('verificar', 'SysTasController@verificar');
    Route::get('reporte/repccaja', 'SysTasController@repccaja');
    Route::get('reporte/repctasa', 'SysTasController@repctasa');
    Route::get('reporte/reprseries', 'SysTasController@reprseries');
});

Route::group(['prefix' => 'dashboard/'], function () {
    Route::get('SCV', 'DashboardController@indexSCV');
    Route::get('Recaudacion', 'DashboardController@indexRecaudacion');
    Route::get('Principal', 'DashboardController@indexOtros');
    Route::get('Direccion', 'DashboardController@indexDireccion');
});


Route::get('/email', function() {
    Mail::send('emails.test', ['name' => 'Juan'], function($message) {
        $message->to('juanpareles@gmail.com', 'juan')->subject('welcome');
    });
});

Route::get('/',  'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::get('logoutRemember', 'Auth\AuthController@getLogoutRemember');



//Route::get('facturaHtml', function(){
//    $factura = \App\Factura::find(24);
//    $despegue = \App\Despegue::with('aterrizaje')->where('factura_id', $factura->id)->first();
//    return view('pdf.dosa', compact('factura', 'despegue'));
//});
//Route::get('facturaPdf', function(){
//    $factura = \App\Factura::first();
//
//    return view('pdf.factura', compact('factura'));
//});
//
//Rutas para el gestor de los Maestros
//

Route::group(['prefix' => 'maestros/'], function () {
    Route::resource('modelosAeronaves', 'ModeloAeronaveController');
    Route::get('estadoPiloto', 'PilotoController@estadoPiloto');
    Route::resource('pilotos', 'PilotoController');
    Route::get('estadoPuerto', 'PuertoController@estadoPuerto');
    Route::resource('puertos', 'PuertoController');
    Route::resource('hangares', 'HangarController');
    Route::resource('aeronaves', 'AeronaveController');
});

//
//Rutas para el gestor de los Operaciones
//

Route::group(['prefix' => 'operaciones/'], function () {
    Route::get('DespeguesFacturar/{id}', 'DespegueController@getCrearFactura');
    Route::get('DespeguesCobrar/{id}', 'DespegueController@getGenerarCobranza');
    Route::get('CargasFacturar/{id}', 'CargaController@getCrearFactura');
    Route::get('FacturarAdicional/{id}', 'AterrizajeController@getCrearFactura');
    Route::get('getDosaClientes/{id}', 'DespegueController@getDosaClientes');
    Route::post('postGenerarCobranza/{id}', 'DespegueController@postGenerarCobranza');
    //Route::PUT('Despegue/update/{id}', 'AterrizajeController@update');
    Route::group(['prefix' => '{aterrizaje}/'], function () {
        Route::resource('Despegues', 'DespegueController');
    });
    Route::resource('Aterrizajes', 'AterrizajeController');
    Route::resource('Cargas', 'CargaController');

});

Route::group(['prefix' => 'cobranza/{modulo}/'], function () {
    Route::get('print/{cobro}', 'CobranzaController@getPrint');
    Route::get('anularRecibo', 'CobranzaController@cambiarRecibo');
    Route::get('main', 'CobranzaController@main');
    Route::get('getFacturasClientes', 'CobranzaController@getFacturasClientes');
    Route::resource('cobro', 'CobranzaController');
});

Route::group(['prefix' => 'facturacion/{modulo}/'], function () {
    Route::get('print/{factura}', 'FacturaController@getPrint');
    Route::get('main', 'FacturaController@main');
    Route::post('contratosByFecha', 'FacturaController@postContratosByFecha');
    Route::get('automatica/resultados','FacturaController@getContratosAutomaticaResult');
    Route::post('contratosStoreAutomatica', 'FacturaController@postContratosStoreAutomatica');
    Route::get('automatica', 'FacturaController@automatica');
    Route::resource('factura', 'FacturaController');
});


Route::get('estacionamiento/saveClient', 'EstacionamientoController@saveClient');

Route::get('estacionamiento/getClients', 'EstacionamientoController@getClients');

Route::resource('estacionamiento', 'EstacionamientoController');

Route::group(['prefix' => 'contrato'], function () {
    Route::get('/lote',"ContratoController@lote");
    Route::post('/lote',"ContratoController@loteStore");
    Route::post('/renovar',"ContratoController@postRenovarContratos");
});
    Route::resource('contrato', 'ContratoController');

Route::group(['prefix' => 'tasas/'], function () {

    Route::get('supervisor',"TasaController@supervisor");
    Route::get('supervisor-operacion',"TasaController@getSupervisorOperacion");
    Route::post('supervisor',"TasaController@postSupervisor");

    Route::get('taquilla',"TasaController@taquilla");
    Route::get('operacion',"TasaController@getOperacion");
    Route::post('operacion',"TasaController@postOperacion");
});


Route::group(['prefix' => 'administracion/'], function () {
    Route::get('usuarios/estadoUser', 'UsuarioController@estadoUser');
    Route::resource('usuarios', 'UsuarioController');
    Route::resource('configuracionSCV', 'MontosFijoController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCV/AterrizajeDespegue', 'PreciosAterrizajesDespegueController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCVEstAeronautico', 'EstacionamientoAeronaveController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCV/HorarioAeronautico', 'HorarioAeronauticoController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCV/CargosVarios', 'CargosVarioController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCV/Carga', 'PreciosCargaController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCV/OtrosCargos', 'OtrosCargoController');
    Route::get('informacion', 'InformacionController@index');
    Route::get('informacion/estadoCuenta', 'InformacionController@estadoCuenta');
    Route::get('meta', 'MetaController@index');
    Route::post('informacion/update', 'InformacionController@update');
    Route::post('meta/update', 'MetaController@update');
    Route::get('sincronizacion', function(){
        return view('administracion/sincronizacion');
    });
    Route::resource('modulo', 'ModuloController');
    Route::resource('cliente', 'ClienteController');
    Route::resource('concepto', 'ConceptoController');
    Route::get('roles/{roles}/users', 'RolesController@users');
    Route::post('roles/{roles}/users', 'RolesController@syncUsers');
    Route::resource('roles', 'RolesController');

});

Route::group(['prefix' => 'reporte/'], function () {

    Route::get('mensual', 'ReporteController@getReporteMensual');
    Route::get('reporteModuloMetaMensual', 'ReporteController@getReporteModuloMetaMensual');
    Route::get('reporteRelacionMensualDeIngresosRecaudacionPendiente', 'ReporteController@getReporteRelacionMensualDeIngresosRecaudacionPendiente');
    Route::get('reporteRelacionMensualDeFacturacionCobradosYPorCobrar', 'ReporteController@getReporteRelacionMensualDeFacturacionCobradosYPorCobrar');
    Route::get('reporteRelacionIngresoMensual', 'ReporteController@getReporteRelacionIngresoMensual');
    Route::get('reporteRelacionEstacionamientoDiario', 'ReporteController@getReporteRelacionEstacionamientoDiario');
    Route::get('reporteRelacionIngresosAeronauticosContado', 'ReporteController@getReporteRelacionIngresosAeronauticosContado');
    Route::get('reporteDiarioIngreso', 'ReporteController@getReporteDiarioIngreso');
    Route::get('reporteRelacionCobranza', 'ReporteController@getReporteRelacionCobranza');
    Route::get('reporteRelacionFacturasAeronauticasCredito', 'ReporteController@getReporteRelacionFacturasAeronauticasCredito');
    Route::get('reporteContratos', 'ReporteController@getReporteContratos');
    Route::get('reporteRelacionMetaRecaudacionMensual', 'ReporteController@getReporteRelacionMetaRecaudacionMensual');
    Route::get('reporteTraficoAereo', 'ReporteController@getReporteTraficoAereo');
    Route::get('reporteControlDeRecaudacionMensual', 'ReporteController@getControlDeRecaudacionMensual');
    Route::get('reporteFormulariosAnulados', 'ReporteController@getFormulariosAnulados');
    Route::get('reporteListadoClientes', 'ReporteController@getListadoClientes');
    Route::get('reporteLibroDeVentas', 'ReporteController@getReporteLibroDeVentas');
    Route::post('exportReport', "ReporteController@postExportReport");

    Route::get('reporterDES900', 'ReporteController@getReporteDES900');
    Route::get('reporterCuadreCaja', 'ReporteController@getReporteCuadreCaja');
    Route::get('reporterTraficoAereo', 'ReporteController@getReporteTraficoAereo');
    Route::get('reporteListadoFacturas', 'ReporteController@getReporteListadoFacturas');
    Route::post('reporteListadoFacturas', 'ReporteController@getReporteListadoFacturas');
    Route::get('reporteListadoFacturaCliente', 'ReporteController@getReporteListadoFacturasCliente');
    Route::post('reporteListadoFacturaCliente', 'ReporteController@getReporteListadoFacturasCliente');

});
