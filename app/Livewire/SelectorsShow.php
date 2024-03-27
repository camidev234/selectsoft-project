<?php

namespace App\Livewire;

use App\Models\Selector;
use Livewire\Component;

class SelectorsShow extends Component
{

    public $queryWord = "";

    public function render()
    {

        $selectors = Selector::whereHas('user', function ($query) {
            $query->where('number_document', 'like', '%' . $this->queryWord . '%');
        })->get();

        return view('livewire.selectors-show', ['selectors' => $selectors]);
    }
}
