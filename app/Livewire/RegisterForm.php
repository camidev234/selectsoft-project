<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\Departament;
use App\Models\Document_type;
use Livewire\Component;

class RegisterForm extends Component
{

    public $departament_id = 1;

    public function render()
    {

        $countries = Country::all();
        $document_types = Document_type::all();
        $departaments = Departament::all();
        $cities = City::where('departament_id', $this->departament_id)->get();

        return view('livewire.register-form', [
            'document_types' => $document_types,
            'departaments' => $departaments,
            'cities' => $cities,
            'countries' => $countries
        ]);
    }
}
