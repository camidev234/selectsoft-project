<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/editEducation.css')}}">
    <title>Document</title>
</head>
<body>
<header class="header">
    @extends('layout.header')
</header>
@section('content')
<main class="container">
    <form action="{{route('educations.update', ['education_person' => $education->id])}}" method="post" class="education-form">
        @csrf
        @method('PATCH')
        <label for="school_name" class="form-label">Institucion educativa:</label><br>
        <input type="text" id="school_name" placeholder="Institución" name="shcool_name" value="{{ old('school_name') ?? $education->shcool_name }}" class="form-input"><br>
        @error('school_name')
        <span class="error-message">{{$message}}</span><br>
        @enderror
        <label for="obtained_title" class="form-label">Título obtenido:</label><br>
        <input type="text" id="obtained_title" placeholder="Título obtenido" name="obtained_title" value="{{ old('obtained_title') ?? $education->obtained_title }}" class="form-input">
        @error('obtained_title')
        <span class="error-message">{{$message}}</span><br>
        @enderror
        <label for="status_id" class="form-label">Estado:</label><br>
        <select id="status_id" name="study_status_id" class="form-select">
            @foreach($statuses as $status)
            <option value="{{$status->id}}" {{ old('study_status_id') == $status->id || $education->study_status_id == $status->id ? 'selected' : '' }}>{{$status->study_status}}</option>
            @endforeach
        </select><br>
        <label for="studyLevel_id" class="form-label">Nivel de estudio</label><br>
        <select id="studyLevel_id" name="study_level_id" class="form-select">
            @foreach($study_levels as $level)
            <option value="{{$level->id}}" {{ old('study_level_id') == $level->id || $education->study_level_id == $level->id ? 'selected' : '' }}>{{$level->study_level}}</option>
            @endforeach
        </select><br>
        <button class="submit-button">Actualizar</button>
    </form>
</main>
@endsection
</body>
</html>