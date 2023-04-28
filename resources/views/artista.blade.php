<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <nav class="nav centrar">
        <img src="{{ asset('/img/cantante.png') }}" alt="">
        <h1>Artista</h1>
        <a href="{{ route('index') }}"><button type="button" class="btn btn-danger">Regresar</button></a>
    </nav>

    {{-- {{print_r($response);}} --}}
    <div class="content">
        <table class="table table-dark table-hover ">
            <thead>
                <tr>
                    <th scope="col">codigoArtista</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Año Debut</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($response as $item)
                <tr>
                    <th scope="row">{{ $item['codigo'] }}</th>
                    <td>{{ $item['nombre'] }}</td>
                    <td>{{ $item['apellido'] }}</td>
                    <td>{{ $item['anio_debut'] }}</td>
                    <td><a href="{{ route('artist.edit', $item['codigo']) }}">Editar</a></td>
                    <td><a href="{{ route('artist.delete', $item['codigo']) }}">Eliminar</a></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verModal">Ver Mas
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href={{ route('artist.create') }} class="me-auto">
            <button type="button" class="btn btn-primary">Agregar Artista</button>
        </a>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="verModal" tabindex="-1" aria-labelledby="verModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 font-principal" id="verModalLabel">Detalle Artista (Codigo)</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- Tabla de Canciones --}}
                    <h3 class="font-principal">Canciones</h3>
                    <table class="table table-dark table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">codigoCancion</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Álbum</th>
                                <th scope="col">Duración Debut</th>                                
                            </tr>
                        </thead>
                        <tbody>                            
                            <tr>
                                <th scope="row">1</th>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>                                
                            </tr>                           
                        </tbody>
                    </table>

                    {{-- Tabla de Productora --}}
                    <h3 class="font-principal">Productora</h3>
                    <table class="table table-dark table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">codigoProductora</th>
                                <th scope="col">Nombre</th>  
                                <th scope="col">Año Inicio</th>  
                                <th scope="col">País de Origen</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>                             
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>                   
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>