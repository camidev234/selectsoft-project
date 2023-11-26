<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'shcool_name' => ['required', 'min:4', 'max:40'],
            'obtained_title' => ['required', 'max: 70'],
            'study_level_id' => 'required|exists:study_levels,id',
            'study_status_id' => 'required|exists:study_statuses,id'
        ];
    }
}
