<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador maneja el registro de nuevos usuarios y utiliza un trait
    | para proporcionar esta funcionalidad sin requerir código adicional.
    |
    */

    use RegistersUsers;

    /**
     * Donde redirigir a los usuarios después de registrarse.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Crear una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Mostrar el formulario de registro.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Manejar una solicitud de registro.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Si se sube una foto de perfil, se guarda en el directorio 'profile_images'
        $fotoPerfilPath = null;
        if (isset($data['foto_perfil'])) {
            $fotoPerfilPath = $data['foto_perfil']->store('profile_images', 'public');
        }

        // Crear y devolver el nuevo usuario
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], // Se aplicará Hash automáticamente en el modelo
            'apellido' => $data['apellido'] ?? 'default apellido',
            'biografia' => $data['biografia'] ?? 'default biografía',
            'rol' => $data['rol'] ?? 'alumno', // Valor predeterminado
            'foto_perfil' => $fotoPerfilPath,  // Guardar la ruta del archivo
        ]);
    }

    /**
     * Validar los datos de registro del usuario.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'apellido' => ['nullable', 'string', 'max:255'],
            'biografia' => ['nullable', 'string'],
            'foto_perfil' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Validar que sea una imagen
        ]);
    }
}