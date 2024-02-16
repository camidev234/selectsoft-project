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
    <main class="flex-container">
        <form action="{{route('user.store')}}" method="post" class="registration-form">
            @csrf
            <section id="datos_personales" class="personal-info-section">
                <article class="section-title">
                    <h2>DATOS PERSONALES</h2>
                </article>
                <section class="info">
                    <article>
                        <label for="nombres">Nombres</label>
                        <input type="text" id="nombres" name="name" value="{{old('name')}}" class="input-field">
                        @error('name')
                        <span class="error-message">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="apellidos">Apellidos</label>
                        <input type="text" id="apellidos" name="last_name" value="{{old('last_name')}}" class="input-field">
                        @error('last_name')
                        <span class="error-message">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="birthdate" value="{{old('birthdate')}}" class="input-field">
                        @error('birthdate')
                        <span class="error-message">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="tipo_documento">Tipo de documento</label>
                        <select id="tipo_documento" name="document_type_id" class="select-field">
                            @foreach($document_types as $dct)
                            <option value="{{ $dct->id }}" {{ $dct->id == old('document_type_id') ? 'selected' : '' }}>{{ $dct->document_type }}</option>
                            @endforeach
                        </select>
                    </article>
                    <article>
                        <label for="numero_documento">Numero de documento</label>
                        <input type="text" id="numero_documento" name="number_document" value="{{old('number_document')}}" class="input-field">
                        @error('number_document')
                        <span class="error-message">{{$message}}</span>
                        @enderror
                    </article>
                </section>
            </section>
            <section id="ubicacion" class="location-section">
                <article class="section-title">
                    <h2>UBICACIÓN</h2>
                </article>
                <section class="info">
                    <article>
                        <label for="pais">Pais</label>
                        <select name="id_country" id="pais" class="select-field">
                            @forelse($countries as $country)
                            <option value="{{ $country->id }}" {{ $country->id == old('id_country') ? 'selected' : '' }}>
                                {{ $country->country_code }}-{{ $country->country_name }}
                            </option>
                            @empty
                            <option value="">No hay paises en el sistema</option>
                            @endforelse
                        </select>
                    </article>
                    <article>
                        <label for="departamento">Departamento</label>
                        <select name="id_department" id="departamento" class="select-field">
                            @foreach($departaments as $dpto)
                            <option value="{{$dpto->id}}" {{ $dpto->id == old('id_department') ? 'selected' : '' }}>
                                {{$dpto->departament_name}}
                            </option>
                            @endforeach
                        </select>
                    </article>
                    <article>
                        <label for="ciudad">Ciudad</label>
                        <select name="id_city" id="ciudad" class="select-field">
                            @foreach($cities as $city)
                            <option value="{{$city->id}}" {{ $city->id == old('id_city') ? 'selected' : '' }}>
                                {{$city->city_name}}
                            </option>
                            @endforeach
                        </select>
                    </article>
                    <article>
                        <label for="direccion">Direccion</label>
                        <input type="text" id="direccion" name="address" value="{{old('address')}}" class="input-field">

                        @error('address')
                        <span class="error-message">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="telefono">Telefono</label>
                        <input type="text" id="telefono" name="telephone" value="{{old('telephone')}}" class="input-field">
                        @error('telephone')
                        <span class="error-message">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="celular">Celular</label>
                        <input type="text" id="celular" name="phone_number" value="{{old('phone_number')}}" class="input-field">
                        @error('phone_number')
                        <span class="error-message">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="email">Correo electronico</label>
                        <input type="email" id="email" name="email" value="{{old('email')}}" class="input-field">
                        @error('email')
                        <span class="error-message">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" value="{{old('password')}}" class="input-field">
                        @error('password')
                        <span class="error-message">{{$message}}</span>
                        @enderror
                    </article>
                </section>

            </section>
            <button class="submit-button">Registrarse</button>
        </form>
    </main>
    @endsection
</body>

</html>
