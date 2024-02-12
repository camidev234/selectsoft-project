<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createCharge.css')}}">
    <title>Editar Cargo</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <form method="post" action="{{route('charges.update', ['charge' => $charge->id, 'company' => $company->id])}}" class="form">
        @csrf
        @method('PATCH')
        <label for="charge">Cargo: </label>
        <input type="text" name="charge" id="occupation_code" value="{{old('charge')}} {{$charge->charge}}">
        @error('charge')
            <span style="color: red;">{{$message}}</span>
        @enderror
        <label for="">Ocupacion</label><br>
        <select name="occupation_id" id="">
                <option value="{{$charge->occupation_id}}">{{$charge->occupation->occupation_name}}</option>
            @forelse($occupations as $occupation)
                <option value="{{$occupation->id}}">{{$occupation->occupation_code}}-{{$occupation->occupation_name}}</option>
            @empty
                <option value="">No hay ocupaciones en el sistema</option>
            @endforelse
        </select><br>
        <input type="submit" value="Crear Ocupacion">
    </form>
    @endsection
</body>

</html>
