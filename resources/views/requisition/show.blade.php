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
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: white;
        }

        h2 {
            margin-top: 0;
        }

        .details {
            margin-bottom: 20px;
        }

        .details p {
            margin: 5px 0;
        }
    </style>
</head>

<body>

    @extends('layout.header')

    @section('content')
    <div class="container">
        <h2>Detalles de la Requisición</h2>
        <div class="details">
            <p><strong>ID de la Requisición:</strong> {{ $requisition->id }}</p>
            <p><strong>Descripción del Trabajo:</strong> {{ $requisition->job_description }}</p>
            <p><strong>Justificación:</strong> {{ $requisition->justification }}</p>
            <p><strong>Candidato Ideal:</strong> {{ $requisition->ideal_candidate }}</p>
            <p><strong>Misión del Cargo:</strong> {{ $requisition->mission_charge }}</p>
            <p><strong>Responsabilidades:</strong> {{ $requisition->responsabilities }}</p>
            <p><strong>Descripción del Candidato:</strong> {{ $requisition->candidate_description }}</p>
            <p><strong>Talentos del Candidato:</strong> {{ $requisition->candidate_talents }}</p>
            <p><strong>Criterios de Selección:</strong> {{ $requisition->selection_criteria }}</p>
        </div>

        <h2>Detalles del Cargo</h2>
        <div class="details">
            <p><strong>Nombre del Cargo:</strong> {{ $requisition->charge->charge }}</p>
        </div>
    </div>
    @endsection
</body>

</html>