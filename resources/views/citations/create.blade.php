<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/citation.css')}}">
    <title>Crear citacion</title>
</head>

<body>
    <!-- $table->foreignId('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->set('citation_type', ['interview', 'Technical Test', 'Language Test', 'Personality Test']);
            $table->string('from', 80);
            $table->string('to', 80);
            $table->string('Asunto', 80);
            $table->string('message', 900);
            $table->string('send_by', 100); -->

    @extends('layout.header')
    @section('content')
    <section class="container">
        <form action="{{route('selector.storeCitation', ['application' => $application->id])}}" method="post">
            @csrf
            <label for="">Tipo de citacion: </label><br>
            <select name="citation_type" id="">
                <option value="interview">interview</option>
                <option value="Technical Test">Technical Test</option>
                <option value="Personality Test">Personality Test</option>
            </select><br>
            <label for="">De: </label><br>
            <input type="text" value="{{$selector->company->email}}" readonly name="from"><br>
            @error('from')
                <span>{{$message}}</span>
            @enderror
            <label for="">Para: </label><br>
            <input type="text" value="{{$application->candidate->user->email}}" readonly name="to"><br>
            @error('to')
                <span>{{$message}}</span><br>
            @enderror
            <label for="">Asunto: </label><br>
            <input type="text" value="{{old('subject')}}" name="subject"><br>
            @error('subject')
                <span>{{$message}}</span><br>
            @enderror
            <label for="">Mensaje: </label><br>
            <textarea name="message" id="" cols="30" rows="12">{{old('message')}}</textarea><br>
            @error('message')
                <span>{{$message}}</span><br>
            @enderror
            <button>Enviar citacion</button>
        </form>
    </section>
    @endsection
</body>

</html>
