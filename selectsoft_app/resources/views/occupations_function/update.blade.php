<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createFunction.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir funcion</title>
</head>
<body>
    @extends('layout.header')
    @section('content')
        <form action="{{route('occupationFunction.update', ['occupation_function' => $function->id, 'occupation' => $occupation->id])}}" method="post" class="formContent">
            @csrf
            <label for="">Funcion: </label><br>
            <input type="text" placeholder="Funcion" name="function" value="{{ old('function') ?: $function->function }}">
            @error('function')
                <span style="color: red;">{{$message}}</span>
            @enderror
            <button>Editar Funcion</button>
        </form>
    @endsection
</body>
</html>
