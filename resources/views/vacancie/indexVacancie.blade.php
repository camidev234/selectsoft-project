<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Vacantes</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <div class="container">
        @if(session()->has('message'))
        <p id="message" style="display: none;">{{ session('message') }}</p>
        <script>
            const mes = document.getElementById('message')
            alert(mes.textContent);
        </script>
        @endif
        <section class="titlePage">
            <article class="title">
                <h2>Listado De Vacantes</h2>
            </article>
            <article class="btns">
                <article class="descBtns oneBt">
                    <div>
                        <i class="bi bi-ban bt"></i>
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <span>Cerrar /</span>
                    <span>Abrir</span>
                </article>
                <article class="descBtns twBt">
                    <div>
                        <i class="bi bi-pencil-fill bt"></i>
                    </div>
                    <span>Actualizar</span>
                </article>
                <article class="descBtns thBt">
                    <div>
                        <i class="bi bi-eye-fill bt"></i>
                    </div>
                    <span>Detalles</span>
                </article>
            </article>
        </section>
        @livewire('vacancie-show')
        @livewireScripts
    </div>

    <div class="create">
        <a href="{{ route('vacancies.create') }}">Crear Vacante</a>
    </div>
    @endsection
</body>

</html>