<div>
    <form class="form" wire:submit.prevent="storeRequisition">
        @csrf
        <article class="form-group">
            <label for="occupation_code">Cargo <span class="ast">*</span></label>
            <select name="charge_id" id="charge_id" class="form-control" wire:model.live="charge_id">
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
                <input type="text" placeholder="Numero de vacantes" name="number_vacancies" value="{{old('number_vacancies')}}" wire:model.live="number_vacancies">
                @error('number_vacancies')
                <span style="color: red;">{{$message}}</span>
                @enderror
            </div>
            <div>
                <label for="">Meses de experiencia <span class="ast">*</span></label>
                <input type="text" placeholder="Meses de experiencia" name="required_experience" value="{{old('required_experience')}}" wire:model.live="required_experience">
                @error('required_experience')
                <span style="color: red;">{{$message}}</span>
                @enderror
            </div>
        </article>
        <section class="info">
            <h4>Educacion Requerida</h4>
        </section>
        <section class="educations">
            <table>
                <thead>
                    <tr>
                        <th>Nivel</th>
                        <th>Estado</th>
                        <th>Titulo</th>
                        <th>Puntos</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($educations as $education)
                    <tr>
                        <td>{{$education['study_level']}}</td>
                        <td>{{$education['study_status']}}</td>
                        <td>{{$education['study_name']}}</td>
                        <td>{{$education['points']}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>No hay eduaciones agregadas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
        <section class="formComponent">
            <livewire:create-educations-req/>
        </section>
        <article class="submit">
            <button class="btn-submit">Crear requisicion</button>
        </article>
    </form>
</script>
</div>