<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/adminPanel.css')}}">
    <title>Panel de administrador</title>
</head>

<body>
    @extends('layout.headerAdmin')
    @section('content')
    <section class="sidebar">
        <a href="{{route('instructor.index')}}">
            <article class="option-admin modi">
                <i class="bi bi-person-circle"></i>
                <h3 style="color: white;">Ver candidatos</h3>
            </article>
        </a>

        <a href="{{route('instructor.recruiters')}}">
            <article class="option-admin">
                <i class="bi bi-person-lines-fill"></i>
                <h3 style="color: white;">Ver Reclutadores</h3>
            </article>
        </a>

        <a href="{{route('instructor.selectors')}}">
            <article class="option-admin">
                <i class="bi bi-card-checklist"></i>
                <h3 style="color: white;">Ver Seleccionadores</h3>
            </article>
        </a>

        @if($user->id === 1)
        <a href="{{route('instructor.instructors')}}">
            <article class="option-admin" style="background-color: #38445e;border-right: 7px solid #2193b0;">
                <i class="bi bi-gear-fill"></i>
                <h3>Ver Administradores</h3>
            </article>
        </a>
        @endif
    </section>

    <section class="view-info">
        @livewire('instructors-show')
        @livewireScripts
    </section>
    @endsection
</body>

</html>