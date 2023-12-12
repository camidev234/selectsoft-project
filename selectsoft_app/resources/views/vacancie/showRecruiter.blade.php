<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/showVacantRecruiter.css')}}">
    <title>Ver vacante</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="title-page">
        <h2>Informacion de la vacante: {{$vacancie->vacancie_code}}</h2>
    </section>
    <section class="card_info">
        <section class="general">
            <article class="generalTitle">
                <h3>Informacion General</h3>
            </article>
            <section class="generalInfo">
                <article class="charge">
                    <h3>Cargo: </h3><br>
                    <span>{{$vacancie->charge->charge}}</span>
                </article>
            </section>
            <section class="otherGeneralInfo">
                <article class="firstGeneral">
                    <p><strong>Experiencia requerida: </strong>{{$vacancie->required_experience}} meses</p>
                    <p><strong>Numero de vacantes: </strong>{{$vacancie->number_vacancies}}</p>
                    <p><strong>Rango salarial: </strong>${{$vacancie->salary_range}}</p>
                </article>
                <article class="secondGeneral">
                    <p><strong>Horario de trabajo: </strong>{{$vacancie->schedule}}</p>
                    <p><strong>Tipo de jornada: </strong>{{$vacancie->work_day->working_day}}</p>
                    <p><strong>Tipo de salario: </strong>{{$vacancie->salaries_type->salary_type}}</p>
                    <p><strong>Persona Solicitante: </strong>{{$vacancie->applicant_person}}</p>
                </article>
            </section>
            <section class="generalTitle">
                <h3>Ubicacion</h3>
            </section>
            <section class="locationInfo">
                <article>
                    <p><strong>Pais: </strong>{{$vacancie->country->country_name}}</p>
                </article>
                <article>
                    <p><strong>Ciudad: </strong>{{$vacancie->city->city_name}}</p>
                </article>
            </section>
            <section class="generalTitle">
                <h3>Estado de la vacante: </h3>
            </section>
            <section class="status">
                <article>
                    <p><strong>Estado de la vacante: </strong>
                    @if($vacancie->is_active)
                    Activa
                    @else
                    Inactiva
                    @endif
                    </p>
                    <p><strong>Numero de postulados: </strong>{{$applicants}}</p>
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
                    <p>{{$vacancie->skills}}</p>
                </article>
            </section>
            <section class="educations">
                <article>
                    <h3>Educacion requerida</h3>
                </article>
                <section class="addEducation">
                    <form action="{{route('studyVacant.create', ['vacancie' => $vacancie->id])}}" method="get">
                        <button>Añadir educacion</button>
                    </form>
                </section>
                <article class="educationsTable">
                    <table>
                        <thead>
                            <tr>
                                <th>Nivel</th>
                                <th>Estado</th>
                                <th>Profesion</th>
                                <th>Puntos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($studies as $study)
                                <tr>
                                    <td>{{$study->study_level->study_level}}</td>
                                    <td>{{$study->study_status->study_status}}</td>
                                    <td>{{$study->study_name}}</td>
                                    <td>{{$study->points}}</td>
                                    <td class="actionTrash">
                                        <form action="{{route('studyVacant.destroy', ['vacancie_study' => $study->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button><i class="bi bi-trash3"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Esta vacante no requiere algun estudio aun</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </article>
                <br>
            </section>
            <section class="generalTitle">
                <h3>Funciones </h3>
            </section>
            <section class="functions">
                    <table>
                        <thead>
                            <tr>
                                <th>Funcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($functions as $function)
                            <tr>
                                <td>{{$function->function}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td>No hay funciones para la ocupacion de la vacante</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
            </section>
            <article class="actionsVacancie">
                <form action="{{route('vacancies.editStatus', ['vacancie' => $vacancie->id])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <button>Cambiar estado</button>
                </form>
                @if($applicants > 0)
                <form action="" method="post">
                    <button>Ver postulados</button>
                </form>
                @endif
            </article>
            <section class="back">
                <a href="{{route('vacancies.index', ['company' => $company->id])}}">Volver</a>
            </section>
        </section>
    </section>
    @endsection
</body>

</html>
