<?php

namespace App\Livewire;

use App\Http\Controllers\VacancieController;
use App\Models\City;
use App\Models\Company;
use App\Models\Departament;
use App\Models\Requisiton;
use App\Models\Salaries_type;
use App\Models\Vacancie;
use App\Models\Work_day;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Validation\Rules;


class VacancieEdit extends Component
{

    public $vacancie_code;
    public $vacancie;
    public $departament_id;
    public $city_id;
    public $skills;
    public $salary_range;
    public $schedule;
    public $applicant_person;
    public $annotations;
    public $requisiton_id;
    public $work_day_id;
    public $salaries_type_id;
    // public $number_vacancies;
    // public $cities;

    public $vacancieId;

    public function mount()
    {
        $this->vacancie_code = $this->vacancie->vacancie_code;
        $this->vacancieId = $this->vacancie;
        $this->skills = $this->vacancie->skills;
        $this->salary_range = $this->vacancie->salary_range;
        $this->schedule = $this->vacancie->schedule;
        // $this->number_vacancies = $this->vacancie->number_vacancies;
        $this->applicant_person = $this->vacancie->applicant_person;
        $this->annotations = $this->vacancie->annotations;
        $this->departament_id = Departament::find($this->vacancie->departament_id)->id;
        $this->city_id = City::find($this->vacancie->city_id)->id;
        $this->work_day_id = Work_day::find($this->vacancie->work_day_id)->id;
        $this->requisiton_id = $this->vacancie->requisiton_id;
        $this->salaries_type_id = Salaries_type::find($this->vacancie->salaries_type_id)->id;
    }

    public function render()
    {
        $company = Company::find(Auth::user()->recruiter->company_id);
        $requisitions = Requisiton::where('company_id', $company->id)->where('id', '!=', $this->vacancie->requisiton_id)->get();


        $departaments = Departament::all();
        $selectedDepartament = Departament::find($this->vacancie->departament_id);
        $departamentsExceptSelected = $departaments->except($selectedDepartament->id);
        $departamentsSorted = collect([$selectedDepartament->id => $selectedDepartament])->merge($departamentsExceptSelected);


        $cities = City::where('departament_id', $this->departament_id)->get();
        $selectedCity = City::find($this->vacancie->city_id);
        $citiesExceptSelected = $cities->except($selectedCity->id);
        if ($this->departament_id == $this->vacancie->city->departament_id) {
            $citiesSorted = collect([$selectedCity->id => $selectedCity])->merge($citiesExceptSelected);
        } else {
            $citiesSorted = City::where('departament_id', $this->departament_id)->get();
        }
        $work_days = Work_day::all();

        $workSelected = Work_day::find($this->vacancie->work_day_id);
        $worksExceptSelected = $work_days->except($workSelected->id);
        $workSorted = collect([$workSelected->id => $workSelected])->merge($worksExceptSelected);

        $salaries = Salaries_type::all();

        $selectedSalary = Salaries_type::find($this->vacancie->salaries_type_id);
        $salariesExceptSelected = $salaries->except($selectedSalary->id);
        $salariesSorted = collect([$selectedSalary->id => $selectedSalary])->merge($salariesExceptSelected);

        // $cities = City::where('departament_id', $this->departament_id)->get();

        return view('livewire.vacancie-edit', [
            'requisitions' => $requisitions,
            'days' => $workSorted,
            'salaries' => $salariesSorted,
            'departaments' => $departamentsSorted,
            'cities' => $citiesSorted
        ]);
    }


    public function onChangeDepartament($departamentId)
    {
        $cities = City::where('departament_id', $departamentId)->get();
        $this->city_id = $cities->first()->id;
    }

    public function updateVacancy()
    {
        $validatedData = $this->validate([
            'vacancie_code' => [
                'required',
                'integer',
                'min:0',
                'digits_between:4,6',
                function ($attribute, $value, $fail) {
                    if ($this->vacancie->vacancie_code != $value) {
                        $exists = Vacancie::where('vacancie_code', $value)->exists();

                        if ($exists) {
                            $fail('El código de la vacante ya existe.');
                        }
                    }
                },
            ],
            'skills' => 'max:500',
            // 'required_experience' => 'required|integer|min:1',
            'salary_range' => 'required|string|max:45',
            // 'number_vacancies' => 'required|integer|min:1|digits_between:1,3',
            'schedule' => 'required|string|max:50',
            'applicant_person' => 'required|string|max:30',
            'annotations' => 'required|string|max:700',
            'work_day_id' => 'required|exists:work_days,id',
            'salaries_type_id' => 'required|exists:salaries_types,id',
            'requisiton_id' => 'required|exists:requisitons,id',
            'departament_id' => 'required|exists:departaments,id',
            'city_id' => 'required|exists:cities,id',
        ], [
            'vacancie_code.required' => 'El código de la vacante es requerido.',
            'vacancie_code.unique' => 'El código de la vacante ya existe.',
            'vacancie_code.integer' => 'El código de la vacante debe ser un número entero.',
            'vacancie_code.min' => 'El código de la vacante debe ser al menos :min.',
            'vacancie_code.digits_between' => 'El código de la vacante debe tener entre :min y :max dígitos.',
            'skills.max' => 'Las habilidades no deben exceder los :max caracteres.',
            'required_experience.required' => 'La experiencia requerida es requerida.',
            'required_experience.integer' => 'La experiencia requerida debe ser un número entero.',
            'required_experience.min' => 'La experiencia requerida debe ser al menos :min.',
            'salary_range.required' => 'El rango salarial es requerido.',
            'salary_range.string' => 'El rango salarial debe ser una cadena de caracteres.',
            'salary_range.min' => 'El rango salarial debe tener al menos :min caracteres.',
            'salary_range.max' => 'El rango salarial no debe exceder los :max caracteres.',
            'number_vacancies.required' => 'El número de vacantes es requerido.',
            'number_vacancies.integer' => 'El número de vacantes debe ser un número entero.',
            'number_vacancies.min' => 'El número de vacantes debe ser al menos :min.',
            'number_vacancies.digits_between' => 'El número de vacantes debe tener entre :min y :max dígitos.',
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

        $vacancieController = new VacancieController();

        $vacancieController->update($this->vacancie, Company::find(Auth::user()->recruiter->company_id), $validatedData);
    }
}
