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
    <form method="post" action="{{route('save_occupation')}}" class="form">
        @csrf
        <label for="occupation_code">Código de ocupación:</label>
        <input type="text" name="occupation_code" id="occupation_code">
        <label for="occupation_name">Nombre de ocupación:</label>
        <input type="text" name="occupation_name" id="occupation_name">
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description">
        <input type="submit" value="Enviar">
    </form>
    @endsection
</body>
</html>
