<?php

namespace App\Livewire;

use App\Models\Charge;
use App\Models\Company;
use App\Models\Occupation;
use App\Models\Occupation_function;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RequisitonCreate extends Component
{

    public $jobId;
    public $occupation;

    public function mount()
    {
        $company = Auth::user()->recruiter->company_id;
        $jobs = Charge::where('company_id', $company)->get();
        if(!$jobs->isEmpty()) {
            $this->jobId = $jobs->first()->id;
        }
    }


    public function render()
    {

        $company = Auth::user()->recruiter->company_id;
        $companyToView = Company::find($company);

        $jobs = Charge::where('company_id', $company)->get();

        if($this->jobId !== null){
            $this->occupation = Occupation::find(Charge::find($this->jobId)->occupation_id);
        }

        $functions = Occupation_function::where('charge_id', $this->jobId)->get();
        // dd($this->jobId);s
        return view('livewire.requisiton-create', [
            'company' => $companyToView,
            'jobs' => $jobs,
            'role_id' => Auth::user()->role_id,
            'user' => Auth::user(),
            'functions' => $functions
        ]);
    }
}
