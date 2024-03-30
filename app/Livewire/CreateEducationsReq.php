<?php

namespace App\Livewire;

use App\Models\study_level;
use App\Models\study_status;
use Livewire\Component;

class CreateEducationsReq extends Component
{

    public $study_level_id = 1;
    public $study_status_id = 1;
    public $study_name;
    public $points;

    public function render()
    {

        $studiesLevels = study_level::all();
        $studiesState = study_status::all();

        return view('livewire.create-educations-req', [
            'studiesLevels' => $studiesLevels,
            'studiesStates' => $studiesState
        ]);
    }

    public function addEducation() {

        $this->validate([
            'study_name' => 'required|max:80|string',
            'points' => 'required|integer|min:1|digits_between:1,3'
        ]);

        $education = [
            'study_level_id' => $this->study_level_id,
            'study_status_id' => $this->study_status_id,
            'study_name' => $this->study_name,
            'points' => $this->points,
            'study_level' => study_level::find($this->study_level_id)->study_level,
            'study_status' => study_status::find($this->study_status_id)->study_status
        ];

        $this->dispatch('handleAddEducation', $education);

        $this->reset(['study_level_id', 'study_status_id', 'study_name', 'points']);
    }
}
