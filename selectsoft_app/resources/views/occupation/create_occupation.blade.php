<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createOccupation.css')}}">
    <title>Formulario de Ocupación</title>
</head>
<body>
    @extends('layout.header')
    @section('content')
    <form method="post" action="{{route('occupations.store')}}" class="form">
        @csrf
        <label for="occupation_code">Código de ocupación:</label>
        <input type="text" name="occupation_code" id="occupation_code" value="{{old('occupation_code')}}">
        @error('occupation_code')
            <span style="color: red;">{{$message}}</span><br>
        @enderror
        <label for="occupation_name">Nombre de ocupación:</label>
        <input type="text" name="occupation_name" id="occupation_name" value="{{old('occupation_name')}}">
        @error('occupation_name')
            <span style="color: red;">{{$message}}</span><br>
        @enderror
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" value="{{old('description')}}">
        @error('description')
            <span style="color: red;">{{$message}}</span><br>
        @enderror
        <input type="submit" value="Crear Ocupacion">
    </form>
    @endsection
</body>
</html>
