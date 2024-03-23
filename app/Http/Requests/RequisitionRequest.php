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
            'job_description' => 'required|string|max:1200',
            'justification' => 'required|string|max:1500',
            'ideal_candidate' => 'required|string|max:700',
            'mission_charge' => 'required|string|max:700',
            'responsabilities' => 'required|string|max:700',
            'candidate_description' => 'required|string|max:700',
            'candidate_talents' => 'required|string|max:700',
            'selection_criteria' => 'required|string|max:700',
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
            'job_description.required' => 'El campo descripción del trabajo es obligatorio.',
            'job_description.string' => 'El campo descripción del trabajo debe ser una cadena de caracteres.',
            'job_description.max' => 'El campo descripción del trabajo no debe exceder los :max caracteres.',
            'justification.required' => 'El campo justificación es obligatorio.',
            'justification.string' => 'El campo justificación debe ser una cadena de caracteres.',
            'justification.max' => 'El campo justificación no debe exceder los :max caracteres.',
            'ideal_candidate.required' => 'El campo candidato ideal es obligatorio.',
            'ideal_candidate.string' => 'El campo candidato ideal debe ser una cadena de caracteres.',
            'ideal_candidate.max' => 'El campo candidato ideal no debe exceder los :max caracteres.',
            'mission_charge.required' => 'El campo misión del cargo es obligatorio.',
            'mission_charge.string' => 'El campo misión del cargo debe ser una cadena de caracteres.',
            'mission_charge.max' => 'El campo misión del cargo no debe exceder los :max caracteres.',
            'responsabilities.required' => 'El campo responsabilidades es obligatorio.',
            'responsabilities.string' => 'El campo responsabilidades debe ser una cadena de caracteres.',
            'responsabilities.max' => 'El campo responsabilidades no debe exceder los :max caracteres.',
            'candidate_description.required' => 'El campo descripción del candidato es obligatorio.',
            'candidate_description.string' => 'El campo descripción del candidato debe ser una cadena de caracteres.',
            'candidate_description.max' => 'El campo descripción del candidato no debe exceder los :max caracteres.',
            'candidate_talents.required' => 'El campo talentos del candidato es obligatorio.',
            'candidate_talents.string' => 'El campo talentos del candidato debe ser una cadena de caracteres.',
            'candidate_talents.max' => 'El campo talentos del candidato no debe exceder los :max caracteres.',
            'selection_criteria.required' => 'El campo criterios de selección es obligatorio.',
            'selection_criteria.string' => 'El campo criterios de selección debe ser una cadena de caracteres.',
            'selection_criteria.max' => 'El campo criterios de selección no debe exceder los :max caracteres.',
        ];
    }
}
