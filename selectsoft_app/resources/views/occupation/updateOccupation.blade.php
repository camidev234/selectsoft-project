<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/updateOccupation.css')}}">
    <title>Edición de Ocupación</title>
</head>
<body>
    @extends('layout.header')
    @section('content')
    <section class="container-form">
    <form action="{{route('occupations.update',['id'=>$occupation->id])}}" method="post">
        @method('PUT')
        @csrf
        <h2>Actualizar Ocupacion</h2>
        <label for="occupation_code">Código de ocupación:</label>
        <input type="text" name="occupation_code" id="occupation_code" value="{{$occupation->occupation_code}}" >
        @error('occupation_code')
            <span style="color: red;">{{$message}}</span><br>
        @enderror
        <label for="occupation_name">Nombre de ocupación:</label>
        <input type="text" name="occupation_name" id="occupation_name" value="{{$occupation->occupation_name}}">
        @error('occupation_name')
            <span style="color: red;">{{$message}}</span><br>
        @enderror
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" value="{{$occupation->description}}">
        @error('description')
            <span style="color: red;">{{$message}}</span><br>
        @enderror
        <input type="submit" value="Guardar Cambios">
    </form>
    </section>
    @endsection
</body>
</html>
