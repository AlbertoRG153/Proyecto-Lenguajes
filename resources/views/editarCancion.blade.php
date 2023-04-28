<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cancion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script>
    
    </script>
</head>

<body>
    <nav class="nav centrar">
        <img src="{{ asset('/img/disco-de-vinilo.png') }}" alt="">
        <h1>Editar Cancion</h1>
        <a href="{{ route('song.index') }}"><button type="button" class="btn btn-danger">Regresar</button></a>
    </nav>
    <form action="{{ route('song.update') }}" method="POST">
        
        @csrf
        @method('PUT')
        <div class="form ms-auto me-auto">
            <label for="">Codigo de Cancion</label>
            <input type="number" name="codigo" id="" placeholder="Codigo de Cancion" readonly value="{{ $detalle['codigo'] }}">

            <label for="">Titulo</label>
            <input type="text" name="titulo" id="" placeholder="Titulo" value="{{ $detalle['titulo'] }}">

            <label for="">Album</label>
            <input type="text" name="album" id="" placeholder="Album" value="{{ $detalle['album'] }}">

            <label for="">Duración</label>
            <input type="text" name="duracion" id="" placeholder="Duración" maxlength="8" value="{{ $detalle['duracion'] }}">

            <label for="">Selccione Artistas</label>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Artistas
                </button>
                <ul class="dropdown-menu dropdown-menu-dark mb-4">
                    @foreach ($artista as $item)
                    <li>
                        <div class="form-check">
                            <input class="form-check-input check" type="checkbox" value="{{ $item['codigo'] }}" id="artista{{ $item['codigo'] }}" name="artistas[]">
                            <label class="form-check-label" for="artista{{ $item['codigo'] }}">
                                "{{ $item['nombre'] . ' ' . $item['apellido'] }}"
                            </label>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
                
            <label for="" class="mt-4">Selccione Generos</label>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Géneros
                </button>
                <ul class="dropdown-menu dropdown-menu-dark mb-4">
                    @foreach ($genero as $item)
                    <li>
                        <div class="form-check">
                            <input class="form-check-input check" type="checkbox" value="{{ $item['codigo'] }}" id="genero{{ $item['codigo'] }}" name="generos[]">
                            <label class="form-check-label" for="genero{{ $item['codigo'] }}">
                                "{{ $item['descripcion'] }}"
                            </label>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <button class="btn btn-primary mt-5"  onclick="return confirmEdit()">Editar {{ $detalle['titulo'] }}</button>
        </div>
    </form>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>