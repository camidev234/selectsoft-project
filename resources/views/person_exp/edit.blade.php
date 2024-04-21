<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/editExperiencie.css')}}">
    <title>Actualizar</title>
</head>

<body>
    <header class="header">
        @extends('layout.header')
    </header>
    @section('content')
    <main class="container">
        <form action="{{route('exp.update', ['person_experience' => $experience->id])}}" method="post" class="experience-form">
            @csrf
            @method('PATCH')
            <label for="company_experience" class="form-label">Empresa:</label><br>
            <input type="text" id="company_experience" placeholder="Empresa" name="company_experience" value="{{ old('company_experience') ?? $experience->company_experience }}" class="form-input"><br>
            @error('company_experience')
            <span class="error-message">{{$message}}</span><br>
            @enderror
            <label for="">Area de desempeño</label><br>
            <select name="work_area_id" id="">
                <option value="{{$experience->work_area_id}}">{{$experience->work_area->work_area}}</option>
                @foreach($work_areas as $work_area)
                @if($work_area->id == $experience->work_area_id)
                continue
                @endif
                <option value="{{$work_area->id}}">{{$work_area->work_area}}</option>
                @endforeach
            </select>
            <label for="">Cargo desempeñado</label><br>
            <input type="text" name="job" placeholder="Cargo" class="form-input" value="{{ old('job') ?? $experience->job }}">
            @error('job')
            <span class="error-message">{{$message}}</span><br>
            @enderror
            <section class="dates">
                <section class="startDate">
                    <label for="months_experience">Fecha de Inicio <span class="ast">*</span></label><br>
                    <input type="date" name="start_date" id="" value="{{ old('start_date') ?? $experience->start_date }}">
                    @error('start_date')
                    <span style="color: red;">{{$message}}</span><br>
                    @enderror
                </section>
                <section class="finishDate">
                    <label for="months_experience">Fecha de Fin <span class="ast">*</span></label><br>
                    <input type="date" name="finish_date" id="" value="{{ old('finish_date') ?? $experience->finish_date }}">
                    @error('finish_date')
                    <span style="color: red;">{{$message}}</span><br>
                    @enderror
                </section>
            </section>
            <label for="functions" class="form-label">Funciones Desempeñadas:</label><br>
            <textarea id="functions" name="functions" placeholder="Funciones desempeñadas" rows="5" class="form-textarea">{{ old('functions') ?? $experience->functions }}</textarea><br>
            @error('functions')
            <span class="error-message">{{$message}}</span><br>
            @enderror
            <button class="submit-button">Actualizar experiencia</button>
        </form>
    </main>
    @endsection
</body>

</html>