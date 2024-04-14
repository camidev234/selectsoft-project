<?php

namespace App\Livewire;

use App\Http\Controllers\CompanyController;
use App\Models\City;
use App\Models\Departament;
use Livewire\Component;

class CreateCompany extends Component
{

    public $departament_id = 1;
    public $city_id;
    public $nit;
    public $business_name;
    public $phone;
    public $email;
    public $address;

    public function render()
    {

        $departaments = Departament::all();
        $cities = City::where('departament_id', $this->departament_id)->get();

        return view('livewire.create-company', [
            'departaments' => $departaments,
            'cities' => $cities,
        ]);
    }


    public function storeCompany() {
        $validatedData = $this->validate([
            'nit' => 'required|string|max:19|unique:companies',
            'business_name' => 'required|string',
            'phone' => 'required|string|max:11',
            'email' => 'required|string|max:70',
            'address' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'departament_id' => 'required|exists:departaments,id',
        ]); 

        $companyController = new CompanyController();

        $companyController->store($validatedData);
    }

    public function handleCityChange($departamentId) {
        $cities = City::where('departament_id', $departamentId)->get();
        $this->city_id = $cities->first()->id;
    }
}