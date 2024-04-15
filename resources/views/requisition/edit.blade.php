<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Requisicion</title>
    <link rel="stylesheet" href="{{asset('css/createReq.css')}}">
</head>

<body>
    @extends('layout.header')
    @section('content')
    <livewire:edit-requisiton :requisiton="$requisiton"/>
    @endsection
    @livewireScripts
</body>

</html>