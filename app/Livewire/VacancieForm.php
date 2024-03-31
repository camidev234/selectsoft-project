<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Company;
use App\Models\Departament;
use App\Models\Requisiton;
use App\Models\Salaries_type;
use App\Models\Work_day;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VacancieForm extends Component
{

    public $vacancie_code;
    public $work_day_id;
    public $departament_id = 1;
    public $city_id;
    public $skills;
    public $salary_range;
    public $schedule;
    public $applicant_person;
    public $annotations; 
    public $requisiton_id;
    public $salaries_type_id;

    public function render()
    {

        $company = Company::find(Auth::user()->recruiter->company_id);
        $requisitions = Requisiton::where('company_id', $company->id)->get();
        $cities = City::where('departament_id', $this->departament_id)->get();
        if(!empty($requisitions)){
            $this->requisiton_id = $requisitions->first()->id;
        }

        return view('livewire.vacancie-form', [
            'company' => $company,
            'requisitions' => $requisitions,
            'days' => Work_day::all(),
            'salaries' => Salaries_type::all(),
            'departaments' => Departament::all(),
            'cities' => $cities
        ]);
    }


    public function storeVacancie()
    {
        $validatedData = $this->validate([
            'vacancie_code' => 'required|unique:vacancies|integer|min:0|digits_between:4,6',
            'skills' => 'max:1500',
            'salary_range' => 'required|string|min:0|max:45',
            'schedule' => 'required|string|max:50',
            'applicant_person' => 'required|string|max:30',
            'departament_id' => 'required|exists:departaments,id',
            'city_id' => 'required|exists:cities,id',
            'annotations' => 'required|string|max:700',
            'work_day_id' => 'required|exists:work_days,id',
            'salaries_type_id' => 'required|exists:work_days,id'
        ], [
            'vacancie_code.required' => 'El código de la vacante es requerido.',
            'vacancie_code.unique' => 'El código de la vacante ya existe.',
            'vacancie_code.integer' => 'El código de la vacante debe ser un número entero.',
            'vacancie_code.min' => 'El código de la vacante debe ser al menos :min.',
            'vacancie_code.digits_between' => 'El código de la vacante debe tener entre :min y :max dígitos.',
            'skills.max' => 'Las habilidades no deben exceder los :max caracteres.',
            'salary_range.required' => 'El rango salarial es requerido.',
            'salary_range.string' => 'El rango salarial debe ser una cadena de caracteres.',
            'salary_range.min' => 'El rango salarial debe tener al menos :min caracteres.',
            'salary_range.max' => 'El rango salarial no debe exceder los :max caracteres.',
            'schedule.required' => 'El horario es requerido.',
            'schedule.string' => 'El horario debe ser una cadena de caracteres.',
            'schedule.max' => 'El horario no debe exceder los :max caracteres.',
            'applicant_person.required' => 'El nombre del solicitante es requerido.',
            'applicant_person.string' => 'El nombre del solicitante debe ser una cadena de caracteres.',
            'applicant_person.max' => 'El nombre del solicitante no debe exceder los :max caracteres.',
            'annotations.required' => 'Las anotaciones son requeridas.',
            'annotations.string' => 'Las anotaciones deben ser una cadena de caracteres.',
            'annotations.max' => 'Las anotaciones no deben exceder los :max caracteres.',
        ]);
    }
}
