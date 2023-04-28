<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArtistaController extends Controller{


    public function index()
    {
        $url = 'http://localhost:8080/artist/listar';
        $response2 = Http::get($url);
        if ($response2->ok()) {
            $response = $response2->json();
            return view('artista',compact('response',));
        } else{
            printf('Hubo un error al encontrar los artistas');
        }
    }

    public function create()
    {
        $url = 'http://localhost:8080/producer/listar';
        $response = Http::get($url);
        if ($response->ok()) {
            $productora =$response->json();
            return view ('nuevoArtista', compact('productora'));
        } else{
            printf('Hubo un error al encontrar los producer');
        }
    }

    public function save(Request $request)
    {
        $url = 'http://localhost:8080/artist/create';

        $response = Http::post($url,
                            [
                                'nombre' => $request->nombre,
                                'apellido' =>  $request->apellido,
                                'anio_debut' =>  $request->anio_debut
                            ]
    );
        if ($response->getStatusCode() === 201) {
            $url2 = 'http://localhost:8080/artist/listar';
            $response2 = Http::get($url2);
            if ($response2->ok()) {
                $response3 = $response2->json();
                $ultimoElemento = end($response3);
                $this->prodToArt($ultimoElemento['codigo'], $request->productora);
                error_log("correcto");
            } else{
                printf('Hubo un error al encontrar los artistas');
                error_log("Hubo un error al encontrar los artistas");
            }
            return $this->index();
        } else{
            printf('Hubo un error al guardar al artista');
        }  

    }



    public function edit($id)
    {
        $url = 'http://localhost:8080/artist/find/'.$id;
        $response = Http::get($url);
        $artista = $response->json();

        $url2 = 'http://localhost:8080/producer/listar';
        $response2 = Http::get($url2);
        $productora = $response2->json();

        return view('editarArtista',compact('artista','productora'));

    }


    public function update(Request $request)
    {
        $url = 'http://localhost:8080/artist/edit';

        $response = Http::put($url,
                            [
                                'codigo' => $request->codigo,
                                'nombre' => $request->nombre,
                                'apellido' =>  $request->apellido,
                                'anio_debut' =>  $request->anio_debut
                            ]
    );
        if ($response->getStatusCode() === 201) {
            $url2 = 'http://localhost:8080/artist/listar';
            $response2 = Http::get($url2);
            if ($response2->ok()) {
                $response3 = $response2->json();
                $ultimoElemento = end($response3);
                $this->prodToArt($ultimoElemento['codigo'], $request->productora);
                error_log("correcto");
            } else{
                printf('Hubo un error al encontrar los artistas');
                error_log("Hubo un error al encontrar los artistas");
            }
            return $this->index();
        } else{
            printf('Hubo un error al guardar al artista');
        }  

    }


    public function delete($id)
    {
        $url = 'http://localhost:8080/artist/delete/'.$id;
        $response = Http::delete($url);
        if ($response->ok()) {
            return $this->index();
        } else{
            printf('Hubo un error al eliminar al artista');
        }

        print_r($response->status());
    }

    public function getByID($id)
    {
        $url = 'http://localhost:8080/artist/find/'.$id;
        $response = Http::get($url);

        if ($response->ok()) {
            print_r($response->json());
        } else{
            printf('No se encontro el artista');
        }
        
    }

    public function prodToArt($art, $prod)
    {   
        $url = 'http://localhost:8080/artist/' . $art . '/producer/' . $prod;
        $response = Http::put($url);
        if ($response->ok()) {
        } else{
            $error = json_decode($response->getBody(), true)['error'];
            printf('Hubo un error al asignar la productora: %s', $error);
        }
    }

    public function showProducer(){

        

    }
}