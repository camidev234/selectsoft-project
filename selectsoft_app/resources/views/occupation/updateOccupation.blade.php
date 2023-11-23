<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Edición de Ocupación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="{{route('update_occupation',['id'=>$occupation->id])}}" method="post">
        @method('PUT')
        @csrf
        <h2>Edit Occupation</h2>
        <label for="occupation_code">Código de ocupación:</label>
        <input type="text" name="occupation_code" id="occupation_code" value="{{$occupation->occupation_code}}" >
        <label for="occupation_name">Nombre de ocupación:</label>
        <input type="text" name="occupation_name" id="occupation_name" value="{{$occupation->occupation_name}}">
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" value="{{$occupation->description}}">
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>