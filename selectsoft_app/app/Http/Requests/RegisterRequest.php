<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type_id' => 'required|exists:document_types,id',
            'number_document' => 'required|string|max:255|unique:users',
            'telephone' => 'required|string|max:255',
            'phone_number' => 'min:0|max:255',
            'address' => 'required|string|max:255',
            'id_country' => 'required|exists:countries,id',
            'id_department' => 'required|exists:departaments,id',
            'id_city' => 'required|exists:cities,id',
            'birthdate' => 'required|date',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ];
    }
}
