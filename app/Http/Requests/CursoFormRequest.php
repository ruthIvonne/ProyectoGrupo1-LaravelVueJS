<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:100',
            'institucion' => 'required|string|max:200',
            'plan_de_estudio' => 'required|string|max:400',
          //  'duracion' => ['regex:/^([0-1]?[0-9]|2[0-3]):([0-5]?[0-9]):([0-5]?[0-9])$/'],
            'certificados' => 'required|boolean',
            'precio' => 'required|numeric|min:0',
            'video_url' => 'nullable|string|max:255|url',
            'categoria_id' => 'required|exists:categorias,id',
            'docente_id' => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El título del curso es obligatorio.',
            'institucion.required' => 'La institución es obligatoria.',
            'plan_de_estudio.required' => 'El plan de estudio es obligatorio.',
            'duracion.required' => 'La duración es obligatoria.',
            'duracion.regex' => 'La duración debe estar en formato HH:MM:SS.',
            'certificados.required' => 'Debe indicar si el curso incluye certificados.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un valor numérico.',
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists' => 'La categoría seleccionada no es válida.',
            'docente_id.required' => 'El docente es obligatorio.',
            'docente_id.exists' => 'El docente seleccionado no es válido.',
            'video_url.url' => 'La URL del video debe ser válida.',
        ];
    }
}
