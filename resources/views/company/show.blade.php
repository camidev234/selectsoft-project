    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/showCompany.css')}}">
        <title>Informacion Empresa</title>
    </head>

    <body>
        @extends('layout.header')
        @section('content')
        <section class="container">
            <section class="headerCont">
                <h2>Empresa: {{$company->business_name}}</h2>
            </section><br>
            <section class="info">
                <h4>Nit: {{$company->nit}}</h4>
                <h4>Telefono: {{$company->phone}}</h4>
                <h4>Direccion: {{$company->address}}</h4>
                <h4>Departamento: {{$company->departament->departament_name}}</h4>
                <h4>Ciudad: {{ $company->city->city_name }}</h4>
                <h4>Email: {{$company->email}}</h4>
                <h4>Reclutadores: {{$recruiters}}</h4>
                <h4>Seleccionadores: {{$selectors}}</h4>
            </section><br>
            <section class="back">
                @if($role_id == 3)
                <a href="{{route('recruiter.index')}}">Volver</a>
                @elseif($role_id == 2)
                <a href="{{route('selector.index')}}">Volver</a>
                @endif
            </section>
        </section>
        @endsection
    </body>

    </html>
