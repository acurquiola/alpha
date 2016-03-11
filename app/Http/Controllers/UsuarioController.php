<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PilotoRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Usuario;


class UsuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	//Mostrar tabla
	public function index(Request $request)
	{
		if($request->ajax()){
			$sortName             = $request->get('sortName','username');
			$sortName             =($sortName=="")?"username":$sortName;
			
			$sortType             = $request->get('sortType','ASC');
			$sortType             =($sortType=="")?"ASC":$sortType;
			
			$username               = $request->get('username', '%');
			$username               =($username=="")?"%":$username;
			
			$fullname               = $request->get('fullname', '%');
			$fullname               =($fullname=="")?"%":$fullname;
			
			$departamento_id      = $request->get('departamento_id', 0);
			$departamentoOperador =($departamento_id=="")?">":"=";
			\Input::merge([
				'sortName'=>$sortName,
				'sortType'=>$sortType]);

			$usuarios= Usuario::with('departamento', 'cargo')
							->where('username', 'like', '%'.$username.'%')
							->where('fullname', 'like', $fullname)
							->where('departamento_id', $departamentoOperador, $departamento_id);


			$totalUsuarios = $usuarios->count();
			$usuarios=$usuarios->orderBy($sortName, $sortType)
							 ->paginate(7);
			return view('usuarios.partials.table', compact('usuarios', 'totalUsuarios'));
		}
		else
		{			
			$usuarios = Usuario::all();
			return view('usuarios.index', compact('usuarios'));
		}
	}

	/**
	 * Muestra el formulario de creación del registro
	 * @return Response
	 */
	public function create(Request $request)
	{
		//
	}

	/**
	 * Ingresa un nuevo registro
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user         = new Usuario();		
		$user         =Usuario::create($request->except('estado', 'password'));
        $user->password        =bcrypt($request->input('password'));
        $user->estado =$request->input('estado', 0);

		if($user->save())
		{
			return response()->json(array("text"=>'Usuario registrado exitósamente',
										  "usuario"=>$user->load("departamento", "cargo"),
										  "success"=>1));
		}
		else
		{
			response()->json(array("text"=>'Error registrando el usuario',"success"=>0));
		}		
	}

	/**
	 * Muestra la información de un registro
	 * @param  int  $id
	 * @return Response
	 */
		public function show(Usuario $usuario)
	{
        return view("usuarios.partials.show", compact('usuario'));
	}

	/**
	 * Muestra el formulario de edición de un registro
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
		{
		$user        = Usuario::find($id);
		return view('usuarios.partials.edit', compact('user'));
	}

	/**
	 *Actualiza la información de un registro
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $user)
	{
		$user->update($request->except('password', 'passwordrepeat', 'estado'));
		$user->estado =$request->input('estado', 0);
		if($request->get('password') != ""){
			$user->password=bcrypt($request->get('password'));
		}


		if($user->save())
		{
			return response()->json(array("text"=>"Registro modificado correctamente", 
										  "usuario"=>$user->load("departamento", "cargo"), "success"=>1));
		}
		else
		{
			return response()->json(array("text"=>"Ocurrió un error modificando el registro", "success"=>0));
		}
	}

	/**
	 * Elimina un registro específico
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy($id)
    {
        if(\App\Usuario::destroy($id)){
            return ["success"=>1, "text" => "Usuario eliminado con éxito."];
        }else{
            return ["success"=>0, "text" => "El usuario no pudo ser eliminado."];
        }
    }


	/**
	 * Habilita/Inhabilita un registro
	 * @param  int  $id
	 * @return Response
	 */
	 public function estadoPiloto(Request $request)
    {
		$id    = $request->input('id');
		$pilot = Piloto::find($id);

        if ($pilot->estado == '0')
        {
			$pilot->estado = '1';
			$mensaje       = "Piloto habilitado exitósamente.";
			$mensajeError  = "Ocurrió un error habilitando al Piloto.";
        } 
        else
        {
			$pilot->estado = '0';
			$mensaje       = "Piloto inhabilitado exitósamente.";
			$mensajeError  = "Ocurrió un error inhabilitando al Piloto.";
        }
        if($pilot->save())
        {
            return response()->json(array("text"=>$mensaje,
                "piloto"=>$pilot,
                "success"=>1));

        }
        else
        {
            return response()->json(array("text"=>$mensajeError, "success"=>0));
        }
    }

}
