<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\MontosFijoRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\MontosFijo;

class MontosFijoController extends Controller {

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
	
	public function show(MontosFijo $confGeneral)
	{
        return view("configuracionPrecios.confGeneral.partials.show");
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
		$confGeneral = MontosFijo::find($id);
		return view('configuracionPrecios.confGeneral.partials.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{		
		$confGeneral                    = MontosFijo::find($id);
		$confGeneral->unidad_tributaria =$request->input('unidad_tributaria');
		$confGeneral->dolar_oficial        =$request->input('dolar_oficial');
		
		if($confGeneral->save())
		{			
			return response()->json(array("text"=>'Montos modificados exitósamente',
										  "confGeneral"=>$confGeneral,
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
