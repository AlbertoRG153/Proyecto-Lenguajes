<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <nav class="nav centrar">
        <img src="{{ asset('/img/cantante.png') }}" alt="">
        <h1>Editar Artista</h1>
        <a href="{{ route('artist.index') }}"><button type="button" class="btn btn-danger">Regresar</button></a>
    </nav>

    <form action="{{ route('artist.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form ms-auto me-auto">
            <label for="">Codigo de Artista</label>
            <input type="number" name="codigo" id="" placeholder="Codigo de Artista" readonly value="{{$artista['codigo']}}">

            <label for="">Nombre</label>
            <input type="text" name="nombre" id="" placeholder="Nombre" value="{{$artista['nombre']}}">

            <label for="">Apellido</label>
            <input type="text" name="apellido" id="" placeholder="Apellido" value="{{$artista['apellido']}}">

            <label for="">Año Debut</label>
            <input type="text" name="anio_debut" id="" placeholder="Año Debut" value="{{$artista['anio_debut']}}">

            
            <label for="">Productora</label>            
            <select name="productora" id="">
                <option value="">Select</option>
                @foreach ($productora as $item)                
                <option value="{{ $item['codigo_productora'] }}"> {{ $item['nombre'] }} </option>
                @endforeach
            </select>
            <button class="btn btn-primary" onclick="return confirmEdit()">Guardar</button>
        </div>
    </form>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>