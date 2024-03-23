<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Registrarse a selectsoft</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <main class="flex">
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <section id="datos_personales">
                <article class="title">
                    <h2>DATOS PERSONALES</h2>
                </article>
                <section class="info">
                    <article>
                        <label for="nombres">Nombres <span class="ast">*</span></label>
                        <input type="text" id="nombres" name="name" value="{{old('name')}}">
                        @error('name')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="apellidos">Apellidos <span class="ast">*</span></label>
                        <input type="text" id="apellidos" name="last_name" value="{{old('last_name')}}">
                        @error('last_name')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="fecha_nacimiento">Fecha de nacimiento <span class="ast">*</span></label>
                        <input type="date" id="fecha_nacimiento" name="birthdate" value="{{old('birthdate')}}">
                        @error('birthdate')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="tipo_documento">Tipo de documento <span class="ast">*</span></label>
                        <select id="tipo_documento" name="document_type_id">
                            @foreach($document_types as $dct)
                            <option value="{{ $dct->id }}" {{ $dct->id == old('document_type_id') ? 'selected' : '' }}>{{ $dct->document_type }}</option>
                            @endforeach
                        </select>
                    </article>
                    <article>
                        <label for="numero_documento">Numero de documento <span class="ast">*</span></label>
                        <input type="text" id="numero_documento" name="number_document" value="{{old('number_document')}}">
                        @error('number_document')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                </section>
            </section>
            <section id="ubicacion">
                <article class="title">
                    <h2>UBICACIÓN</h2>
                </article>
                <section class="info">
                    <article>
                        <label for="pais">Pais</label>
                        <!-- <select name="id_country" id="">
                            @forelse($countries as $country)
                            <option value="{{ $country->id }}" {{ $country->id == old('id_country') ? 'selected' : '' }}>
                                {{ $country->country_code }}-{{ $country->country_name }}
                            </option>
                            @empty
                            <option value="">No hay paises en el sistema</option>
                            @endforelse
                        </select> -->
                        <input type="text" value="CO-Colombia" readonly>

                    </article>
                    <article>
                        <label for="departamento">Departamento <span class="ast">*</span></label>
                        <select name="id_department" id="">
                            @foreach($departaments as $dpto)
                            <option value="{{$dpto->id}}" {{ $dpto->id == old('id_department') ? 'selected' : '' }}>
                                {{$dpto->departament_name}}
                            </option>
                            @endforeach
                        </select>
                    </article>
                    <article>
                        <label for="ciudad">Ciudad <span class="ast">*</span></label>
                        <select name="id_city" id="">
                            @foreach($cities as $city)
                            <option value="{{$city->id}}" {{ $city->id == old('id_city') ? 'selected' : '' }}>
                                {{$city->city_name}}
                            </option>
                            @endforeach
                        </select>
                    </article>
                    <article>
                        <label for="direccion">Direccion <span class="ast">*</span></label>
                        <input type="text" id="direccion" name="address" value="{{old('address')}}">

                        @error('address')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="telefono">Telefono</label>
                        <input type="text" id="telefono" name="telephone" value="{{old('telephone')}}">
                        @error('telephone')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="celular">Celular <span class="ast">*</span></label>
                        <input type="text" id="number" name="phone_number" value="{{old('phone_number')}}">
                        @error('phone_number')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="email">Correo electronico <span class="ast">*</span></label>
                        <input type="email" id="email" name="email" value="{{old('email')}}">
                        @error('email')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="email">Contraseña <span class="ast">*</span></label>
                        <input type="password" id="em" name="password" value="{{old('password')}}">
                        @error('password')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                </section>

            </section>
            <button class="sub">Registrarse</button>
        </form>
    </main>
    @endsection
</body>

</html>