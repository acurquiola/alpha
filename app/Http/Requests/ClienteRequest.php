<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClienteRequest extends Request {

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
        $id=null;
        $cliente=$this->route()->getParameter('cliente');
        if($cliente)
            $id=$cliente->id;
        return [
			'codigo'         =>        'required|unique:clientes,codigo,'.$id,
			'nombre'         =>        'required',
			'cedRif'         =>        'required',
			'cedRif'         =>        'regex:/^(?!.*[vVjJeE]).*$/',
			'cedRifPrefix'   =>   'unique_with:clientes,cedRif,'.$id.'=id',
			'tipo'           =>        'required',
			'email'          =>        'required_with:isEnvioAutomatico',
			'hangars'        =>        'required_if:tipo,Aeronáutico,Mixto',
			'email'          =>        'email',
			'islrpercentage' =>        'required_with:isContribuyente',
			'ivapercentage'  =>        'required_with:isContribuyente',
        ];

	}

}
