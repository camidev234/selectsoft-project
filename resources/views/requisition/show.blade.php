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
            max-width: 800px;
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
                <span><strong>Descripción del Trabajo</strong></span><br><br>
                <p> {{ $requisition->job_description }}</p>
            </article>
            <article class="item">
                <span><strong>Justificación</strong></span><br><br>
                <p> {{ $requisition->justification }}</p>
            </article>
            <article class="item">
                <span><strong>Candidato Ideal</strong></span><br><br>
                <p> {{ $requisition->ideal_candidate }}</p>
            </article>
            <article class="item">
                <span><strong>Misión del Cargo</strong></span><br><br>
                <p> {{ $requisition->mission_charge }}</p>
            </article>
            <article class="item">
                <span><strong>Responsabilidades</strong></span><br><br>
                <p>{{ $requisition->responsabilities }}</p>
            </article>
            <article class="item">
                <span><strong>Descripción del Candidato</strong></span><br><br>
                <p> {{ $requisition->candidate_description }}</p>
            </article>
            <article class="item">
                <span><strong>Talentos del Candidato</strong></span><br><br>
                <p> {{ $requisition->candidate_talents }}</p>
            </article>
            <article class="item">
                <span><strong>Criterios de Selección</strong></span><br><br>
                <p> {{ $requisition->selection_criteria }}</p>
            </article>
        </section>

        <h2>Detalles del Cargo</h2>
        <section class="details">
            <p><strong>Nombre del Cargo:</strong> {{ $requisition->charge->charge }}</p>
        </section>
    </section>
    @endsection
</body>

</html>