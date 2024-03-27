<?php

namespace App\Livewire;

use App\Models\Instructor;
use Livewire\Component;

class InstructorsShow extends Component
{

    public $queryWord = "";

    public function render()
    {

        $instructors = Instructor::whereHas('user', function ($query) {
            $query->where('number_document', 'like', '%' . $this->queryWord . '%');
        })->get();

        return view('livewire.instructors-show', ['instructors' => $instructors]);
    }
}
