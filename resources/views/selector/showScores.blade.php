<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/showScores.css')}}">
    <title>Puntajes y Citaciones</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="infoUp">
        <article class="secondArticle">
            <h2>Listado de citaciones y puntajes</h2>
            <h3>{{$application->candidate->user->name}} {{$application->candidate->user->last_name}} <span class="state">{{$application->status_applications->status_name}}</span></h3>
        </article>
        <article class="firstArticle">
            <form action="{{route('application.updateStatus', ['application' => $application->id])}}" method="post">
                @csrf
                @method('PATCH')
                <button {{$application->status_applications_id == 1 || $application->status_applications_id == 6 || $application->status_applications_id == 5 ? 'disabled' : ''}} class="{{$application->status_applications_id == 1 || $application->status_applications_id == 6 ? 'disabledTwo' : 'enabledTwo'}}">
                    @if($application->status_applications_id == 1)
                    <i class="bi bi-person-check-fill"></i> Postulado
                    @elseif($application->status_applications_id == 2)
                    <i class="bi bi-arrow-left-right"></i> Seleccionar
                    @elseif($application->status_applications_id == 3)
                    <i class="bi bi-arrow-left-right"></i> Finalista
                    @elseif($application->status_applications_id == 4)
                    <i class="bi bi-arrow-left-right"></i> Contratar
                    @elseif($application->status_applications_id == 5)
                    <i class="bi bi-check-circle-fill"></i> Contratado
                    @else
                    Candidato Rechazado
                    @endif
                </button>
            </form>
            <form class="form" action="{{route('selector.curriculum', ['application' => $application->id])}}">
                <button class="enabled one"><i class="bi bi-eye-fill"></i> Ver Hdv</button>
            </form>
            <form class="form" action="{{route('selector.roleoutC', ['application' => $application->id])}}" method="post">
                @csrf
                @method('PATCH')
                <button {{$application->status_applications_id == 1 || $application->status_applications_id == 6 || $application->status_applications_id == 5 ? 'disabled' : ''}} class="{{$application->status_applications_id == 1 || $application->status_applications_id == 6 || $application->status_applications_id == 5 ? 'disabled' : 'enabled'}}"><i class="bi bi-person-x-fill"></i> Rechazar</button>
            </form>
        </article>
    </section>

    @if($application->status_applications_id > 1)
    <article class="conv">
        <article class="actOne act">
            <span class="btnAct btOne"><i class="bi bi-pencil-square"></i></span>
            <span>Editar Puntaje</span>
        </article>
        <article class="actTwo act">
            <span class="btnAct btTwo"><i class="bi bi-card-list"></i></span>
            <span>Agregar Detalle De Citacion</span>
        </article>
        <article class="actThree act">
            <span class="btnAct btThree"><i class="bi bi-eye-fill"></i></span>
            <span>Ver Detalle De Citacion</span>
        </article>
    </article>
    @endif

    <section class="containerTable">
        <table>
            <thead>
                <tr>
                    <th>P. Educacion</th>
                    <th>P. Entrevista</th>
                    <th>P. prueba tecnica</th>
                    <th>P. test personalidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr-content">
                    @if($application->status_applications_id == 1 || $application->status_applications_id == 3 || $application->status_applications_id == 5 || $application->status_applications_id == 6)
                    <td>
                        <span class="score">{{$application->education_score}}</span>
                        <form action="" class="actionForm edit">
                        </form>
                    </td>
                    <td>
                        <span class="score">{{$application->interview_score}}</span>
                        <form action="" class="actionForm edit">
                        </form>
                    </td>
                    <td>
                        <span class="score">{{$application->technical_test_score}}</span>
                        <form action="" class="actionForm edit">
                        </form>
                    </td>
                    <td>
                        <span class="score">{{$application->tersonality_test}}</span>
                        <form action="" class="actionForm edit">
                        </form>
                    </td>
                    <td>
                        <span class="score">{{$application->total_score}}</span>
                        <form action="" class="actionForm edit">
                        </form>
                    </td>
                    @else
                    <td>
                        <span class="score">{{$application->education_score}}</span>
                    </td>

                    <td>
                        <span class="score">{{$application->interview_score}}</span>
                        <form action="{{route('selector.interwiew', ['application' => $application->id])}}" class="actionForm edit">
                            <button class="btnAct btOne"><i class="bi2 bi-pencil-square"></i></button>
                        </form>
                        <form action="" class="actionForm edit">
                            <button class="btnAct btTwo"><i class="bi2 bi-card-list"></i></button>
                        </form>
                        <form action="" class="actionForm edit">
                            <button class="btnAct btThree"><i class="bi2 bi-eye-fill"></i></button>
                        </form>
                    </td>
                    <td>
                        <span class="score">{{$application->technical_test_score}}</span>
                        <form action="{{route('selector.technical', ['application' => $application->id])}}" class="actionForm edit">
                            <button class="btnAct btOne"><i class="bi2 bi-pencil-square"></i></button>
                        </form>
                        <form action="" class="actionForm edit">
                            <button class="btnAct btTwo"><i class="bi2 bi-card-list"></i></button>
                        </form>
                        <form action="" class="actionForm edit">
                            <button class="btnAct btThree"><i class="bi2 bi-eye-fill"></i></button>
                        </form>
                    </td>
                    <td>
                        <span class="score">{{$application->tersonality_test}}</span>
                        <form action="{{route('selector.personality', ['application' => $application->id])}}" class="actionForm edit">
                            <button class="btnAct btOne"><i class="bi2 bi-pencil-square"></i></button>
                        </form>
                        <form action="" class="actionForm edit">
                            <button class="btnAct btTwo"><i class="bi2 bi-card-list"></i></button>
                        </form>
                        <form action="" class="actionForm edit">
                            <button class="btnAct btThree"><i class="bi2 bi-eye-fill"></i></button>
                        </form>
                    </td>
                    <td>
                        <span class="score">{{$application->total_score}}</span>
                    </td>
                    @endif
                    <td class="actionsTable">
                        <form action="{{route('selector.createCitation', ['application' => $application->id])}}" class="actionForm2">
                            <button class="iThree" {{$application->status_applications_id == 1 ? 'disabled': ''}}><i class="bi2 bi-envelope-open-fill"></i> Crear Citacion</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
    @endsection
</body>

</html>