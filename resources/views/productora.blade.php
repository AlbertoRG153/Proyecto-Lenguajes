<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <nav class="nav centrar">
        <img src="{{ asset('/img/estudio-de-grabacion.png') }}" alt="">
        <h1>Productora</h1>
        <a href="{{ route('index') }}"><button type="button" class="btn btn-danger">Regresar</button></a>
    </nav>

    <div class="content">
        <table class="table table-dark table-hover ">
            <thead>
                <tr>
                    <th scope="col">codigoProductora</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Año Inicio</th>
                    <th scope="col">País de Origen</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($productora as $item)
                <tr>
                    <th scope="row">{{$item['codigo_productora'] }}</th>
                    <td>{{ $item['nombre'] }}</td>
                    <td>{{ $item['anio_inicio'] }}</td>
                    <td>{{ $item['pais_origen'] }}</td>
                    <td><a href="{{ route('producer.edit', $item['codigo_productora']) }}">Editar</a></td>
                    <td><a href="{{ route('producer.delete', $item['codigo_productora']) }}" onclick="return confirmDelete()">Eliminar</a></td>
                    <td>
                        <a type="button" class="btn btn-primary" href="{{ route('producer.find', $item['codigo_productora']) }}">Ver Mas
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('producer.guardar') }}" class="me-auto">
            <button type="button" class="btn btn-primary me-auto">Agregar Productora</button>
        </a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="verModal" tabindex="-1" aria-labelledby="verModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 font-principal" id="verModalLabel">Detalle Prodcutora (Codigo)</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- Tabla de Artista --}}
                    <h3 class="font-principal">Artista</h3>
                    <table class="table table-dark table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">codigoArtista</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Año Debut</th>                                
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cerrar</button>                   
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>