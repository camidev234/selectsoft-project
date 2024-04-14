<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createCompany.css')}}">
    <title>Crear Empresa</title>
</head>
<body>
    @extends('layout.header')
    @section('content')
    <livewire:create-company/>
    @livewireScripts
    @endsection
</body>
</html>
