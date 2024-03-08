<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequisitionRequest extends FormRequest
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
}
