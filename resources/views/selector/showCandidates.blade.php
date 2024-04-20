<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de postulados vacante</title>
    <link rel="stylesheet" href="{{asset('css/showCandidates.css')}}"> <!-- Asegúrate de enlazar el archivo CSS -->
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="container">
        <div class="modalOverlay"></div>
        <section class="titlepage">
            <article class="title">
                <h3>Listado de Postulados Vacante {{$vacancie->vacancie_code}}-{{$vacancie->requisiton->charge->charge}}</h3>
                <h5>Recuerde que las citaciones y la opcion para rechazar candidato solo se habilitaran despues de ver la hoja de vida</h5>
            </article>
            <!-- <article class="conv">
                <article class="actOne act">
                    <span class="btnAct btOne"><i class="bi bi-pencil-square"></i></span>
                    <span>Editar Puntaje</span>
                </article>
                <article class="actTwo act">
                    <span class="btnAct btTwo"><i class="bi bi-eye-fill"></i></span>
                    <span>Ver HDV</span>
                </article>
                <article class="actThree act">
                    <span class="btnAct btThree"><i class="bi bi-arrow-left-right"></i></span>
                    <span>Cambiar Estado</span>
                </article>
                <article class="actThree act">
                    <span class="btnAct btFour"><i class="bi bi-envelope-open-fill"></i></span>
                    <span>Crear Citacion</span>
                </article>
            </article> -->
        </section>
        <section class="containerTable">
            @forelse($applications as $application)
            <article class="candidate">
                <article class="containerImage">
                    @if($application->candidate->photo_file == null)
                    <img src="{{asset('img/personIcon.jpg')}}" alt="">
                    @else
                    <img src="{{asset('storage/' . $application->candidate->photo_file)}}" alt="">
                    @endif
                </article>
                <article class="containerInfo">
                    <article class="firstRow">
                        <form action="{{route('application.updateStatus', ['application' => $application->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button {{$application->status_applications_id == 1 || $application->status_applications_id == 6 || $application->status_applications_id == 5 ? 'disabled' : ''}} class="{{$application->status_applications_id == 1 || $application->status_applications_id == 6 ? 'disabledTwo' : 'enabledTwo'}}">
                                @if($application->status_applications_id == 1)
                                Postulado
                                @elseif($application->status_applications_id == 2)
                                Seleccionar
                                @elseif($application->status_applications_id == 3)
                                Finalista
                                @elseif($application->status_applications_id == 4)
                                Contratar
                                @elseif($application->status_applications_id == 5)
                                Contratado
                                @else
                                Candidato Rechazado
                                @endif
                            </button>
                        </form>
                        <span>Ponderacion Total: {{$application->total_score}}</span>
                    </article>
                    <article class="secondRow">
                        <h3>{{ucwords(strtolower($application->candidate->user->name))}} {{ucwords(strtolower($application->candidate->user->last_name))}}</h3>
                        <h4>{{$application->candidate->curriculum_title == null ? 'El candidato no tiene perfil ocupacional' : ucwords(strtolower($application->candidate->curriculum_title))}}</h4>
                        <h5>
                            {{
                                $application->candidate->user->departament_id == 33 ? $application->candidate->user->city->city_name : $application->candidate->user->departament->departament_name . ', ' . $application->candidate->user->city->city_name
                            }}
                        </h5>
                        <h6>Estado: {{$application->status_applications->status_name}}</h6>
                    </article>
                    <article class="thirdRow">
                        <form action="{{route('selector.curriculum', ['application' => $application->id])}}">
                            <button class="enabled"><i class="bi bi-eye-fill"></i> Ver Hdv</button>
                        </form>
                        <form action="{{route('selector.roleoutC', ['application' => $application->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button {{$application->status_applications_id == 1 || $application->status_applications_id == 6 || $application->status_applications_id == 5 ? 'disabled' : ''}} class="{{$application->status_applications_id == 1 || $application->status_applications_id == 6 || $application->status_applications_id == 5 ? 'disabled' : 'enabled'}}"><i class="bi bi-person-x-fill"></i> Rechazar</button>
                        </form>
                        <form action="{{route('application.showC', ['application' => $application->id])}}" method="get">
                            <button {{$application->status_applications_id == 1 ? 'disabled' : ''}} class="{{$application->status_applications_id == 1 ? 'disabled' : 'enabled'}}"><i class="bi bi-list-nested"></i> Citaciones</button>
                        </form>
                    </article>
                </article>
            </article>
            @empty
            <span>No hay candidatos para esta vacante</span>
            @endforelse
        </section>
    </section>
    <script type="module" src="{{asset('js/modalWindow.js')}}"></script>
    @endsection
</body>

</html>