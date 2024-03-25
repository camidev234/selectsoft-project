<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class UpdateVacancieRequest extends FormRequest
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
        $vacancieId = $this->route('vacancie'); // Asumiendo que estás pasando el ID en la ruta

        return [
            'vacancie_code' => [
                'required',
                'integer',
                'min:0',
                'digits_between:4,6',
                ValidationRule::unique('vacancies')->ignore($vacancieId),
            ],
            'skills' => 'max:500',
            'required_experience' => 'required|integer|min:1',
            'salary_range' => 'required|string|max:45',
            'number_vacancies' => 'required|integer|min:1|digits_between:1,3',
            'schedule' => 'required|string|max:50',
            'applicant_person' => 'required|string|max:30',
            'annotations' => 'required|string|max:700',
        ];
    }

    public function messages(): array
    {
        return [
            'vacancie_code.required' => 'El código de la vacante es requerido.',
            'vacancie_code.unique' => 'El código de la vacante ya existe.',
            'vacancie_code.integer' => 'El código de la vacante debe ser un número entero.',
            'vacancie_code.min' => 'El código de la vacante debe ser al menos :min.',
            'vacancie_code.digits_between' => 'El código de la vacante debe tener entre :min y :max dígitos.',
            'skills.max' => 'Las habilidades no deben exceder los :max caracteres.',
            'required_experience.required' => 'La experiencia requerida es requerida.',
            'required_experience.integer' => 'La experiencia requerida debe ser un número entero.',
            'required_experience.min' => 'La experiencia requerida debe ser al menos :min.',
            'salary_range.required' => 'El rango salarial es requerido.',
            'salary_range.string' => 'El rango salarial debe ser una cadena de caracteres.',
            'salary_range.min' => 'El rango salarial debe tener al menos :min caracteres.',
            'salary_range.max' => 'El rango salarial no debe exceder los :max caracteres.',
            'number_vacancies.required' => 'El número de vacantes es requerido.',
            'number_vacancies.integer' => 'El número de vacantes debe ser un número entero.',
            'number_vacancies.min' => 'El número de vacantes debe ser al menos :min.',
            'number_vacancies.digits_between' => 'El número de vacantes debe tener entre :min y :max dígitos.',
            'schedule.required' => 'El horario es requerido.',
            'schedule.string' => 'El horario debe ser una cadena de caracteres.',
            'schedule.max' => 'El horario no debe exceder los :max caracteres.',
            'applicant_person.required' => 'El nombre del solicitante es requerido.',
            'applicant_person.string' => 'El nombre del solicitante debe ser una cadena de caracteres.',
            'applicant_person.max' => 'El nombre del solicitante no debe exceder los :max caracteres.',
            'annotations.required' => 'Las anotaciones son requeridas.',
            'annotations.string' => 'Las anotaciones deben ser una cadena de caracteres.',
            'annotations.max' => 'Las anotaciones no deben exceder los :max caracteres.',
        ];
    }
}
