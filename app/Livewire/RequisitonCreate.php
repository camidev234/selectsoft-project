<?php

namespace App\Livewire;

use App\Http\Requests\RequisitionRequest;
use App\Models\Charge;
use App\Models\Company;
use App\Models\Occupation;
use App\Models\Occupation_function;
use App\Models\RequisitionStudy;
use App\Models\Requisiton;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class RequisitonCreate extends Component
{

    public $charge_id;
    public $occupation;
    public $number_vacancies;
    public $required_experience;

    public $formVisible = false;

    public $educations = [];

    public function mount()
    {
        $company = Auth::user()->recruiter->company_id;
        $jobs = Charge::where('company_id', $company)->get();
        if (!$jobs->isEmpty()) {
            $this->charge_id = $jobs->first()->id;
        }
    }


    public function render()
    {

        $company = Auth::user()->recruiter->company_id;
        $companyToView = Company::find($company);

        $jobs = Charge::where('company_id', $company)->get();

        if ($this->charge_id !== null) {
            $this->occupation = Occupation::find(Charge::find($this->charge_id)->occupation_id);
        }

        $functions = Occupation_function::where('charge_id', $this->charge_id)->get();
        // dd($this->charge_id);s
        return view('livewire.requisiton-create', [
            'company' => $companyToView,
            'jobs' => $jobs,
            'role_id' => Auth::user()->role_id,
            'user' => Auth::user(),
            'functions' => $functions
        ]);
    }


    #[On('handleAddEducation')]
    public function handleAddEducation($educations)
    {
        $this->educations[] = $educations;
        // dd($this->educations);
    }

    public function storeRequisition()
    {

        $company = Company::find(Auth::user()->recruiter->company->id);

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
        
        $requisition = new Requisiton();
        $requisition->charge_id = $validatedData['charge_id'];
        $requisition->required_experience = $validatedData['required_experience'];
        $requisition->number_vacancies = $validatedData['number_vacancies'];
        $requisition->company_id = $company->id;
        $requisition->save();

        if(!empty($this->educations)){
            foreach($this->educations as $education){
                $newEducationRequisition = new RequisitionStudy();
                $newEducationRequisition->study_level_id = $education['study_level_id'];
                $newEducationRequisition->study_status_id = $education['study_status_id'];
                $newEducationRequisition->study_name = $education['study_name'];
                $newEducationRequisition->points = $education['points'];
                $newEducationRequisition->requisiton_id = $requisition->id;

                $newEducationRequisition->save();
            }
        }

        $this->reset();

        return redirect()->route('requisition.index', ['company' => $company]);
    }


    public function setVisible() {
        $this->formVisible = !$this->formVisible;
    }


    public function deleteEducation($index) {
        unset($this->educations[$index]);
    }
}
