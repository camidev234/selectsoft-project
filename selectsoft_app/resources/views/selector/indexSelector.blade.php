<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexSelector.css')}}">
    <title>Document</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="container">
        <section class="companyInfo">
            <section class="info">
                <h2>Empresa: {{$selector->company->business_name}}</h2>
                <form action="{{route('company.show', ['company' => $company->id])}}" method="get">
                    <button>Ver detalles</button>
                </form>
            </section>
        </section>
        <section class="disassociate">
            <form action="{{route('recruiter.disassociate', ['company' => $company->id])}}" method="post">
                @csrf
                <button>Salir de la empresa</button>
            </form>
        </section>
        <section class="principal-content">
            <section class="contentTitle">
                <article>
                    <h3>Procesos de seleccion De la empresa</h3>
                </article>
                <article class="appActions">
                    <span><i class="bi bi-eye-fill"></i> Ver Postulados</span>
                </article>
            </section>
            <section class="applications">
                <article class="application">
                    <div class="vc">
                        <section class="vacantCode">
                            <h4>Codigo</h4>
                        </section>
                        <section class="figure"></section>
                    </div>
                    <div class="vacantJob">
                        <span>Cargo</span>
                    </div>
                    <div class="vacantCreated">
                        <span>Creada: </span>
                    </div>
                    <div class="actions">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                </article>
            </section>
        </section>
    </section>
    @endsection
</body>

</html>
