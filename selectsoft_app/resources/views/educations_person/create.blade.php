<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createEducation.css')}}">
    <title>Nueva educacion</title>
</head>
<body>
    <header class="header">
        @extends('layout.header')
    </header>
    @section('content')
    <main class="container">
        <form action="{{route('education.store')}}" method="post">
            @csrf
            <label for="school_name">Institucion educativa: </label><br>
            <input type="text" placeholder="institucion" name="shcool_name" value="{{old('shcool_name')}}"><br>
            @error('shcool_name')
                <span style="color:red;">{{$message}}</span><br>
            @enderror
            <label for="obtained_title">TItulo obtenido: </label><br>
            <input type="text" name="obtained_title" placeholder="Titulo obtenido" value="{{old('obtained_title')}}">
            @error('obtained_title')
                <span style="color:red;">{{$message}}</span><br>
            @enderror
            <label for="status_id">Estado: </label><br>
            <select name="study_status_id" id="">
                @foreach($statuses as $status)
                    <option value="{{$status->id}}">{{$status->study_status}}</option>
                @endforeach
            </select><br>
            <label for="studyLevel_id">Nivel de estudio</label><br>
            <select name="study_level_id" id="">
                @foreach($study_levels as $level)
                    <option value="{{$level->id}}">{{$level->study_level}}</option>
                @endforeach
            </select><br>
            <button>Añadir educacion</button>
        </form>
    </main>
    @endsection
</body>
</html>
