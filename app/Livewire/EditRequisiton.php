<?php

namespace App\Livewire;

use App\Http\Controllers\RequisitonController;
use App\Models\Charge;
use App\Models\Occupation;
use App\Models\Occupation_function;
use Livewire\Component;

class EditRequisiton extends Component
{

    public $requisiton;
    public $number_vacancies;
    public $required_experience;
    public $occupation;
    public $charge_id;

    public function mount() {
        $this->occupation = $this->requisiton->charge->occupation;
        $this->charge_id = $this->requisiton->charge_id;
        $this->required_experience = $this->requisiton->required_experience;
        $this->number_vacancies = $this->requisiton->number_vacancies;
    }

    public function render()
    {

        // get all jobs where the company is the actual session
        $jobs = Charge::where('company_id', $this->requisiton->company_id)->get();
        // select the actual job
        $selectedJob = Charge::find($this->requisiton->charge_id);
        // splice the actual job of the all jobs in company
        $jobsExceptSelected = $jobs->except($selectedJob->id);
        // merge the selected with the array that contains all jobs in company except the actual
        // the actual will be the first in the select
        $jobsSorted = collect([$selectedJob->id => $selectedJob])->merge($jobsExceptSelected);

        // get the functions that belongs to selected job
        $functions = Occupation_function::where('charge_id', $this->charge_id)->get();

        $this->occupation = Occupation::find(Charge::find($this->charge_id)->occupation_id);

        return view('livewire.edit-requisiton', [
            'jobs' => $jobsSorted,
            'functions' => $functions
        ]);
    }


    public function updateRequisition() {
        $validatedData = $this->validate([
            'charge_id' => 'required|exists:charges,id',
            'number_vacancies' => 'required|integer|min:1',
            'required_experience' => 'required|integer|min:1'
        ], [
            'charge_id.required' => 'El campo cargo es obligatorio.',
            'charge_id.exists' => 'El cargo seleccionado no es válido.',
            'number_vacancies.required' => 'El campo número de vacantes es obligatorio.',
            'number_vacancies.integer' => 'El campo número de vacantes debe ser un número entero.',
            'number_vacancies.min' => 'El campo número de vacantes debe ser al menos :min.',
            'required_experience.required' => 'El campo meses de experiencia es obligatorio.',
            'required_experience.integer' => 'El campo meses de experiencia debe ser un número entero.',
            'required_experience.min' => 'El campo meses de experiencia debe ser al menos :min.'
        ]);

        $requisitonController = new RequisitonController();

        $requisitonController->update($validatedData, $this->requisiton);
    }
}
