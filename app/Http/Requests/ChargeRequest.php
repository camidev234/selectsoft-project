<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChargeRequest extends FormRequest
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
            'charge' => 'required|string'
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
            'charge.required' => 'El campo cargo es obligatorio.',
            'charge.string' => 'El campo cargo debe ser una cadena de caracteres.',
        ];
    }
}
