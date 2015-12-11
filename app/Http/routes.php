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

Route::group(['prefix' => 'systas/'], function () {
    Route::get('configurar', 'SysTasController@configurar');
    Route::get('imprimir', 'SysTasController@imprimir');
    Route::get('verificar', 'SysTasController@verificar');
    Route::get('reporte/repccaja', 'SysTasController@repccaja');
    Route::get('reporte/repctasa', 'SysTasController@repctasa');
    Route::get('reporte/reprseries', 'SysTasController@reprseries');
});


Route::get('/email', function() {
    Mail::send('emails.test', ['name' => 'Juan'], function($message) {
        $message->to('juanpareles@gmail.com', 'juan')->subject('welcome');
    });
});

Route::get('/',  'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');


Route::get('principal',["middleware"=>"auth", function(){
    return view('principal');
}]  );

Route::get('facturaHtml', function(){
    $factura = \App\Factura::find(24);
    $despegue = \App\Despegue::with('aterrizaje')->where('factura_id', $factura->id)->first();
    return view('pdf.dosa', compact('factura', 'despegue'));
});

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
    Route::get('Despegues/{id}', 'DespegueController@getCrearFactura');
    Route::get('CargasFacturar/{id}', 'CargaController@getCrearFactura');
    Route::group(['prefix' => '{aterrizaje}/'], function () {
        Route::resource('Despegues', 'DespegueController');
    });
    Route::resource('Aterrizajes', 'AterrizajeController');
    Route::resource('Cargas', 'CargaController');

});

Route::group(['prefix' => 'cobranza/{modulo}/'], function () {
    Route::get('main', 'CobranzaController@main');
    Route::get('getFacturasClientes', 'CobranzaController@getFacturasClientes');
    Route::resource('cobro', 'CobranzaController');
});

Route::group(['prefix' => 'facturacion/{modulo}/'], function () {
    Route::get('print/{factura}', 'FacturaController@getPrint');
    Route::get('main', 'FacturaController@main');
    Route::resource('factura', 'FacturaController');
});


Route::get('estacionamiento/saveClient', 'EstacionamientoController@saveClient');

Route::get('estacionamiento/getClients', 'EstacionamientoController@getClients');

Route::resource('estacionamiento', 'EstacionamientoController');

Route::get('contrato/lote',"ContratoController@lote");
Route::post('contrato/lote',"ContratoController@loteStore");
Route::resource('contrato', 'ContratoController');


Route::get('tasas/taquilla', function(){
    return view('tasas.taquilla');
});

Route::group(['prefix' => 'administracion/'], function () {
    Route::get('usuario/estadoUser', 'UsuarioController@estadoUser');
    Route::resource('usuario', 'UsuarioController');
    Route::resource('configuracionSCV', 'MontosFijoController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCV/AterrizajeDespegue', 'PreciosAterrizajesDespegueController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCVEstAeronautico', 'EstacionamientoAeronaveController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCV/HorarioAeronautico', 'HorarioAeronauticoController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCV/CargosVarios', 'CargosVarioController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCV/Carga', 'PreciosCargaController', ['only'=>['update', 'index']]);
    Route::resource('configuracionSCV/OtrosCargos', 'OtrosCargoController');

    Route::get('informacion', 'InformacionController@index');
    Route::post('informacion/update', 'InformacionController@update');
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
    Route::get('reporterFacturadoCobradoMensual', 'ReporteController@getReporterFacturadoCobradoMensual');

    Route::get('reporterDES900', 'ReporteController@getReporteDES900');
    Route::get('reporteClienteReciboMensual', 'ReporteController@getReporteClienteReciboMensual');

});

