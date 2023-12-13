<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de postulados</title>
    <link rel="stylesheet" href="{{asset('css/showCandidates.css')}}"> <!-- Asegúrate de enlazar el archivo CSS -->
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="container">
        <section class="containerTable">
            <table>
                <thead>
                    <tr>
                        <th>N. Documento</th>
                        <th>Candidato</th>
                        <th>P. Educacion</th>
                        <th>P. Entrevista</th>
                        <th>P. prueba tecnica</th>
                        <th>P. test personalidad</th>
                        <th>Puntaje total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $application)
                    <tr>
                        <td>{{$application->candidate->user->number_document}}</td>
                        <td>{{$application->candidate->user->name}} {{$application->candidate->user->last_name}}</td>
                        <td>
                            <span class="score">{{$application->education_score}}</span>
                            <form action="" class="actionForm edit">
                                <button><i class="bi bi-pencil-square"></i></button>
                            </form>
                        </td>
                        @if($application->status_applications_id == 1)
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
                            <span class="score">{{$application->interview_score}}</span>
                            <form action="" class="actionForm edit">
                                <button><i class="bi bi-pencil-square"></i></button>
                            </form>
                        </td>
                        <td>
                            <span class="score">{{$application->technical_test_score}}</span>
                            <form action="" class="actionForm edit">
                                <button><i class="bi bi-pencil-square"></i></button>
                            </form>
                        </td>
                        <td>
                            <span class="score">{{$application->tersonality_test}}</span>
                            <form action="" class="actionForm edit">
                                <button><i class="bi bi-pencil-square"></i></button>
                            </form>
                        </td>
                        <td>
                            <span class="score">{{$application->total_score}}</span>
                            <form action="" class="actionForm edit">
                                <button><i class="bi bi-pencil-square"></i></button>
                            </form>
                        </td>
                        @endif
                        <td>{{$application->status_applications->status_name}}</td>
                        <td>
                            <form action="{{route('selector.curriculum', ['application' => $application->id])}}" class="actionForm2">
                                <button><i class="bi bi-eye-fill"></i></button>
                            </form>
                            <form action="" class="actionForm2">
                                <button><i class="bi bi-arrow-left-right"></i></button>
                            </form>
                            <form action="" class="actionForm2">
                                <button><i class="bi bi-envelope-open-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>No hay aplicaciones para esta vacante</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </section>
    @endsection
</body>

</html>
