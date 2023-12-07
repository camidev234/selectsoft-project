<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createVacant.css')}}">
    <title>Crear vacante</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="createVacant">
        <h2>Crear vacante</h2>
    </section>
    <section class="content-form">
        <form action="{{route('vacancies.store', ['company' => $company->id])}}" method="POST">
            @csrf
            <label for="">Codigo de la vacante: </label>
            <input type="text" placeholder="Codigo" name="vacancie_code" value="{{old('vacancie_code')}}"><br>
            @error('vacancie_code')
            <span style="color: red;">{{$message}}</span><br><br>
            @enderror
            <label for="">Habilidades: </label><br>
            <textarea name="skills" id="" cols="30" rows="15">{{old('skills')}}</textarea><br>
            @error('skills')
            <span style="color: red;">{{$message}}</span><br><br>
            @enderror
            <label for="">Experiencia Requerida: </label>
            <input type="number" name="required_experience" id="" placeholder="Experiencia requerida" value="{{old('required_experience')}}"><br>
            @error('required_experience')
            <span style="color: red;">{{$message}}</span><br><br>
            @enderror
            <label for="">Rango Salarial</label><br>
            <input type="text" name="salary_range" id="" placeholder="Rango salarial" value="{{old('salary_range')}}"><br>
            @error('salary_range')
            <span style="color: red;">{{$message}}</span><br><b></b>
            @enderror
            <label for="">Numero de vacantes</label><br>
            <input type="text" name="number_vacancies" placeholder="Numero de vacantes" value="{{old('number_vacancies')}}"><br>
            @error('number_vacancies')
            <span style="color: red;">{{$message}}</span><br><br>
            @enderror
            <label for="">Cargo: </label><br>
            <select name="charge_id" id="">
                @forelse($charges as $charge)
                <option value="{{$charge->id}}">{{$charge->charge}}</option>
                @empty
                <option value="">No hay cargos creados aun</option>
                @endforelse
            </select><br>
            <label for="">Horario: </label><br>
            <input type="text" placeholder="Horario" name="schedule" value="{{old('schedule')}}"><br>
            @error('schedule')
            <span style="color: red;">{{$message}}</span><br><br>
            @enderror
            <label for="">Jornada Laboral: </label><br>
            <select name="work_day_id" id="">
                @foreach($days as $day)
                <option value="{{$day->id}}">{{$day->working_day}}</option>
                @endforeach
            </select><br>
            <label for="">Tipo de salario: </label><br>
            <select name="salaries_type_id" id="">
                @foreach($salaries as $salarie)
                <option value="{{$salarie->id}}">{{$salarie->salary_type}}</option>
                @endforeach
            </select><br>
            <label for="">Persona Solicitante: </label><br>
            <input type="text" name="applicant_person" placeholder="Persona Solcitante" value="{{old('applicant_person')}}"><br>
            @error('applicant_person')
            <span style="color: red;">{{$message}}</span><br><br>
            @enderror
            <label for="">Pais: </label><br>
            <select name="country_id" id="">
                @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->country_code}}-{{$country->country_name}}</option>
                @endforeach
            </select><br>
            <label for="">Ciudad: </label><br>
            <select name="city_id" id="">
                @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->city_name}}</option>
                @endforeach
            </select><br>
            <label for="">Anotaciones: </label><br>
            <textarea name="annotations" id="" cols="30" rows="15">{{old('annotations')}}</textarea><br>
            @error('annotations')
            <span style="color: red;">{{$message}}</span><br><br>
            @enderror
            <button>Crear Vacante</button>
        </form>
    </section>
    @endsection
</body>

</html>
