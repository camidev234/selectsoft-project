<?php

namespace App\Livewire;

use App\Models\Candidate;
use Livewire\Component;

class CandidatesShow extends Component
{

    public $queryWord = "";

    public function render()
    {
        $candidates = Candidate::whereHas('user', function ($query) {
            $query->where('number_document', 'like', '%' . $this->queryWord . '%');
        })->get();

        return view('livewire.candidates-show', ['candidates' => $candidates]);
    }
}
