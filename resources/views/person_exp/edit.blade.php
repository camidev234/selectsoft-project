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
            <label for="months_experience" class="form-label">Meses de Experiencia:</label><br>
            <input type="text" id="months_experience" name="months_experience" placeholder="Meses de experiencia" value="{{ old('months_experience') ?? $experience->months_experience }}" class="form-input">
            @error('months_experience')
            <span class="error-message">{{$message}}</span><br>
            @enderror
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