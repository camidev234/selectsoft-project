<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyShow extends Component
{

    public $queryWord = "";

    public function render()
    {

        $role_id = Auth::user()->role_id;

        $allCompanies = Company::where('nit', 'like', '%' . $this->queryWord . '%')->get();

        return view('livewire.company-show', ['allCompanies' => $allCompanies, 'role_id' => $role_id]);
    }
}
