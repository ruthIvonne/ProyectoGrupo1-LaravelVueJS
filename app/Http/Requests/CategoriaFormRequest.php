<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a realizar esta solicitud.
     */
    public function authorize(): bool
    {
        return true; // Cambia esto si tienes una verificación de permisos
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     */
    public function rules(): array
    {
        $categoriaId = $this->route('id'); // Obtiene el ID de la categoría desde la ruta

        return [
            'nombre_categoria' => 'required|string|max:255',
        ];
    }
}
