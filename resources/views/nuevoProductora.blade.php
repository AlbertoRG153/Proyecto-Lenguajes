<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Productora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <nav class="nav centrar">
        <img src="{{ asset('/img/estudio-de-grabacion.png') }}" alt="">
        <h1>Agregar Nueva Productora</h1>
        <a href="{{ route('producer.index') }}"><button type="button" class="btn btn-danger">Regresar</button></a>
    </nav>

    <form action="" method="POST">
        @csrf
        <div class="form ms-auto me-auto">

            <label for="">Nombre</label>
            <input type="text" name="" id="" placeholder="Nombre">

            <label for="">Año de Inicio</label>
            <input type="text" name="" id="" placeholder="Año de Inicio">

            <label for="">País de Origen</label>
            <input type="text" name="" id="" placeholder="País de Origen">

            <label for="">Codigo de Artista</label>
            <select name="artista" id="">                
                <option value="">1</option>                 
            </select>

            <button class="btn btn-primary">Guardar</button>
        </div>
    </form>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>