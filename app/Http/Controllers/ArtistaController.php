<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArtistaController extends Controller{

    public function index()
    {
        $response = Http::get('http://localhost:8080/artist/listar');
        if ($response->ok()) {
            print_r($response->json());
        } else{
            printf('Hubo un error al encontrar los artistas');
        }
    }

    public function create()
    {
        $response = Http::post('http://localhost:8080/artist/create',
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
        $response = Http::delete('http://localhost:8080/artist/delete/'.$id);
        if ($response->ok()) {
            printf('Se ha eliminado correctamente');
        } else{
            printf('Hubo un error al eliminar al artista');
        }

        print_r($response->status());
    }

    public function getByID($id)
    {
        $response = Http::get('http://localhost:8080/artist/find/'.$id);

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