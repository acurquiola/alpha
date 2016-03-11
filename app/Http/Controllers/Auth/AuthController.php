<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

    protected $redirectTo="principal";
    protected $loginPath="/";

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => ['getLogout', 'getLogoutRemember']]);
	}

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('index');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'userName' => 'required', 'password' => 'required',
        ]);
        $userName   =$request->get('userName');
        $aeropuerto =\App\Aeropuerto::find($request->get('aeropuerto_id'));
        $user       =\App\Usuario::where('userName', $userName)->first();

        if($user->aeropuerto_id==$aeropuerto->id){

            $credentials = $request->only('userName', 'password');

            if ($this->auth->attempt($credentials, false))
            { 
                session(["aeropuerto"=> $aeropuerto]);
                return redirect()->intended($this->redirectPath());
            }

            return redirect($this->loginPath())
            ->withInput($request->only('userName', 'remember'))
            ->withErrors([
                'userName' => $this->getFailedLoginMessage(),
            ]);

        }else{
            return redirect($this->loginPath())
                ->withInput($request->only('userName', 'remember'))
                ->withErrors([
                    'aeropuerto' => 'Aeropuerto no autorizado',
                ]);
            }
        }

    public function getLogout(Guard $auth)
    {
        $errors=null;
        if(\Session::has('errors')){
            $errors = \Session::get('errors')->all();
        }

        session()->forget('aeropuerto');
        $auth->logout();
        return redirect('/')->withErrors($errors);
    }


    public function getLogoutRemember(Guard $auth)
    {
        $errors=["Tu sesión ha expirado."];
        session()->put('url.intended', \URL::previous());
        session()->forget('aeropuerto');
        $auth->logout();
        return redirect('/')->withErrors($errors);
    }



}
