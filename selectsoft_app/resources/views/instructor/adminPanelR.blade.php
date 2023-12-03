<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/adminPanel.css')}}">
    <title>Panel de administrador</title>
</head>
<body>
    @extends('layout.headerAdmin')

    @section('content')
    <section class="sidebar">
            <a href="{{route('instructor.index')}}"><article class="option-admin modi">
                <img src="{{asset('img/personIcon.jpg')}}" alt="icono_persona">
                <h3>Ver candidatos</h3>
            </article></a>

            <a href="{{route('instructor.recruiters')}}" style="background-color: white;"><article class="option-admin">
                <img src="{{asset('img/img-recruiter.png')}}" alt="icono_verr">
                <h3>Ver Reclutadores</h3>
            </article></a>

            <a href="{{route('instructor.selectors')}}"><article class="option-admin">
                <img src="{{asset('img/descarga__13_-removebg-preview.png')}}" alt="icono_verS">
                <h3>Ver Seleccionadores</h3>
            </article></a>

            <a href="{{route('instructor.instructors')}}"><article class="option-admin">
                <img src="{{asset('img/descarga__12_-removebg-preview.png')}}" alt="icono_verA">
                <h3>Ver Administradores</h3>
            </article></a>

        </section>

        <section class="view-info">
            <section class="info-options">
                <h4>Listado de Reclutadores en el sistema</h4>
                <section class="actions">
                    <article class="action acOne">
                        <img src="{{asset('img/icone-crayon-bleu.png')}}" alt="lapiz_icon">
                        <h5>Modificar Rol</h5>
                    </article>
                    <article class="action">
                        <img src="{{asset('img/papelera.png')}}" alt="icon">
                        <h5>Eliminar</h5>
                    </article>
                </section>
            </section>
            <section class="table-content">
                <table>
                    <thead>
                        <tr>
                            <th><h5>Documento</h5></th>
                            <th><h5>Nombres</h5></th>
                        <!-- <th><h5>Primer Apellido</h5></th> -->
                            <th><h5>Apellidos</h5></th>
                            <th><h5>Empresa</h5></th>
                            <th><h5>Acciones</h5></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recruiters as $recruiter)
                            <tr>
                                <td>{{$recruiter->user->number_document}}</td>
                                <td>{{$recruiter->user->name}}</td>
                                <td>{{$recruiter->user->last_name}}</td>
                                <td>{{ optional($recruiter->company)->business_name }}</td>
                                <td class="actions-table">
                                    <form action="{{route('instructor.editUserRole', ['user' => $recruiter->user_id])}}" method="get">
                                        <button><i class="bi bi-pencil-fill btn2"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No hay Reclutadores para mostrar</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </section>
        </section>
    @endsection
</body>
</html>
