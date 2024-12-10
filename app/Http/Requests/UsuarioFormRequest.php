<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',  // Confirmación de contraseña
            'biografia' => 'nullable|string',
            'foto_perfil' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // Validación para la foto de perfil
            'rol' => 'required|in:alumno,docente,administrador',
        ];
    }

    public function messages()
    {
        return [
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'email.unique' => 'El correo electrónico ya está registrado.',
        ];
    }

    public function attributes(){
        return [
            /*acá se crean los nombres específicos de los atributos. Ejemplo:
            'descripcion'   =>  'Descripcion' */
           // 'name'              =>  'Nombre',
        ];
    }
}
