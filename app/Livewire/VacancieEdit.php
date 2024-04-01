<?php

namespace App\Livewire;

use App\Models\Requisiton;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VacancieEdit extends Component
{

    public $vacancie;

    public function render()
    {

        $company = Auth::user()->recruiter->company_id;
        $requisitions = Requisiton::where('company_id', $company->id)->where('requisiton_id', '!=', $this->vacancie->requisiton_id)->get();

        return view('livewire.vacancie-edit');
    }
}
