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
        $url = 'http://localhost:8080/artist/listar';
        $response = Http::get($url);

        $url2 = 'http://localhost:8080/gender/listar';
        $response2 = Http::get($url2);

        if ($response->ok() && $response2->ok()) {
            $artista = $response->json();
            $genero = $response2->json();
            return view('nuevoCancion', compact('artista','genero'));
        } else {
            printf('Hubo un error al encontrar los elementos');
        }
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

        $artistasSelec = $request->post('artistas');

        $generosSelec = $request->post('generos');
        $pe = implode(",", $generosSelec);
        error_log($pe);

        $response = Http::post('http://localhost:8080/song/create', $cancion);
        if ($response->getStatusCode() === 201) {


            
            $url2 = 'http://localhost:8080/song/listar';
            $response2 = Http::get($url2);
            try {
                if ($response2->ok()) {
                    $response3 = $response2->json();
                    $ultimoElemento = end($response3);
                    foreach ($artistasSelec as $item) {
                        $this->artToSong($item, $ultimoElemento['codigo']);
                    };
                    error_log("correcto");
                }
            } catch (\Exception $e) {
                error_log('Excepción capturada: ' . $e->getMessage());
            }

            $url3 = 'http://localhost:8080/song/listar';
            $response4 = Http::get($url3);
            if ($response2->ok()) {
                $response5 = $response4->json();
                $ultimoElemento = end($response5);
                foreach ($generosSelec as $item){
                $this->genderToSong($item, $ultimoElemento['codigo']);
                };
                error_log("correcto");
            } else {
                printf('Hubo un error al encontrar los elementos');
                error_log("Hubo un error al encontrar los elementos");
            }



            return $this->index();
        } else {
            printf($response);
        }
    }
}
