<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\OtrosCargo;
use App\Concepto;

class OtrosCargoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if($request->ajax()){
			
			$sortName     = $request->get('sortName','nombre_cargo');
			$sortName     =($sortName=="")?"nombre_cargo":$sortName;
			
			$sortType     = $request->get('sortType','ASC');
			$sortType     =($sortType=="")?"ASC":$sortType;
			
			$nombre_cargo = $request->get('nombre_cargo', '%');
			$nombre_cargo =($nombre_cargo=="")?"%":$nombre_cargo;

			 \Input::merge([
	            'sortName'=>$sortName,
	            'sortType'=>$sortType]);


			$otros_cargos = OtrosCargo::with("conceptos")
										->where('nombre_cargo', 'like', $nombre_cargo)
										->orderBy($sortName, $sortType)
										->paginate(3);

			return view('configuracionPrecios.confOtrosCargos.partials.table', compact('otros_cargos'));
		}
		else
		{

			return view('configuracionPrecios.confOtrosCargos.index');
		}
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
	public function store(Request $request)
	{
		$otros_cargos = OtrosCargo::create($request->all());
		if ($otros_cargos){
			return response()->json(array("text"=>'Registro realizado exitósamente',
										  "otros_cargos"=>$otros_cargos,
										  "success"=>1));
		}else{
			response()->json(array("text"=>'Error registrando el cargo',"success"=>0));
		}
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
		$otrosCargo = OtrosCargo::find($id);
		return view('configuracionPrecios.confOtrosCargos.partials.edit', compact('otrosCargo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$oc         = OtrosCargo::find($id);
		$otrosCargo = $oc->update($request->all());
		if($otrosCargo){
            return ["success"=>1, "text" => "Registro modificado con éxito."];
        }else{
            return ["success"=>0, "text" => "Error modificando el registro."];
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
        if(\App\OtrosCargo::destroy($id)){
            return ["success"=>1, "text" => "Registro eliminado con éxito."];
        }else{
            return ["success"=>0, "text" => "Error eliminando el registro."];
        }
    }

}
