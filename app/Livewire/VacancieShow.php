<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Vacancie;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VacancieShow extends Component
{

    public $queryWord = "";

    public function render()
    {

        $company = Auth::user()->recruiter->company_id;
        $companyObject = Company::find($company);

        $vacants = Vacancie::where('company_id', $company)
            ->whereHas('requisiton', function ($query) {
                $query->whereHas('charge', function ($subQuery) {
                    $subQuery->where('charge', 'like', '%' . $this->queryWord . '%');
                });
            })
            ->get();

        return view('livewire.vacancie-show', ['vacants' => $vacants, 'company' => $companyObject]);
    }
}
