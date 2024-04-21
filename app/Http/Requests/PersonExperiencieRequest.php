<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonExperiencieRequest extends FormRequest
{
    /**
     * Determine si el usuario está autorizado para hacer esta solicitud.
     */
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
            'company_experience' => ['required', 'string', 'max:80'],
            // 'months_experience' => ['required', 'integer', 'min:1'],
            'functions' => ['required', 'string', 'max:900'],
            'start_date' => ['required', 'date'],
            'finish_date' => ['required', 'date'],
            'job' => ['required', 'string', 'max:100']
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
            'company_experience.required' => 'La experiencia en la empresa es obligatoria.',
            'company_experience.string' => 'La experiencia en la empresa debe ser una cadena de caracteres.',
            'company_experience.max' => 'La experiencia en la empresa no debe exceder :max caracteres.',
            'start_date.required' => 'La fecha de inicio es requerida.',
            'start_date.date' => 'La fecha de inicio debe tener un formato de fecha valido.',
            'finish_date.date' => 'La fecha de fin debe tener un formato de fecha valido.',
            'finish_date.required' => 'La fecha de fin es requerida.',
            'functions.required' => 'Las funciones son obligatorias.',
            'functions.string' => 'Las funciones deben ser una cadena de caracteres.',
            'functions.max' => 'Las funciones no deben exceder :max caracteres.',
            'job.required' => 'El cargo que desempeño es requerido.'
        ];
    }
}