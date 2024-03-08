<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/createReq.css')}}"> <!-- Enlazar archivo de estilos externo -->
</head>

<body>
    @extends('layout.header')
    @section('content')
    <form method="post" action="{{route('requisition.store')}}" class="form">
        @csrf
        <div class="form-group">
            <label for="occupation_code">Cargo:</label>
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
            <label for="job_description">Descripcion del cargo:</label>
            <textarea name="job_description" id="job_description" class="form-control" cols="30" rows="10" placeholder="Descripcion del cargo"></textarea>
        </div>
        @error('job_description')
        <span>{{$message}}</span>
        @enderror
        <div class="form-group">
            <label for="justification">Justificacion:</label>
            <textarea name="justification" id="justification" class="form-control" cols="30" rows="10" placeholder="Justificacion"></textarea>
        </div>
        @error('justification')
        <span>{{$message}}</span>
        @enderror
        <div class="form-group">
            <label for="ideal_candidate">Candidato Ideal:</label>
            <textarea name="ideal_candidate" id="ideal_candidate" class="form-control" cols="30" rows="10" placeholder="Candidato Ideal"></textarea>
        </div>
        @error('ideal_candidate')
        <span>{{$message}}</span>
        @enderror
        <div class="form-group">
            <label for="mission_charge">Mision del cargo:</label>
            <textarea name="mission_charge" id="mission_charge" class="form-control" cols="30" rows="10" placeholder="Mision del cargo"></textarea>
        </div>
        @error('mission_charge')
        <span>{{$message}}</span>
        @enderror
        <div class="form-group">
            <label for="responsibilities">Responsabilidades:</label>
            <textarea name="responsabilities" id="responsibilities" class="form-control" cols="30" rows="10" placeholder="Responsabilidades"></textarea>
        </div>
        @error('responsabilities')
        <span>{{$message}}</span>
        @enderror
        <div class="form-group">
            <label for="candidate_description">Descripcion del candidato:</label>
            <textarea name="candidate_description" id="candidate_description" class="form-control" cols="30" rows="10" placeholder="Descripcion del candidato"></textarea>
        </div>
        @error('candidate_description')
        <span>{{$message}}</span>
        @enderror
        <div class="form-group">
            <label for="candidate_talents">Talentos del candidato:</label>
            <textarea name="candidate_talents" id="candidate_talents" class="form-control" cols="30" rows="10" placeholder="Talentos del candidato"></textarea>
        </div>
        @error('candidate_talents')
        <span>{{$message}}</span>
        @enderror
        <div class="form-group">
            <label for="selection_criteria">Criterios de seleccion:</label>
            <textarea name="selection_criteria" id="selection_criteria" class="form-control" cols="30" rows="10" placeholder="Criterios de seleccion"></textarea>
        </div>
        @error('selection_criteria')
        <span>{{$message}}</span>
        @enderror
        <div class="form-group">
            <input type="submit" value="Crear Requisicion" class="btn-submit">
        </div>
    </form>
    @endsection
</body>

</html>