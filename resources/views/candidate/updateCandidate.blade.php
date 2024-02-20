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
        <form action="{{route('user.update', ['user' => $user->id])}}" class="formupdate" method="POST">
        @csrf    
        @method('PATCH')
            <label for="">Numero de telefono</label><br>
            <input type="text" name="telephone" id="" value="{{$user->telephone}}"><br>
            @error('telephone')
                <span style="color:red;">{{$message}}</span><br>
            @enderror
            <label for="">Numero de celular <span class="ast">*</span></label><br>
            <input type="text" name="phone_number" id="" value="{{$user->phone_number}}"><br>
            @error('phone_number')
                <span style="color:red;">{{$message}}</span><br>
            @enderror
            <label for="">Pais <span class="ast">*</span></label><br>
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
            <label for="">Departamento <span class="ast">*</span></label><br>
            <select name="departament_id" id="">
                <option value="{{$user->departament_id}}">{{$user->departament->departament_name}}</option>
                @foreach ($departaments as $departament)
                @if($departament->id == $user->id_departament)
                continue
                @else
                <option value="{{$departament->id}}">{{$departament->departament_name}}</option>
                @endif
                @endforeach
            </select><br>
            <label for="">Ciudad <span class="ast">*</span></label><br>
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
            <label for="">Direccion <span class="ast">*</span></label><br>
            <input type="text" name="address" id="" value="{{$user->address}}"><br>
            @error('address')
                <span style="color:red;">{{$message}}</span><br>
            @enderror
            <button class="sub">Actualizar Informacion</button>
        </form>
    </main>
    @endsection
</body>

</html>