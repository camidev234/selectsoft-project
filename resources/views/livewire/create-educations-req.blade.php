<div>
    <article class="selects">
        <label for="">Nivel de estudio</label>
        <select name="level" id="" wire:model.live="study_level_id">
            @foreach($studiesLevels as $study_level)
            <option value="{{$study_level->id}}">{{$study_level->study_level}}</option>
            @endforeach
        </select>
        <label for="">Estado del estudio</label>
        <select name="states" id="" wire:model.live="study_status_id">
            @foreach($studiesStates as $studieState)
            <option value="{{$studieState->id}}">{{$studieState->study_status}}</option>
            @endforeach
        </select>
    </article>
    <article class="inputs-two">
        <article class="inp">
            <label for="">Titulo Obtenido <span class="ast">*</span></label>
            <input type="text" placeholder="Titulo" name="study_name" wire:model.live="study_name">
        </article>
        <article class="inp">
            <label for="">Puntos Asignados <span class="ast">*</span></label>
            <input type="number" placeholder="puntos" name="points" wire:model.live="points">
        </article>
    </article>
    <article class="btnAdd">
        <button wire:click.prevent="addEducation">Agregar eduacion</button>
    </article>
</div>