<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function create(array $data)
{
    // Si se sube una foto de perfil, se guarda en el directorio 'profile_images'
    $fotoPerfilPath = null;
    if (isset($data['foto_perfil'])) {
        $fotoPerfilPath = $data['foto_perfil']->store('profile_images', 'public');
    }
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'apellido' => $data['apellido'] ?? 'default apellido',
        'biografia' => $data['biografia'] ?? 'default biografía',
        'rol' => $data['rol'] ?? 'alumno',  // Valor predeterminado
        'foto_perfil' => $fotoPerfilPath,  // Guardar la ruta del archivo
    ]);
    }

    /**
     * Validate the user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'apellido' => ['nullable', 'string', 'max:255'],
            'biografia' => ['nullable', 'string'],
            'foto_perfil' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Validar que sea una imagen
        ]);
    }
}