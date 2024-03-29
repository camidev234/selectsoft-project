<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/createReq.css')}}">
</head>

<body>
    @extends('layout.header')
    @section('content')
    <form method="post" action="{{route('requisition.store', ['company' => $company->id])}}" class="form">
        @csrf
        <div class="form-group">
            <label for="occupation_code">Cargo <span class="ast">*</span></label>
            <select name="charge_id" id="charge_id" class="form-control">
                @forelse($jobs as $job)
                <option value="{{$job->id}}">{{$job->charge}}</option>
                @empty
                <option value="">No hay cargos en la empresa</option>
                @endforelse
            </select>
        </div>
        @error('charge_id')
        <span>{{$message}}</span>
        @enderror
        <div class="form-group">
            <label for="job_description">Descripcion del cargo <span class="ast">*</span></label>
            <textarea name="job_description" id="job_description" class="form-control" cols="30" rows="10" placeholder="Descripcion del cargo">{{old('job_description')}}</textarea>
        </div>
        @error('job_description')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <div class="form-group">
            <label for="justification">Justificacion <span class="ast">*</span></label>
            <textarea name="justification" id="justification" class="form-control" cols="30" rows="10" placeholder="Justificacion">{{old('justification')}}</textarea>
        </div>
        @error('justification')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <div class="form-group">
            <label for="ideal_candidate">Candidato Ideal <span class="ast">*</span></label>
            <textarea name="ideal_candidate" id="ideal_candidate" class="form-control" cols="30" rows="10" placeholder="Candidato Ideal">{{old('ideal_candidate')}}</textarea>
        </div>
        @error('ideal_candidate')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <div class="form-group">
            <label for="mission_charge">Mision del cargo <span class="ast">*</span></label>
            <textarea name="mission_charge" id="mission_charge" class="form-control" cols="30" rows="10" placeholder="Mision del cargo">{{old('mission_charge')}}</textarea>
        </div>
        @error('mission_charge')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <div class="form-group">
            <label for="responsibilities">Responsabilidades <span class="ast">*</span></label>
            <textarea name="responsabilities" id="responsibilities" class="form-control" cols="30" rows="10" placeholder="Responsabilidades">{{old('responsabilities')}}</textarea>
        </div>
        @error('responsabilities')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <div class="form-group">
            <label for="candidate_description">Descripcion del candidato <span class="ast">*</span></label>
            <textarea name="candidate_description" id="candidate_description" class="form-control" cols="30" rows="10" placeholder="Descripcion del candidato">{{old('candidate_description')}}</textarea>
        </div>
        @error('candidate_description')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <div class="form-group">
            <label for="candidate_talents">Talentos del candidato <span class="ast">*</span></label>
            <textarea name="candidate_talents" id="candidate_talents" class="form-control" cols="30" rows="10" placeholder="Talentos del candidato">{{old('candidate_talents')}}</textarea>
        </div>
        @error('candidate_talents')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <div class="form-group">
            <label for="selection_criteria">Criterios de seleccion <span class="ast">*</span></label>
            <textarea name="selection_criteria" id="selection_criteria" class="form-control" cols="30" rows="10" placeholder="Criterios de seleccion">{{old('selection_criteria')}}</textarea>
        </div>
        @error('selection_criteria')
        <span style="color: red;">{{$message}}</span><br><br>
        @enderror
        <div class="form-group">
            <input type="submit" value="Crear Requisicion" class="btn-submit">
        </div>
    </form>
    @endsection
</body>

</html>