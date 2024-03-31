<?php

namespace App\Livewire;

use App\Http\Controllers\UserController;
use App\Models\City;
use App\Models\Country;
use App\Models\Departament;
use App\Models\Document_type;
use Livewire\Component;

class RegisterForm extends Component
{

    public $id_department = 1;
    public $name;
    public $last_name;
    public $document_type_id = 1;
    public $number_document;
    public $telephone;
    public $phone_number;
    public $address;
    // public $id_department;
    public $id_city = 1;
    public $birthdate;
    public $email;
    public $password;
    public $errores = [];

    public $isSend = false;

    public function render()
    {

        $countries = Country::all();
        $document_types = Document_type::all();
        $departaments = Departament::all();
        $cities = City::where('departament_id', $this->id_department)->get();

        // if(!empty($cities)){
        //     $this->id_city = $cities->first()->id;
        // }

        return view('livewire.register-form', [
            'document_types' => $document_types,
            'departaments' => $departaments,
            'cities' => $cities,
            'countries' => $countries
        ]);
    }

    public function storeUser() {
        $validatedData = $this->validate([
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
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'last_name.required' => 'El campo apellido es obligatorio.',
            'document_type_id.required' => 'El campo tipo de documento es obligatorio.',
            'document_type_id.exists' => 'El tipo de documento seleccionado no es válido.',
            'number_document.required' => 'El campo número de documento es obligatorio.',
            'number_document.integer' => 'El campo número de documento debe ser un número entero.',
            'number_document.min' => 'El campo número de documento debe ser como mínimo :min.',
            'number_document.unique' => 'El número de documento ya ha sido registrado.',
            'number_document.digits_between' => 'El número de documento debe tener entre :min y :max dígitos.',
            'telephone.integer' => 'El campo teléfono debe ser un número entero.',
            'telephone.digits_between' => 'El campo teléfono debe tener entre :min y :max dígitos.',
            'phone_number.required' => 'El campo número de teléfono es obligatorio.',
            'phone_number.integer' => 'El campo número de teléfono debe ser un número entero.',
            'phone_number.digits_between' => 'El campo número de teléfono debe tener entre :min y :max dígitos.',
            'address.required' => 'El campo dirección es obligatorio.',
            'address.max' => 'El campo dirección no debe tener más de :max caracteres.',
            'id_department.required' => 'El campo departamento es obligatorio.',
            'id_department.exists' => 'El departamento seleccionado no es válido.',
            'id_city.required' => 'El campo ciudad es obligatorio.',
            'id_city.exists' => 'La ciudad seleccionada no es válida.',
            'birthdate.required' => 'El campo fecha de nacimiento es obligatorio.',
            'birthdate.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo electrónico válida.',
            'email.max' => 'El campo correo electrónico no debe tener más de :max caracteres.',
            'email.unique' => 'La dirección de correo electrónico ya ha sido registrada.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'El campo contraseña debe tener al menos :min caracteres.',
        ]);
        


        $userController = new UserController();

        $userController->store($validatedData);
    }
}
