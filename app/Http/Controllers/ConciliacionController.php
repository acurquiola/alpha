<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class ConciliacionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('conciliacion.index');
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

	public function getMovimientos(Request $request)
	{
		dd($request->all());
		$today = Carbon\Carbon::now()->toDateString();
		$banco_id     = ($request->get('banco_id') == '')?'0':$request->get('banco_id');
		$cuenta_id    = ($request->get('cuenta_id') == '')?'0':$request->get('cuenta_id');
		$tipo         = ($request->get('tipo') == '')?'':$request->get('tipo');
		$ncomprobante = ($request->get('ncomprobante') == '')?'0':$request->get('ncomprobante');
		$fecha_inicio = ($request->get('fecha_inicio') == '')?$today:$request->get('fecha_inicio');
		$fecha_fin    = ($request->get('fecha_fin') == '')?$today:$request->get('fecha_fin');
		$cobro_id     = ($request->get('cobro_id') == '')?'0':$request->get('cobro_id');
	
		$movimientos = \App\Cobrospago::numerocobro($cobro_id)
										->nombrebanco($banco_id)
										->numerocuenta($cuenta_id)
										->referencia($ncomprobante)
										->tipotransaccion($tipo)
										->fechainicial($fecha_inicio)
										->fechafinal($fecha_fin)
										->conciliado()->get();

		return view('conciliacion.index', compact('movimientos'));
	}

}
