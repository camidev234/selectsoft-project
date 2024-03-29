<div>
    <form method="post" action="{{route('requisition.store', ['company' => $company->id])}}" class="form">
        @csrf
        <article class="form-group">
            <label for="occupation_code">Cargo <span class="ast">*</span></label>
            <select name="charge_id" id="charge_id" class="form-control" wire:model.live="jobId">
                @forelse($jobs as $job)
                <option value="{{$job->id}}">{{$job->charge}}</option>
                @empty
                <option value="">No hay cargos en la empresa</option>
                @endforelse
            </select>
        </article>
        @error('charge_id')
        <span>{{$message}}</span>
        @enderror
        <article class="occupation">
            <span><strong>Ocupacion: </strong>{{!$this->occupation == null ? $this->occupation->occupation_code . ' - ' . $this->occupation->occupation_name : 'no hay cargo seleccionado'}}</span>
        </article>
        <article class="functions">
            <table>
                <thead>
                    <tr>
                        <th>Funciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($functions as $function)
                    <tr>
                        <td>{{$function->function}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>No hay funciones para el cargo</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </article>
        <article class="inputs">
            <div>
                <label for="">Numero de Vacantes <span class="ast">*</span></label>
                <input type="text" placeholder="Numero de vacantes" name="number_vacancies" value="{{old('number_vacancies')}}">
                @error('number_vacancies')
                <span style="color: red;">{{$message}}</span>
                @enderror
            </div>
            <div>
                <label for="">Meses de experiencia <span class="ast">*</span></label>
                <input type="text" placeholder="Meses de experiencia" name="required_experience" value="{{old('required_experience')}}">
                @error('required_experience')
                <span style="color: red;">{{$message}}</span>
                @enderror
            </div>
        </article>
        <article class="submit">
            <button class="btn-submit">Crear requisicion</button>
        </article>
    </form>
</div>