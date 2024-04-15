<div>
    <form wire:submit.prevent="updateVacancy">
    @csrf
    @method('PATCH')
    <label for="">Codigo de la vacante: </label>
    <input type="text" placeholder="Codigo" name="vacancie_code" value="{{ old('vacancie_code') ?: $vacancie->vacancie_code }}" wire:model="vacancie_code"><br>
    @error('vacancie_code')
    <span style="color: red;">{{$message}}</span><br><br>
    @enderror
    <label for="">Habilidades: </label><br>
    <textarea name="skills" id="" cols="30" rows="15" wire:model.live="skills">{{ old('skills') ?: $vacancie->skills }}</textarea><br>
    @error('skills')
    <span style="color: red;">{{$message}}</span><br><br>
    @enderror
    <label for="">Rango Salarial</label><br>
    <input type="number" name="salary_range" id="" placeholder="Rango salarial" value="{{ old('salary_range') ?: $vacancie->salary_range }}" wire:model.live="salary_range"><br>
    @error('salary_range')
    <span style="color: red;">{{$message}}</span><br><b></b>
    @enderror
    <label for="">Requisicion: </label><br>
    <select name="requisiton_id" id="" wire:model.live="requisiton_id">
        <option value="{{$vacancie->requisiton_id}}">{{$vacancie->requisiton->charge->charge}}</option>
        @forelse($requisitions as $requisition)
        <option value="{{$requisition->id}}">{{$requisition->charge->charge}}</option>
        @empty
        <option value="">No hay requisiciones creadas aun</option>
        @endforelse
    </select><br>
    <label for="">Horario: </label><br>
    <input type="text" placeholder="Horario" name="schedule" value="{{ old('schedule') ?: $vacancie->schedule }}" wire:model.live="schedule"><br>
    @error('schedule')
    <span style="color: red;">{{$message}}</span><br><br>
    @enderror
    <label for="">Jornada Laboral: </label><br>
    <select name="work_day_id" id="" wire:model.live="work_day_id">
        @foreach($days as $day)
        <option value="{{$day->id}}">{{$day->working_day}}</option>
        @endforeach
    </select><br>
    <label for="">Tipo de salario: </label><br>
    <select name="salaries_type_id" id="" wire:model="salaries_type_id">
        @foreach($salaries as $salarie)
        <option value="{{$salarie->id}}">{{$salarie->salary_type}}</option>
        @endforeach
    </select><br>
    <label for="">Persona Solicitante: </label><br>
    <input type="text" name="applicant_person" placeholder="Persona Solcitante" value="" wire:model="applicant_person"><br>
    @error('applicant_person')
    <span style="color: red;">{{$message}}</span><br><br>
    @enderror
    <label for="">Departamento </label><br>
    <select name="departament_id" id="" wire:model.live="departament_id" wire:change="onChangeDepartament($event.target.value)">
        @foreach($departaments as $departament)
        <option value="{{$departament->id}}">{{$departament->departament_name}}</option>
        @endforeach
    </select><br>
    <label for="">Ciudad </label><br>
    <select name="city_id" id="" wire:model.live="city_id">
        @foreach($cities as $city)
        <option value="{{$city->id}}">{{$city->city_name}}</option>
        @endforeach
    </select><br>   
    <label for="">Anotaciones: </label><br>
    <textarea name="annotations" id="" cols="30" rows="15" wire:model.live="annotations">{{ old('annotations') ?: $vacancie->annotations }}</textarea><br>
    @error('annotations')
    <span style="color: red;">{{$message}}</span><br><br>
    @enderror
    <button>Actualizar Vacante</button>
    </form>
</div>