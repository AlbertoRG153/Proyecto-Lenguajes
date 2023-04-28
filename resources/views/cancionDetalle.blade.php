<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Cancion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <nav class="nav centrar">
        <img src="{{ asset('/img/disco-de-vinilo.png') }}" alt="">
        <h1>Cancion</h1>
        <a href="{{ route('song.index') }}"><button type="button" class="btn btn-danger">Regresar</button></a>
    </nav>

    <div class="content">
        
        <table class="table table-dark table-hover ">
            <thead>
                <tr>
                    <th scope="col">codigoCancion</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Álbum</th>
                    <th scope="col">Duración</th>
                </tr>
            </thead>
            <tbody>
                <tr>                    
                    <th scope="row">{{$detalle['codigo']}}</th>
                    <td>{{$detalle['titulo'] }}</td>
                    <td>{{$detalle['album'] }}</td>
                    <td>{{$detalle['duracion'] }}</td                   
                </tr>
                
            </tbody>
        </table>

        {{-- Tabla de Artistas --}}
        <h3 class="font-principal">Artistas</h3>
        <table class="table table-dark table-hover ">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Año Debut</th>                                
                </tr>               
            </thead>
            <tbody>                            
                <tr>
                    @foreach($artista as $item) 
                    <th scope="row"> {{$item['codigo']}}</th>
                    <td> {{$item['nombre']}}</td>
                    <td> {{$item['apellido']}}</td>
                    <td> {{$item['anio_debut']}}</td>  
                    @endforeach                               
                </tr>                           
            </tbody>
        </table>

        {{-- Tabla de Generos --}}
        <h3 class="font-principal">Generos</h3>
        <table class="table table-dark table-hover ">
            <thead>
                <tr>
                    <th scope="col">codigoGenero</th>
                    <th scope="col">Descripción</th>                               
                </tr>
            </thead>
            <tbody>
                @foreach($genero as $item)
                <tr>
                    <th scope="row">{{$item['codigo']}}/th>
                    <td>{{$item['descripcion']}}</td>                                
                </tr>
                @endforeach
            </tbody>
        </table>

    
    </div>



    

    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>