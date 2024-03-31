<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createVacant.css')}}">
    <title>Crear vacante</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="createVacant">
        <h2>Crear vacante</h2>
    </section>
    <section class="content-form">
        <livewire:vacancie-form/>
        @livewireScripts
    </section>
    @endsection
</body>

</html>
