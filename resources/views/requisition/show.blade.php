<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisicion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 700px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: white;
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        .details {
            margin-bottom: 20px;
        }

        .details p {
            margin: 5px 0;
            line-height: 1.6;
        }

        .item {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .item:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .item p {
            margin: 0;
        }

        strong {
            color: #555;
        }

        .functionCharge table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        .functionCharge th,
        .functionCharge td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .functionCharge th {
            background-color: #2193b0;
            color: white;
        }

        .functionCharge tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .two {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .educations table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        .educations th,
        .educations td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .educations th {
            background-color: #2193b0;
            color: white;
        }

        .educations tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .educations button {
            background: none;
            border: none;
            cursor: pointer;
        }



        .educations form {
            display: inline-block;
            vertical-align: middle;
        }

        .educations button {
            background: none;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border-radius: 5px;

        }

        .educations button i {
            /* color: #333; */
            color: white;
        }

        .educations button.delete {
            background-color: #b71c1c;
            margin-right: 5px;
        }

        .educations button.update {
            background-color: #1976d2;
        }

        .actions-l {
            display: flex;
            gap: 5px;
            /* background-color: #1976d2; */
            white-space: nowrap;
            text-align: center;
        }
    </style>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="container">
        <h2>Detalles de la Requisición</h2>
        <section class="details">
            <article class="item">
                <br>
                <span><strong>Numero de vacantes</strong></span><br><br>
                <p> {{ $requisition->number_vacancies }}</p>
            </article>
            <article class="item">
                <span><strong>Experiencia requerida en meses</strong></span><br><br>
                <p> {{ $requisition->required_experience }} meses</p>
            </article>

        </section>

        <h2>Detalles del Cargo</h2>
        <section class="details">
            <p><strong>Nombre del Cargo:</strong> {{ $requisition->charge->charge }}</p>
        </section>
        <section class="functionCharge">
            <table>
                <thead>
                    <tr>
                        <th>Funciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($functions as $function)
                    <tr>
                        <td>{{$function->function}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>Este cargo no posee funciones aun</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
        <h2 class="two">Educacion Requerida</h2>
        <section class="educations">
            <table>
                <thead>
                    <tr>
                        <th>Nivel De Estudio</th>
                        <th>Estado</th>
                        <th>Titulo</th>
                        <th>Puntos Asignados</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($educations as $education)
                    <tr>
                        <td>{{$education->study_level->study_level}}</td>
                        <td>{{$education->study_status->study_status}}</td>
                        <td>{{$education->study_name}}</td>
                        <td>{{$education->points}}</td>
                        <td class="actions-l">
                            <form action="{{route('requisitionStudy.destroy', ['requisitionStudy' => $education->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="delete"><i class="bi bi-trash"></i></button>
                            </form>
                            <form action="">
                                <button class="update"><i class="bi bi-pencil-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>Esta requisicion no cuenta con educacion requerida</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </section>
    @endsection
</body>

</html>