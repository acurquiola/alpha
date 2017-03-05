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
		$anno = Carbon\Carbon::now()->year;
        return view('conciliacion.index', compact('anno'));
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
		$anno         = $request->get('anno', \Carbon\Carbon::now()->year);
		$banco_id     = $request->get('banco_id');
		$cuenta_id    = $request->get('cuenta_id');
		$tipo         = $request->get('tipo');
		$ncomprobante = $request->get('ncomprobante');
		$cobro_id     = $request->get('cobro_id');
		$fecha_inicio = $request->get('fecha_inicio');
		$fecha_fin    = $request->get('fecha_fin');
        $today=\Carbon\Carbon::now();
		$movimientos  = \App\Cobrospago::nombrebanco($banco_id)
										->numerocuenta($cuenta_id)
										->anno($anno)
										->tipo($tipo)
										->referencia($ncomprobante)
										->cobro($cobro_id)
										->fecha($fecha_inicio, $fecha_fin);
										//FALTAA EL FILTRO PARA SABER SI ESTA CONCILIADO


		$movimientos = $movimientos->orderBy('fecha', 'ASC')->paginate(50);

		$movimientos->setPath('');

		return view('conciliacion.index', compact('movimientos', 'anno', 'banco_id', 'cuenta_id', 'tipo', 'ncomprobante', 'cobro_id', 'fecha_inicio', 'fecha_fin', 'today'));
	}

}
