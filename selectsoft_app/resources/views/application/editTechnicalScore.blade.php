<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/formScore.css')}}">
    <title>Document</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="container">
        <form action="{{route('selector.updateTechnicalScore', ['application' => $application->id])}}" method="post">
            @csrf
            @method('PATCH')
            <label for="">Desea: </label>
            <select name="opperation" id="">
                <option value="1">Sumar Puntos</option>
                <option value="2">Restar Puntos</option>
            </select><br>
            <label for="">Nueva puntuacion para la entrevista tecnica: </label><br>
            <input type="text" placeholder="puntuacion" value="{{$application->technical_test_score}}" name="new_score"><br>
            @error('new_score')
                <span>{{$message}}</span>
            @enderror
            <button>Guardar</button>
        </form>
    </section>
    @endsection
</body>

</html>
