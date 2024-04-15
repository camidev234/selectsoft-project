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
        <form action="{{route('chargeFunction.store', ['charge' => $charge->id])}}" method="post" class="formContent">
            @csrf
            <label for="">Funcion: </label><br>
            <textarea placeholder="Funcion" name="function" cols="30" rows="10">{{old('function')}}</textarea>
            @error('function')
                <span style="color: red;">{{$message}}</span>
            @enderror
            <button>Añadir Funcion</button>
        </form>
    @endsection
</body>
</html>
