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
            'number_document' => 'required|integer|min:0|unique:users|digits_between:5,11',
            'telephone' => 'nullable|integer|digits_between:6,7',
            'phone_number' => 'integer|digits_between:10,11|required',
            'address' => 'required|string|max:255',
            // 'id_country' => 'required|exists:countries,id',
            'id_department' => 'required|exists:departaments,id',
            'id_city' => 'required|exists:cities,id',
            'birthdate' => 'required|date',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de caracteres.',
            'name.max' => 'El campo nombre no debe exceder los :max caracteres.',
            'last_name.required' => 'El campo apellido es obligatorio.',
            'last_name.string' => 'El campo apellido debe ser una cadena de caracteres.',
            'last_name.max' => 'El campo apellido no debe exceder los :max caracteres.',
            'document_type_id.required' => 'Debe seleccionar un tipo de documento.',
            'document_type_id.exists' => 'El tipo de documento seleccionado no es válido.',
            'number_document.required' => 'El campo número de documento es obligatorio.',
            'number_document.integer' => 'El campo número de documento debe ser un número entero.',
            'number_document.min' => 'El campo número de documento debe ser al menos :min.',
            'number_document.unique' => 'El número de documento ya ha sido registrado.',
            'number_document.digits_between' => 'El campo número de documento debe tener entre :min y :max dígitos.',
            'telephone.integer' => 'El campo teléfono debe ser un número entero.',
            'telephone.digits_between' => 'El campo teléfono debe tener entre :min y :max dígitos.',
            'phone_number.integer' => 'El campo número de teléfono debe ser un número entero.',
            'phone_number.digits_between' => 'El campo número de teléfono debe tener entre :min y :max dígitos.',
            'phone_number.required' => 'El campo número de teléfono es obligatorio.',
            'address.required' => 'El campo dirección es obligatorio.',
            'address.string' => 'El campo dirección debe ser una cadena de caracteres.',
            'address.max' => 'El campo dirección no debe exceder los :max caracteres.',
            // 'id_country.required' => 'Debe seleccionar un país.',
            // 'id_country.exists' => 'El país seleccionado no es válido.',
            'id_department.required' => 'Debe seleccionar un departamento.',
            'id_department.exists' => 'El departamento seleccionado no es válido.',
            'id_city.required' => 'Debe seleccionar una ciudad.',
            'id_city.exists' => 'La ciudad seleccionada no es válida.',
            'birthdate.required' => 'El campo fecha de nacimiento es obligatorio.',
            'birthdate.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.max' => 'El campo correo electrónico no debe exceder los :max caracteres.',
            'email.unique' => 'El correo electrónico ya ha sido registrado.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'La contraseña debe ser una cadena de caracteres.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ];
    }
}
