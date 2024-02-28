<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/hvd.css')}}">
    <title>Curriculum: {{$candidate->user->name}}</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <div class="modalOverlay"></div>
    <section class="container">
        <section class="profile">
            <article class="name">
                <h2>{{$candidate->user->name}} {{$candidate->user->last_name}}</h2>
            </article>
            <article class="basicInfo">
                <span><i class="bi bi-geo-alt-fill"></i> {{$candidate->user->country->country_name}}, {{$candidate->user->city->city_name}}</span>
                <span><i class="bi bi-envelope-at-fill"></i> {{$candidate->user->email}}</span>
                <span><i class="bi bi-telephone-fill"></i> {{$candidate->user->phone_number}}</span>
            </article>
        </section>
        <section class="occupationalProfile">
            <article>
                <section class="titleOcc">
                    <h4>Perfil Ocupacional</h4>
                </section><br>
                <section class="profileInfo">
                    <div class="pf">
                        <h3>{{$candidate->curriculum_title}}</h3>
                        <p>{{$candidate->occupational_profile}}</p>
                    </div>
                </section>
            </article>
        </section>
        <section class="sectionTitle">
            <article>
                <h4>Estudios</h4>
            </article>
        </section>
        <section class="educationsCandidate">
            <ul>
                @forelse($educations as $education)
                <li>
                    <h4>{{$education->study_level->study_level}}</h4>
                    <span class="edu">{{$education->shcool_name}}/{{$education->study_status->study_status}}</span>
                </li>
                @empty
                <h5>No tiene estudios aun</h5>
                @endforelse
            </ul>
        </section><br>
        <section class="sectionTitle">
            <article>
                <h4>Experiencias Profesionales</h4>
            </article>
        </section>
        <section class="experiencesCandidate">
            <table>
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Meses de experiencia</th>
                        <th>Funciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiencies as $experiencie)
                    <tr>
                        <td>{{$experiencie->company_experience}}</td>
                        <td>{{$experiencie->months_experience}}</td>
                        <td>{{$experiencie->functions}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>El candidato no posee experiencias</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section><br>
        <section class="sectionTitle">
            <article>
                <h4>Habilidades, Competencias u otras</h4>
            </article>
        </section>
        <section class="skillsCandidate">
            <article class="skillsContainer">
                <p>{{$candidate->skills}}</p>
            </article>
        </section>
        <section class="sectionTitle">
            <article>
                <h4>Soportes del candidato</h4>
            </article>
        </section>
        <section class="files">
            <article>
                @forelse($supports as $support)
                @php
                $fileName = basename($support->support_file);
                @endphp
                <span><strong>{{$support->support_type->support_type}}</strong> - {{$fileName}}  <a href="{{ asset($support->support_file) }}" target="_blank" style="margin-left: 20px; color:red;"><i class="bi bi-file-earmark-pdf"></i></a> </span><br>
                @empty
                <span>El candidato no ha cargado ningun soporte</span>
                @endforelse
            </article>
        </section>
    </section>
    @endsection

</body>

</html>