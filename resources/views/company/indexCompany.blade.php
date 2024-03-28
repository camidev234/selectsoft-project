<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexCompany.css')}}">
    <title>Empresas</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    @if(session()->has('message'))
    <p id="message" style="display: none;">{{ session('message') }}</p>
    <script>
        const mes = document.getElementById('message')
        alert(mes.textContent);
    </script>
    @endif
    <section class="container">
        @livewire('company-show')
        @livewireScripts
    </section>
    @endsection
</body>

</html>