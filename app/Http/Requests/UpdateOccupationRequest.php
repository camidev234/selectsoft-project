<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOccupationRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtener las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'occupation_code' => ['required', 'min:4', 'max:7', 'string'],
            'occupation_name' => ['required', 'max:70', 'string'],
            'description' => ['required']
        ];
    }

    /**
     * Obtener los mensajes de error personalizados.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'occupation_code.required' => 'El código de ocupación es obligatorio.',
            'occupation_code.min' => 'El código de ocupación debe tener al menos :min caracteres.',
            'occupation_code.max' => 'El código de ocupación no debe exceder :max caracteres.',
            'occupation_code.string' => 'El código de ocupación debe ser una cadena de caracteres.',
            'occupation_name.required' => 'El nombre de la ocupación es obligatorio.',
            'occupation_name.max' => 'El nombre de la ocupación no debe exceder :max caracteres.',
            'occupation_name.string' => 'El nombre de la ocupación debe ser una cadena de caracteres.',
            'description.required' => 'La descripción es obligatoria.'
        ];
    }
}
