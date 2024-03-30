<?php

namespace App\Livewire;

use App\Http\Requests\RequisitionRequest;
use App\Models\Charge;
use App\Models\Company;
use App\Models\Occupation;
use App\Models\Occupation_function;
use App\Models\Requisiton;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use Livewire\Attributes\On;
use Livewire\Attributes\Session as AttributesSession;
use Livewire\Component;

class RequisitonCreate extends Component
{

    public $charge_id;
    public $occupation;
    public $number_vacancies;
    public $required_experience;

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
        ]);
    
        // Crea una nueva requisición con los datos validados
        $requisition = new Requisiton();
        $requisition->charge_id = $validatedData['charge_id'];
        $requisition->required_experience = $validatedData['required_experience'];
        $requisition->number_vacancies = $validatedData['number_vacancies'];
        $requisition->company_id = $company->id;
        $requisition->save();

        $this->reset();
    }
}
