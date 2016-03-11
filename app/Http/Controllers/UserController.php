<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Usuario;
use Bican\Roles\Models\Role;
use App\Departamento;
use App\Cargo;
use App\Aeropuerto;

class UsuarioController extends Controller {



	public function index()
	{
		$grupos        = Role::all();
        $departamentos = Departamento::all();
        $cargos        = Cargo::all();
        $aeropuertos   = Aeropuerto::all();
        return view('usuario/index', compact("grupos", "departamentos", "cargos", "aeropuertos"));
	}

	//Creación de un nuevo registro.
    public function create(Request $request)
    {
        $user                  = new Usuario();

        //$user->grupo_id        =$request->input('grupo_id');
        $user->username        =$request->input('username');
        $user->password        =bcrypt($request->input('password'));
        $user->fullname        =$request->input('fullname');
        $user->departamento_id =$request->input('departamento_id');
        $user->cargo_id        =$request->input('cargo_id');
        $user->directo         =$request->input('directo');
        $user->email           =$request->input('email');
        $user->estado          =($request->input('estado')=="true")?"1":"0";
        $user->aeropuerto_id   =$request->input('aeropuerto_id');
        if($user->save())
        {
            return response()->json(array("text"=>"Usuario guardado exitósamente.",
                "usuario"=>$user->load("departamento", "cargo", "aeropuerto", "roles"),
                "success"=>1));

        }
        else
        {
            return response()->json(array("text"=>"Error guardando el usuario.", "success"=>0));
        }

    }

    // Muestra de todos los elementos de la tabla
	public function store()
	{
		return response()->json(Usuario::with("departamento", "cargo", "aeropuerto", "roles")->get());
    }
	


    //Muestra un registro de la tabla.
	public function show(Request $request)
    {

        $id   = $request->input('id');
        $user = Usuario::find($id);

        if($user)
        {
            return response()->json(array("usuario"=>$user,
                "success"=>1));

        }
        else
        {
            return response()->json(array("success"=>0));
        }

    }

    //Modificación de un registro.
	public function edit(Request $request)
    {
        
        $id                    = $request->input('id');
        $user                  = Usuario::find($id);
        
        //$user->grupo_id        =$request->input('grupo_id');
        $user->username        =$request->input('username');
        $user->password        =bcrypt($request->input('password'));
        $user->fullname        =$request->input('fullname');
        $user->departamento_id =$request->input('departamento_id');
        $user->cargo_id        =$request->input('cargo_id');
        $user->directo         =$request->input('directo');
        $user->email           =$request->input('email');
        $user->estado          =($request->input('estado')=="true")?"1":"0";
        $user->aeropuerto_id   =$request->input('aeropuerto_id');
        if($user->save())
        {
            return response()->json(array("text"=>"Usuario actualizado exitósamente.",
                "usuario"=>$user->load("departamento", "cargo", "aeropuerto", "roles"),
                "success"=>1));
        }
        else
        {
            return response()->json(array("text"=>"Error actualizando la información del usuario.", "success"=>0));
        }

    }



    //Eliminar un registro.
	public function destroy(Request $request)
    {
        $id   = $request->input('id');
        $user = Usuario::find($id);
        if($user->delete())
        {
            return response()->json(array("text"=>"Usuario eliminado exitósamente.",
                "success"=>1));
        }
        else
        {
            return response()->json(array("text"=>"Error elimininando el usuario.", "success"=>0));
        }

    }


    //Cambio de estado de un usuario.
    public function estadoUser(Request $request)
    {
        $id           = $request->input('id');
        $user         = Usuario::find($id);

        if ($user->estado == '0')
        {
            $user->estado     = '1';
            $mensaje          = "Usuario habilitado exitósamente.";
            $mensajeError     = "Ocurrió un error habilitando al usuario.";
        } 
        else
        {
            $user->estado = '0';
            $mensaje      = "Usuario inhabilitado exitósamente.";
            $mensajeError = "Ocurrió un error inhabilitando al usuario.";
        }
        if($user->save())
        {
            return response()->json(array("text"=>$mensaje,
                "usuario"=>$user,
                "success"=>1));

        }
        else
        {
            return response()->json(array("text"=>$mensajeError, "success"=>0));
        }

    }

}
