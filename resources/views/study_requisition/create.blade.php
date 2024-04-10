<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/addVacantEducation.css')}}">
    <title>Agregar estudio a la requisicion</title>
</head>
<body>
    @extends('layout.header')
    @section('content')
        <section class="container">
            <form action="{{route('studyRequisition.store', ['requisiton' => $requisiton->id])}}" method="post">
                @csrf
                <label for="">Nivel de estudio</label><br>
                <select name="study_level_id" id="">
                    @foreach($levels as $level)
                        <option value="{{$level->id}}">{{$level->study_level}}</option>
                    @endforeach
                </select><br>
                <label for="">Estado</label><br>
                <select name="study_status_id" id="">
                    @foreach($statuses as $status)
                        <option value="{{$status->id}}">{{$status->study_status}}</option>
                    @endforeach
                </select><br>
                <label for="">Titulo </label><br>
                <input type="text" name="study_name" placeholder="Profesion" value="{{old('study_name')}}"><br>
                @error('study_name')
                    <span style="color: red;">{{$message}}</span><br>
                @enderror
                <label for="">Puntuacion asignada </label><br>
                <input type="number" name="points" id="" placeholder="Puntos" value="{{old('points')}}"><br>
                @error('points')
                    <span style="color: red;">{{$message}}</span><br>
                @enderror
                <button>Agregar educacion</button>
            </form>
        </section>
    @endsection
</body>
</html>
