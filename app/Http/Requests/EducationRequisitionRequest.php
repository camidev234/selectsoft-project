<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequisitionRequest extends FormRequest
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
            'study_name' => 'required|max:80|string',
            'points' => 'required|integer|min:1|digits_between:1,3'
        ];
    }

    public function messages() {
        return [
            'study_name.required' => 'El titulo es obligatorio.',
            'study_name.max' => 'El titulo no puede tener más de :max caracteres.',
            'study_name.string' => 'El nombre del estudio debe ser una cadena de caracteres.',
            'points.required' => 'Los puntos son obligatorios.',
            'points.integer' => 'Los puntos deben ser un número entero.',
            'points.min' => 'Los puntos deben ser al menos :min.',
            'points.digits_between' => 'Los puntos deben tener entre :min y :max dígitos.'
        ];
    }
}
