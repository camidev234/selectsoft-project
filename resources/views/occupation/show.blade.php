<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/showOccupation.css')}}">
    <title>Ocupacion: {{$occupation->occupation_code}}</title>
</head>
<body>
    @extends('layout.header')
    @section('content')
    <section class="container">
        <section class="occupationInfo">
            <h2>Codigo: {{$occupation->occupation_code}}</h2><br>
            <p><strong>Ocupacion: </strong>{{$occupation->occupation_name}}</p>
            <p><strong>Descripcion: </strong>{{$occupation->description}}</p>
        </section>
    </section>
    @endsection
</body>
</html>
