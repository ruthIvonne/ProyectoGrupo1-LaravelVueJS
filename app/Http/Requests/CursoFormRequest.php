<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TimeFormat;


class CursoFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'plan_de_estudio' => 'required|string',
            'duracion' =>   ['required', new TimeFormat],
            'precio' => 'required|numeric',
            'video_url' => 'nullable|url',
            'categoria_id' => 'required|exists:categorias,id',
            'docente_id' => 'required|exists:users,id', // Verifica que el docente exista
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El título del curso es obligatorio.',
            'institucion.required' => 'La institución es obligatoria.',
            'precio.numeric' => 'El precio debe ser un valor numérico.',
            'categoria_id.exists' => 'La categoría seleccionada no existe.',
            'docente_id.exists' => 'El docente seleccionado no existe.',
            'duracion.required' => 'La duración es obligatoria.',
            'duracion.regex' => 'La duración debe tener el formato HH:MM:SS.',
        ];
    }
}
