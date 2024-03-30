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
        ], [
            'study_name.required' => 'El nombre del estudio es obligatorio.',
            'study_name.max' => 'El nombre del estudio no puede tener más de :max caracteres.',
            'study_name.string' => 'El nombre del estudio debe ser una cadena de caracteres.',
            'points.required' => 'Los puntos son obligatorios.',
            'points.integer' => 'Los puntos deben ser un número entero.',
            'points.min' => 'Los puntos deben ser al menos :min.',
            'points.digits_between' => 'Los puntos deben tener entre :min y :max dígitos.'
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
