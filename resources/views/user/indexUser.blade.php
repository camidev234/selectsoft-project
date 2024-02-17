<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexUser.css')}}">
    <title>Selectsoft-Home</title>
</head>

<body>
    <header class="header">
        @extends('layout.header')
    </header>
    @section('content')
    @if(session()->has('message'))
    <p id="message" style="display: none;">{{ session('message') }}</p>
    <script>
        const mes = document.getElementById('message')
        alert(mes.textContent);
    </script>
    @endif
    <main class="principal_content">
        <section class="card-user">
            <section class="card-header">
                <h3>{{$user->name}} {{$user->last_name}}</h3>
            </section>
            <section class="card-body">
                <article class="button_password">
                    <section class="actions-card">
                        <div class="action" id="actionTwo">
                            <a href="{{route('user.updatePassword')}}">Cambiar contraseña <i class="bi bi-key-fill"></i></a>
                        </div>
                    </section>
                </article>
                <article class="button_password">
                    <section class="actions-card">
                        <div class="action" id="actionTwo">
                            <a href="{{route('user.edit', ['user' => $user->id])}}">Actualizar Informacion <i class="bi bi-person-fill-up"></i></a>
                        </div>
                    </section>
                </article>
                <section class="card-header-two">
                    <h3>Hoja de vida</h3>
                </section>
                <article class="experiencies">
                    <h5>Experiencias: {{$experiences}} </h5>
                    <section class="actions-card">
                        <div class="action">
                            <a href="{{route('exp.create')}}">Añadir nueva experiencia <i class="bi bi-file-plus"></i></a>
                        </div>
                        <form action="{{route('exp.index')}}" method="get">
                            <button>Ver <i class="bi bi-eye"></i></button>
                        </form>
                    </section>
                </article>
                <article class="educations">
                    <h5>Educacion: {{$educations}}</h5>
                    <section class="actions-card">
                        <div class="action">
                            <a href="{{route('education.create')}}">Añadir nueva educacion <i class="bi bi-file-plus"></i></a>
                        </div>
                        <form action="{{route('educations.index')}}" method="get">
                            <button>Ver <i class="bi bi-eye"></i></button>
                        </form>
                    </section>
                </article>
                <article class="supports">
                    <h5>Soportes: {{$supports}}</h5>
                    <section class="actions-card">
                        <div class="action">
                            <a href="{{route('supports.create')}}">Añadir nuevo soporte <i class="bi bi-file-plus"></i></a>
                        </div>
                        <form action="" method="get">
                            <button>Ver <i class="bi bi-eye"></i></button>
                        </form>
                    </section>
                </article>
                <article class="hdv">
                    <form action="{{route('candidate.curriculum')}}" method="get">
                        <button>Ver HDV completa <i class="bi bi-file-text-fill"></i></button>
                    </form>
                </article>
            </section>
        </section>
        <section class="user-content">
            <section class="user_c_container">
                <div class="profile">
                    <h3>Perfil Profesional: </h3>
                    <p>{{$profile}}</p>
                </div>
            </section>
            <section class="applications">
                <article class="app_title">
                    <h3>Mis aplicaciones</h3>
                </article>
                <article class="allAplications">
                    @forelse($applications as $application)
                    <div class="containerAplication">
                        <section class="charge">
                            <h4>{{$application->vacant->charge->charge}}</h4>
                            <span>{{$application->vacant->company->business_name}}</span>
                            <span>{{$application->vacant->city->city_name}}</span>
                        </section>
                        <section class="statuses">
                            <article class="containerStatuses">
                                <div class="postulated @if($application->status_applications_id == 1) active @endif">
                                    <span>Postulada</span>
                                </div>

                                <div class="cvView @if($application->status_applications_id == 2) active @endif">
                                    <span>Cv Visto</span>
                                </div>
                                <div class="selected @if($application->status_applications_id == 3) active @endif">
                                    <span>Preseleccionado</span>
                                </div>
                                <div class="finally @if($application->status_applications_id == 4) active @endif">
                                    <span>Finalista</span>
                                </div>
                            </article>
                        </section>
                        <section class="exit">
                            <a href="">
                                <form action="{{ route('applications.destroy', ['applications' => $application->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button><i class="bi bi-person-fill-x"></i></button>
                                </form>
                            </a>
                        </section>
                    </div>
                    @empty
                    <div class="empty">
                        <h3>Aun no tienes postulaciones.</h3>
                        @endforelse
                    </div>
                </article>
            </section>
        </section>
    </main>

    @endsection


</body>

</html>