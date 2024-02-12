<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/vacancies.css')}}">
    <title>Vacantes</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="container">
        <section class="principal-title">
            <h2>Vacantes encontradas</h2>
        </section>
        <section class="vacants">
            @foreach($vacants as $vacant)
                <article class="vacant">
                    <h3>{{$vacant->vacancie_code}}</h3>
                    <h3>{{$vacant->charge->charge}}</h3>
                    <span>{{$vacant->company->business_name}}</span>
                    <span>Numero de vacantes: {{$vacant->number_vacancies}}</span>
                    <span>{{$vacant->city->city_name}}</span>
                    <form action="{{route('vacancie.showCandidate', ['vacancie' => $vacant->id])}}" class="formDetail" method="get">
                        <button>Ver Detalle</button>
                    </form>
                </article>
            @endforeach
        </section>
    </section>
    @endsection
</body>
</html>
