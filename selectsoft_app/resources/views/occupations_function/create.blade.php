<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir funcion</title>
</head>
<body>
    @extends('layout.header')
    @section('content')
        <form action="{{route('occupationFunction.store', ['occupation' => $occupation->id])}}" method="post">
            @csrf
            <label for="">Funcion: </label><br>
            <input type="text" placeholder="Funcion" name="function">
            <button>Añadir Funcion</button>
        </form>
    @endsection
</body>
</html>