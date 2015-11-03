<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EstacionamientoAeronaveRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\EstacionamientoAeronave;

class EstacionamientoAeronaveController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		return view('configuracionPrecios.index');
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
	public function update($id, Request $request)
	{		
		$estacionamientoAeronave                    = EstacionamientoAeronave::find($id);
		$estacionamientoAeronave->update($request->all());
		
		if($estacionamientoAeronave)
		{			
			return response()->json(array("text"=>'Información Modificada exitósamente',
										  "estacionamientoAeronave"=>$estacionamientoAeronave,
										  "success"=>1));
		}
		else
		{
			response()->json(array("text"=>'Error modificando el registro',"success"=>0));
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

}
