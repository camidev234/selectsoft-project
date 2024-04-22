<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/showExperience.css')}}">
    <title>Detalle Educacion</title>
</head>

<body>
    @extends('layout.header')
    @section('content')

    <section class="content">
        <article class="company">
            <h4>Empresa</h4>
            <p>{{$experience->company_experience}}</p>
        </article>
        <article class="work_area">
            <h4>Area de desempeño</h4>
            <p>{{$experience->work_area->work_area}}</p>
        </article>
        <article class="job">
            <h4>Cargo</h4>
            <p>{{$experience->job}}</p>
        </article>
        <article class="experience">
            <h4>Duracion</h4>
            <p>Desde {{$experience->start_date}}</p>
            <p>Hasta {{$experience->finish_date}}</p>
        </article>
        <article class="functions">
            <h4>Funciones desempeñadas</h4>
            <p>{{$experience->functions}}</p>
        </article>
        <article class="back">
        @if($role_id === 1)
            <form action="{{route('exp.index')}}" method="get">
                <button><i class="bi bi-arrow-return-left"></i> Volver al listado</button>
            </form>
        </article>
        @endif
    </section>

    @endsection
</body>

</html>