<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OccupationRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'occupation_code' => 'required|integer|min:0|digits_between:4,6',
            'occupation_name' => 'required|max:70|string',
            'description' => 'required|max:1500|string',
        ];
    }

    /**
     * Obtiene los mensajes de error para las reglas de validación definidas.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'occupation_code.required' => 'El campo código de ocupación es obligatorio.',
            'occupation_code.integer' => 'El campo código de ocupación debe ser un número entero.',
            'occupation_code.min' => 'El campo código de ocupación debe ser mínimo :min.',
            'occupation_code.digits_between' => 'El campo código de ocupación debe tener entre :min y :max dígitos.',
            'occupation_name.required' => 'El campo nombre de ocupación es obligatorio.',
            'occupation_name.max' => 'El campo nombre de ocupación no debe exceder los :max caracteres.',
            'occupation_name.string' => 'El campo nombre de ocupación debe ser una cadena de caracteres.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.max' => 'El campo descripción no debe exceder los :max caracteres.',
            'description.string' => 'El campo descripción debe ser una cadena de caracteres.',
        ];
    }
}
