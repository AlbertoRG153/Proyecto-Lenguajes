<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <nav class="nav centrar">
        <img src="{{ asset('/img/disco-de-vinilo.png') }}" alt="">
        <h1>Cancion</h1>
        <a href="{{ route('index') }}"><button type="button" class="btn btn-danger">Regresar</button></a>
    </nav>

    <div class="content">
        <table class="table table-dark table-hover ">
            <thead>
                <tr>
                    <th scope="col">codigoCancion</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Álbum</th>
                    <th scope="col">Duración</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($response as $item)
                <tr>                    
                    <th scope="row">{{$item['codigo']}}</th>
                    <td>{{$item['titulo'] }}</td>
                    <td>{{$item['album'] }}</td>
                    <td>{{$item['duracion'] }}</td>
                    <td><a href="{{ route('song.edit', $item['codigo']) }}">Editar</a></td>
                    <td><a href="{{ route('song.delete', $item['codigo']) }}" onclick="return confirmDelete()">Eliminar</a></td>
                    <td>
                        <a type="button" class="btn btn-primary"  href="{{ route('song.find', $item['codigo']) }}"> Ver Mas
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        
        <a href="{{ route('song.create') }}" class="me-auto">
            <button type="button" class="btn btn-primary me-auto">Agregar Cancion</button>
        </a>
    </div>






    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>