<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class InformacionController extends Controller {



    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aeropuerto=session("aeropuerto");
		if(!$aeropuerto){
			abort(500);
		}
		$estacionamiento=$aeropuerto->estacionamiento()->first();
		if(!$estacionamiento){
			$estacionamiento=$aeropuerto->estacionamiento()->create(['nTurnos' => 0, 'nTaquillas' => 0]);
		}

		$portons=$estacionamiento->portons()->get();

		if($portons->count()==0){
			$portons=$estacionamiento->portons()->create(['nombre'=> 'predeterminado']);
		}

		$conceptos=$estacionamiento->conceptos()->get();
		if($conceptos->count()==0){
			$conceptos=$estacionamiento->conceptos()->create(['nombre'=> 'predeterminado', 'costo' => 0]);
		}

        return view("administracion/informacion", compact("aeropuerto", "estacionamiento", "portons", "conceptos"));
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
	 * @return Response
	 */
	public function update(Request $request)
	{


		$aeropuertoParametrosActualizados=$request->get("aeropuerto");
		$aeropuerto=session("aeropuerto")->update($aeropuertoParametrosActualizados);

		return redirect('administracion/informacion');

        if($estacionamiento->update($request->all())){

            /*
             *
             * Editando los portones del estacionamiento
             *
             */
            $portonsToDelete=json_decode($request->get('portonsToDelete'));
            \App\Estacionamientoporton::destroy($portonsToDelete);

            $portonsToAdd=json_decode($request->get('portonsToAdd'));
            foreach($portonsToAdd as $porton){
                $estacionamiento->portons()->create(['nombre'=> $porton->nombre]);
            }

            $portons=json_decode($request->get('portons'));
            foreach($portons as $porton){
                $p=\App\Estacionamientoporton::find($porton->id);
                if($p){
                 $p->update(['nombre'=> $porton->nombre]);
                }
            }

            /*
             *
             * Editando los conceptos del estacionamiento
             *
             */
            $conceptosToDelete=json_decode($request->get('conceptosToDelete'));
            \App\Estacionamientoconcepto::destroy($conceptosToDelete);

            $conceptosToAdd=json_decode($request->get('conceptosToAdd'));
            foreach($conceptosToAdd as $concepto){
                $estacionamiento->conceptos()->create(['nombre'=> $concepto->nombre, 'costo' => $concepto->costo]);
            }

            $conceptos=json_decode($request->get('conceptos'));
            foreach($conceptos as $concepto){
                $c=\App\Estacionamientoconcepto::find($concepto->id);
                if($c){
                    $c->update(['nombre'=> $concepto->nombre, 'costo'=> $concepto->costo]);
                }
            }

        }

        return ["text" => "Modificacion realizada"];

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
