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
        $url = 'http://localhost:8080/artist/create';
        $response = Http::post($url,
                            [
                                'nombre' => 'Mon',
                                'apellido' =>  'Laferte',
                                'anio_debut' =>  '2003 '
                            ]
    );
        if ($response->getStatusCode() === 201) {
            print_r($response->json());
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
            print_r($response->json());
        } else{
            $error = json_decode($response->getBody(), true)['error'];
            printf('Hubo un error al asignar la productora: %s', $error);
        }
    }


    /*
        public function create(Request $request)
        {
            $response = Http::post('http://localhost:8080/artist/create',
                                [
                                    'nombre' => $request->post('nombre'),
                                    'apellido' => $request->post('apellido'),
                                    'anio_debut' => $request->post('anio_debut')
                                ]
        );
            print_r($response->status());
        }
    */
}