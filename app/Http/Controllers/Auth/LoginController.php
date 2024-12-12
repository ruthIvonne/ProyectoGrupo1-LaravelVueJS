<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use app\Models\User;
use Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request){
        $userLocal=null;
        $credentials = $this->credentials($request);

        if(Auth::validate($credentials)){
            $user = Auth::getLastAttempted();
            auth()->login($user);
            return redirect('home');
        }else{
            if(!empty($credentials['name'])){
                $userLocal = User::where('name', $credentials['name'])->first();
            }elseif (!empty($credentials['email'])) {
                $userLocal = User::where('email', $credentials['email'])->first();
            }
            if(is_null($userLocal)){
                Session::flash('flash_message','El usuario es incorrecto');
                Session::flash('flash_message_class','danger');
            }else{
                Session::flash('flash_message','La contraseña es incorrecta');
                Session::flash('flash_message_class','danger');
            }
            return back()->withInput();
        }
    }

    public function credentials(Request $request){
        $login = $request->input($this->username());
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        return [
            $field      => $login,
            'password'  => $request->input('password'),
        ];
    }

    public function username(){
        return 'login';
    }
}
