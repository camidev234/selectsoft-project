<?php

namespace App\Livewire;

use App\Models\Recruiter;
use Livewire\Component;

class RecruitersShow extends Component
{

    public $queryWord = "";

    public function render()
    {

        $recruiters = Recruiter::whereHas('user', function ($query) {
            $query->where('number_document', 'like', '%' . $this->queryWord . '%');
        })->get();

        return view('livewire.recruiters-show', ['recruiters' => $recruiters]);
    }
}
