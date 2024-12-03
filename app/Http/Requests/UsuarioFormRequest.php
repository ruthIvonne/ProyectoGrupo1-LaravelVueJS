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
    public function rules(): array
    {
        return [
            //acá se crean las reglas de lo que se va a validar
        ];
    }

    public function messages(){
        return [
            /*Acá se crean los mensajes que va a devolver en caso de errores para cada campo que se validó. Ejemplo:
            'descripcion.required'  =>  'La :attribute es requerida' */
        
        ];
    }

    public function attributes(){
        return [
            /*acá se crean los nombres específicos de los atributos. Ejemplo:
            'descripcion'   =>  'Descripcion' */
        ];
    }
}
