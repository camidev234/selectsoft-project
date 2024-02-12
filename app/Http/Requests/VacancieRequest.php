<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancieRequest extends FormRequest
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
        return [
            'vacancie_code' => 'required|unique:vacancies|min:4|max:6',
            'skills' => 'max:500',
            'required_experience' => 'required|string|min:1|max:3',
            'salary_range' => 'required|string|max:45',
            'number_vacancies' => 'required|string|min:1|max:3',
            'schedule' => 'required|string|max:50',
            'applicant_person' => 'required|string|max:30',
            'annotations' => 'required|string|max:400',
        ];
    }
}
