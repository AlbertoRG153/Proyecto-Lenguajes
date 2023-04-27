<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>

<body>

    <nav class="nav centrar">
        <h1>Mantenimiento</h1>
    </nav>

    <div class="content">
        <a href="{{ route('artist.index') }}">
            <div class="tarjeta centrar">
                <h1>Artista</h1>
                <img src="{{ asset('/img/cantante.png') }}" alt="">
            </div>
        </a>

        <a href="{{ route('artist.index') }}"> {{-- ruta temporal mientras se crean los controladores --}}
            <div class="tarjeta centrar">
                <h1>Cancion</h1>
                <img src="{{ asset('/img/disco-de-vinilo.png') }}" alt="">
            </div>
        </a>

        <a href="{{ route('artist.index') }}"> {{-- ruta temporal mientras se crean los controladores --}}
            <div class="tarjeta centrar">
                <h1>Genero</h1>
                <img src="{{ asset('/img/musical.png') }}" alt="">
            </div>

        </a>

        <a href="{{ route('producer.index') }}">
            <div class="tarjeta centrar">
                <h1>Productora</h1>
                <img src="{{ asset('/img/estudio-de-grabacion.png') }}" alt="">
            </div>
        </a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>