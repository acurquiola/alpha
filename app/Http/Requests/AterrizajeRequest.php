<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AterrizajeRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{		
		$id       =null;
		$aterrizajeID =$this->route()->getParameter('aterrizaje');
		if($aterrizajeID)
			$id       =$aterrizajeID;
		return [
				'aeronave_id'        => 'required',
				'fecha'              => 'required',
				'hora'               => 'required',
				'tipoMatricula_id'   => 'required',
				'cliente_id'         => 'required_if:tipoMatricula_id,1',
				'cliente_id'         => 'required_if:tipoMatricula_id,2',
				'cliente_id'         => 'required_if:tipoMatricula_id,3',
				'puerto_id'          => 'required_if:tipoMatricula_id,1',
				'puerto_id'          => 'required_if:tipoMatricula_id,2',
				'puerto_id'          => 'required_if:tipoMatricula_id,3',
				'piloto_id'          => 'required_if:tipoMatricula_id,1',
				'piloto_id'          => 'required_if:tipoMatricula_id,2',
				'piloto_id'          => 'required_if:tipoMatricula_id,3',
				'desembarqueAdultos' => 'required_if:tipoMatricula_id,1',
				'desembarqueAdultos' => 'required_if:tipoMatricula_id,2',
				'desembarqueAdultos' => 'required_if:tipoMatricula_id,3',
				'desembarqueInfante' => 'required_if:tipoMatricula_id,1',
				'desembarqueInfante' => 'required_if:tipoMatricula_id,2',
				'desembarqueInfante' => 'required_if:tipoMatricula_id,3',
				'desembarqueTercera' => 'required_if:tipoMatricula_id,1',
				'desembarqueTercera' => 'required_if:tipoMatricula_id,2',
				'desembarqueTercera' => 'required_if:tipoMatricula_id,3',
				'desembarqueTercera' => 'required_if:desembarqueTransito,1',
				'desembarqueTercera' => 'required_if:desembarqueTransito,2',
				'desembarqueTercera' => 'required_if:desembarqueTransito,3',
				'num_vuelo'          => 'required_if:tipoMatricula_id,3',
				'tipoMatricula_id'   => 'required',
        ];
	}
}
