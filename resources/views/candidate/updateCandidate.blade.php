<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/updateUser.css')}}">
    <title>Actualizar Datos</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <main class="container">
        <form action="">
            <label for="">Numero de telefono</label><br>
            <input type="text" name="phone_number" id=""><br>
            <label for="">Numero de celular</label><br>
            <input type="text" name="phone_number" id=""><br>
            <select name="country_id" id="">
                <option value="{{$user->country_id}}">{{$user->country->country_name}}</option>
                @foreach ($countries as $country)
                @if($country->id == $user->country_id)
                continue
                @else
                <option value="{{$country->id}}">{{$country->country_name}}</option>
                @endif
                @endforeach
            </select><br>
            <select name="id_departament" id="">
                <option value="{{$user->id_departament}}">{{$user->departament->departament_name}}</option>
                @foreach ($departaments as $departament)
                @if($departament->id == $user->id_departament)
                continue
                @else
                <option value="{{$departament->id}}">{{$departament->departament_name}}</option>
                @endif
                @endforeach
            </select><br>
            <select name="city_id" id="">
                <option value="{{$user->city_id}}">{{$user->city->city_name}}</option>
                @foreach ($cities as $city)
                @if($city->id == $user->city_id)
                continue
                @else
                <option value="{{$city->id}}">{{$city->city_name}}</option>
                @endif
                @endforeach
            </select><br>
            <label for="">Direccion</label><br>
            <input type="text" name="address" id=""><br>
            <button class="sub">Actualizar Informacion</button>
        </form>
    </main>
    @endsection
</body>

</html>