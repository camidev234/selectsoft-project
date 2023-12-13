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
    <div class="modalOverlay"></div>
        <section class="companyInfo">
            <section class="info">
                <h2>Empresa: {{$selector->company->business_name}}</h2>
                <form action="{{route('company.show', ['company' => $company->id])}}" method="get">
                    <button>Ver detalles</button>
                </form>
            </section>
        </section>
        <section class="disassociate">
            <form action="{{route('selector.dissasociate', ['company' => $company->id])}}" method="post">
                @csrf
                <button>Salir de la empresa</button>
            </form>
        </section>
        <section class="principal-content">
            <section class="contentTitle">
                <article>
                    <h3>Procesos de seleccion De la empresa</h3>
                </article>
            </section>
            <section class="applications">
                @forelse($vacants as $vacant)
                <article class="application">
                    <div class="vc">
                        <section class="vacantCode">
                            <a href="" id="openModalButton">
                                <h4>Vacante: {{$vacant->vacancie_code}}</h4>
                            </a>
                        </section>
                        <section class="figure"></section>
                    </div>
                    <section class="modalWindow">
                        <i class="bi bi-x-lg" id="close"></i>
                        <section class="title-page">
                            <h2>Informacion de la vacante: {{$vacant->vacancie_code}}</h2>
                        </section>
                        <section class="card_info">
                            <section class="general">
                                <article class="generalTitle">
                                    <h3>Informacion General</h3>
                                </article>
                                <section class="generalInfo">
                                    <article class="charge">
                                        <h3>Cargo: </h3><br>
                                        <span>{{$vacant->charge->charge}}</span>
                                    </article>
                                </section>
                                <section class="otherGeneralInfo">
                                    <article class="firstGeneral">
                                        <p><strong>Experiencia: </strong>{{$vacant->required_experience}} meses</p>
                                        <p><strong>Vacantes: </strong>{{$vacant->number_vacancies}}</p>
                                        <p><strong>Salario: </strong>${{$vacant->salary_range}}</p>
                                    </article>
                                    <article class="secondGeneral">
                                        <p><strong>Horario de trabajo: </strong>{{$vacant->schedule}}</p>
                                        <p><strong>Tipo de jornada: </strong>{{$vacant->work_day->working_day}}</p>
                                        <p><strong>Tipo de salario: </strong>{{$vacant->salaries_type->salary_type}}</p>
                                        <p><strong>Persona Solicitante: </strong>{{$vacant->applicant_person}}</p>
                                    </article>
                                </section>
                                <section class="generalTitle">
                                    <h3>Ubicacion</h3>
                                </section>
                                <section class="locationInfo">
                                    <article>
                                        <p><strong>Pais: </strong>{{$vacant->country->country_name}}</p>
                                    </article>
                                    <article>
                                        <p><strong>Ciudad: </strong>{{$vacant->city->city_name}}</p>
                                    </article>
                                </section>
                                <section class="generalTitle">
                                    <h3>Estado de la vacante: </h3>
                                </section>
                                <section class="status">
                                    <article>
                                        <p><strong>Estado de la vacante: </strong>
                                            @if($vacant->is_active)
                                            Activa
                                            @else
                                            Inactiva
                                            @endif
                                        </p>
                                    </article>
                                </section>
                                <section class="generalTitle">
                                    <h3>Conocimientos </h3>
                                </section>
                                <section class="skills">
                                    <article>
                                        <br>
                                        <h4>Habilidades</h4>
                                    </article>
                                    <article>
                                        <br>
                                        <p>{{$vacant->skills}}</p>
                                    </article>
                                </section>
                            </section>
                        </section>
                    </section>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var modal = document.querySelector('.modalWindow');
                            var modalOverlay = document.querySelector('.modalOverlay');
                            var openModalButton = document.getElementById('openModalButton');
                            var closeModalButton = document.getElementById('close');

                            openModalButton.addEventListener('click', function(event) {
                                event.preventDefault();
                                modal.style.display = 'block';
                                modalOverlay.style.display = 'block';
                            });

                            closeModalButton.addEventListener('click', function() {
                                modal.style.display = 'none';
                                modalOverlay.style.display = 'none';
                            });

                            window.addEventListener('click', function(event) {
                                if (event.target === modalOverlay) {
                                    modal.style.display = 'none';
                                    modalOverlay.style.display = 'none';
                                }
                            });
                        });
                    </script>
                    <div class="vacantJob">
                        <span>{{$vacant->charge->charge}}</span>
                    </div>
                    <div class="vacantCreated">
                        <span>Creada: {{$vacant->created_at}}</span>
                    </div>
                    <div class="actions">
                        <form action="{{route('selector.viewApplications', ['vacancie' => $vacant->id])}}" class="formAction" method="get">
                            <button><i class="bi bi-eye-fill"> Ver postulados</i></button>
                        </form>
                    </div>
                </article>
                @empty
                <h3>No hay procesos de seleccion para esta empresa</h3>
                @endforelse
            </section>
        </section>
    </section>
    @endsection
</body>

</html>
