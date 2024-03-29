<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequisitionRequest extends FormRequest
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
            'charge_id' => 'required|exists:charges,id',
            'number_vacancies' => 'required|integer|min:1',
            'required_experience' => 'required|integer|min:1'
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
            'charge_id.required' => 'El campo ID de cargo es obligatorio.',
            'charge_id.exists' => 'El ID de cargo seleccionado no es válido.',
            'required_experience.required' => 'La experiencia requerida es requerida.',
            'required_experience.integer' => 'La experiencia requerida debe ser un número entero.',
            'required_experience.min' => 'La experiencia requerida debe ser al menos :min.',
            'number_vacancies.required' => 'El número de vacantes es requerido.',
            'number_vacancies.integer' => 'El número de vacantes debe ser un número entero.',
            'number_vacancies.min' => 'El número de vacantes debe ser al menos :min.',
        ];
    }
}
