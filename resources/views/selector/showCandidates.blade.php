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
                <h3>Listado de Postulados Vacante {{$vacancie->vacancie_code}}</h3>
            </article>
            <article class="conv">
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
            </article>
        </section>
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
                        <td>{{$application->candidate->user->document_type->document_type_code}}-{{$application->candidate->user->number_document}}</td>
                        <td>{{$application->candidate->user->name}} {{$application->candidate->user->last_name}}</td>
                        @if($application->status_applications_id == 1 || $application->status_applications_id == 3 || $application->status_applications_id == 4)
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
                                <button class=""><i class="bi bi-pencil-square"></i></button>
                            </form>
                        </td>
                        <td>
                            <span class="score">{{$application->technical_test_score}}</span>
                            <form action="{{route('selector.technical', ['application' => $application->id])}}" class="actionForm edit">
                                <button class="openModalButtonTwo"><i class="bi bi-pencil-square"></i></button>
                            </form>
                        </td>
                        <td>
                            <span class="score">{{$application->tersonality_test}}</span>
                            <form action="{{route('selector.personality', ['application' => $application->id])}}" class="actionForm edit">
                                <button class="openModalButtonThree"><i class="bi bi-pencil-square"></i></button>
                            </form>
                        </td>
                        <td>
                            <span class="score">{{$application->total_score}}</span>
                        </td>
                        @endif
                        <td>{{$application->status_applications->status_name}}</td>
                        <td>
                            <form action="{{route('selector.curriculum', ['application' => $application->id])}}" class="actionForm2">
                                <button class="iOne"><i class="bi bi-eye-fill"></i></button>
                            </form>
                            @if($application->status_applications_id == 2 || $application->status_applications_id == 3 || $application->status_applications_id == 4)
                            <form action="" class="actionForm2">
                                <button class="openModalButton iTwo" data-modal-id="modal{{$loop->index + 1}}"><i class="bi bi-arrow-left-right"></i></button>
                            </form>
                            <section class="modalWindow"  id="modal{{$loop->index + 1}}">
                                <form action="{{route('application.updateStatus', ['application' => $application->id])}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <section class="close">
                                        <label for="">Cambiar estado: </label><br>
                                        <i class="bi bi-x-lg" id="close"></i>
                                    </section>
                                    <select name="newStatus" id="">
                                        @foreach($statuses as $status)
                                        <option value="{{$status->id}}">{{$status->status_name}}</option>
                                        @endforeach
                                    </select><br>
                                    <button>Guardar</button>
                                </form>
                            </section>

                            @endif
                            <form action="{{route('selector.createCitation', ['application' => $application->id])}}" class="actionForm2">
                                <button class="iThree"><i class="bi bi-envelope-open-fill"></i></button>
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
    <script type="module" src="{{asset('js/modalWindow.js')}}"></script>
    @endsection
</body>

</html>
