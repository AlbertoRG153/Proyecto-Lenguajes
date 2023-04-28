<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CancionController extends Controller
{


    public function index()
    {
        $url = 'http://localhost:8080/song/listar';
        $response2 = Http::get($url);
        if ($response2->ok()) {
            $response = $response2->json();
            return view('cancion', compact('response'));
        } else {
            printf('Hubo un error al encontrar las canciones');
        }
    }

    public function create()
    {
        return view('nuevoCancion');
    }

    public function edit($id)
    {
        $response = $this->getByID($id);
        return view('editarCancion', compact('response'));
    }

    public function update(Request $request)
    {
        $cancion = [
            'codigo' => $request->input('codigo'),
            'titulo' => $request->input('titulo'),
            'album' => $request->input('album'),
            'duracion' => $request->input('duracion')
        ];

        $url = 'http://localhost:8080/song/edit';
        $response = Http::put($url, $cancion);
        if ($response->getStatusCode() === 201) {
            return $this->index();
        } else {
            printf($response->status());
        }
    }

    public function delete($id)
    {
        $url = 'http://localhost:8080/song/delete/' . $id;
        $response = Http::delete($url);
        if ($response->ok()) {
            return $this->index();
        } else {
            printf('Hubo un error al eliminar la cancion');
        }

        print_r($response->status());
    }

    public function getByID($id)
    {
        $url = 'http://localhost:8080/song/find/' . $id;
        $response = Http::get($url);

        if ($response->ok()) {
            $detalle = $response->json();
            $artista = $detalle['artistas'];
            $genero = $detalle['generos'];
            return view('cancionDetalle', compact('detalle', 'artista', 'genero'));
        } else {
            printf('No se encontro la cancion');
        }
    }

    public function artToSong($art, $song)
    {
        $url = 'http://localhost:8080/song/' . $song . '/assign/' . $art;
        $response = Http::put($url);
        if ($response->ok()) {
            echo '<script>alert("Se ha agregado el artista a la cancion");</script>';
        } else {
            $error = json_decode($response->getBody(), true)['error'];
            printf('Hubo un error al asignar la productora: %s', $error);
        }
    }

    public function genderToSong($gend, $song)
    {
        $url = 'http://localhost:8080/song/' . $song . '/addGender/' . $gend;
        $response = Http::put($url);
        if ($response->ok()) {
            echo '<script>alert("Se ha agregado el genero a la cancion");</script>';
        } else {
            $error = json_decode($response->getBody(), true)['error'];
            printf('Hubo un error al asignar la productora: %s', $error);
        }
    }


    public function save(Request $request)
    {
        $cancion = [
            'titulo' => $request->post('titulo'),
            'album' => $request->post('album'),
            'duracion' => $request->post('duracion')
        ];

        $response = Http::post('http://localhost:8080/song/create', $cancion);
        if ($response->getStatusCode() === 201) {
            return $this->index();
        } else {
            printf($response);
        }
    }
}
