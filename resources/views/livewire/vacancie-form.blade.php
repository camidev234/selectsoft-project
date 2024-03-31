<div>
    <form action="{{route('vacancies.store', ['company' => $company->id])}}" method="POST">
        @csrf
        <label for="">Codigo de la vacante <span class="ast">*</span></label>
        <input type="text" placeholder="Codigo" name="vacancie_code" value="{{old('vacancie_code')}}" wire:model.live="vacancie_code"><br>
        @error('vacancie_code')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <label for="">Habilidades: <span class="ast">*</span></label><br>
        <textarea name="skills" id="" cols="30" rows="15" wire:model.live="skills">{{old('skills')}}</textarea><br>
        @error('skills')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <label for="">Rango Salarial <span class="ast">*</span></label><br>
        <input type="text" name="salary_range" id="" placeholder="Rango salarial" value="{{old('salary_range')}}" wire:model.live="salary_range"><br>
        @error('salary_range')
        <span style="color: red;">{{$message}}</span><br><b></b>
        @enderror
        <label for="">Requisicion <span class="ast">*</span></label><br>
        <select name="requisiton_id" id="" wire:model.live="requisiton_id">
            @forelse($requisitions as $requisition)
            <option value="{{$requisition->id}}">{{$requisition->charge->charge}}</option>
            @empty
            <option value="">No hay requisiciones creadas aun</option>
            @endforelse
        </select><br>
        <label for="">Horario <span class="ast">*</span></label><br>
        <input type="text" placeholder="Horario" name="schedule" value="{{old('schedule')}}" wire:model.live="schedule"><br>
        @error('schedule')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <label for="">Jornada Laboral <span class="ast">*</span></label><br>
        <select name="work_day_id" id="" wire:model.live="work_day_id">
            @foreach($days as $day)
            <option value="{{$day->id}}">{{$day->working_day}}</option>
            @endforeach
        </select><br>
        <label for="">Tipo de salario <span class="ast">*</span></label><br>
        <select name="salaries_type_id" id="" wire:model.live="salaries_type_id">
            @foreach($salaries as $salarie)
            <option value="{{$salarie->id}}">{{$salarie->salary_type}}</option>
            @endforeach
        </select><br>
        <label for="">Persona Solicitante <span class="ast">*</span></label><br>
        <input type="text" name="applicant_person" placeholder="Persona Solcitante" value="{{old('applicant_person')}}" wire:model.live="applicant_person"><br>
        @error('applicant_person')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <label for="">Departamento</label><br>
        <select name="departament_id" id="" wire:model.live="departament_id" wire:model.live="departament_id">
            @foreach($departaments as $departament)
            <option value="{{$departament->id}}">{{$departament->departament_name}}</option>
            @endforeach
        </select><br>
        <label for="">Ciudad <span class="ast">*</span></label><br>
        <select name="city_id" id="" wire:model.live="city_id">
            @foreach($cities as $city)
            <option value="{{$city->id}}">{{$city->city_name}}</option>
            @endforeach
        </select><br>
        <label for="">Anotaciones <span class="ast">*</span></label><br>
        <textarea name="annotations" id="" cols="30" rows="15" wire:model.live="annotations">{{old('annotations')}}</textarea><br>
        @error('annotations')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <button>Crear Vacante</button>
    </form>
</div>