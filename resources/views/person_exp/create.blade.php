<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createEducation.css')}}">
    <title>Nueva Experiencia Laboral</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <main class="container">
        <form action="{{route('exp.store')}}" method="post" class="form">
            @csrf
            <label for="company_experience">Empresa <span class="ast">*</span></label><br>
            <input type="text" placeholder="Empresa" name="company_experience" value="{{old('company_experience')}}"><br>
            @error('company_experience')
            <span style="color:red;">{{$message}}</span>
            <br>
            @enderror
            <label for="">Area de desempeño <span class="ast">*</span></label><br>
            <select name="work_area_id" id="">
                @foreach($work_areas as $work_area)
                <option value="{{$work_area->id}}">{{$work_area->work_area}}</option>
                @endforeach
            </select>
            <label for="">Cargo Desempeñado <span class="ast">*</span></label><br>

            <input type="text" placeholder="Cargo" name="job" value="{{old('job')}}">
            @error('job')
            <span style="color: red;">{{$message}}</span><br>
            @enderror
            <section class="dates">
                <section class="startDate">
                    <label for="months_experience">Fecha de Inicio <span class="ast">*</span></label><br>
                    <input type="date" name="start_date" id="" value="{{old('start_date')}}">
                    @error('start_date')
                    <span style="color: red;">{{$message}}</span><br>
                    @enderror
                </section>
                <section class="finishDate">
                    <label for="months_experience">Fecha de Fin <span class="ast">*</span></label><br>
                    <input type="date" name="finish_date" id="" value="{{old('finish_date')}}">
                    @error('finish_date')
                    <span style="color: red;">{{$message}}</span><br>
                    @enderror
                </section>
            </section>
            <label for="">Funciones Desempeñadas <span class="ast">*</span></label><br>

            <textarea type="text" name="functions" placeholder="Funciones" rows="15">{{old('functions')}}</textarea><br>
            @error('functions')
            <span style="color: red;">{{$message}}</span><br>
            @enderror
            <button>Añadir Experiencia <i class="bi bi-floppy2-fill"></i></button>
        </form>
    </main>
    @endsection
</body>

</html>