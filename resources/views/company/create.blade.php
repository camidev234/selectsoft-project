<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createCompany.css')}}">
    <title>Crear Empresa</title>
</head>
<body>
    @extends('layout.header')
    @section('content')
    <main class="container">
            @if(session()->has('error'))
                <p style="color:red;">{{ session('error') }}</p>
            @endif

        <section class="viaCompany">
            <h1>Vincularse a una empresa</h1>
            <br>
            <a href="{{route('company.index')}}">Ver empresas</a>
        </section><br>
        <section class="text">
            <h2>Crear empresa</h2><br>
        </section>
        <form action="{{route('company.store')}}" method="post">
            @csrf
            <label for="">Nit:</label><br>
            <input type="text" name="nit" placeholder="nit" value="{{old('nit')}}"><br>
            @error('nit')
                <span style="color: red;">{{$message}}</span><br>
            @enderror
            <label for="">Razon Social: </label><br>
            <input type="text" name="business_name" placeholder="Razon social" value="{{old('business_name')}}"><br>
            @error('business_name')
            <span style="color: red;">{{$message}}</span><br>
            @enderror
            <label for="">Telefono</label><br>
            <input type="text" placeholder="telefono" name="phone" value="{{old('phone')}}"><br>
            @error('phone')
            <span style="color: red;">{{$message}}</span><br>
            @enderror
            <label for="">Pais</label><br>
            <select name="country_id" id="">
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                @endforeach
            </select><br>
            <label for="">Ciudad</label><br>
            <select name="city_id" id="">
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->city_name}}</option>
                @endforeach
            </select><br>
            <label for="">Correo Electronico: </label><br>
            <input type="email" name="email" id="" placeholder="email" value="{{old('email')}}"><br>
            @error('email')
            <span style="color: red;">{{$message}}</span><br>
            @enderror
            <label for="">Direccion: </label><br>
            <input type="text" name="address" placeholder="direccion" value="{{old('address')}}"><br>
            @error('address')
            <span style="color: red;">{{$message}}</span><br>
            @enderror
            <input type="submit" value="Crear empresa">
        </form>
    </main>
    @endsection
</body>
</html>
