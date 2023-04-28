<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductoraController extends Controller
{

    public function index()
    {
        $url = 'http://localhost:8080/producer/listar';
        $response = Http::get($url);
        if ($response->ok()) {
            $productora = $response->json();
            return view('productora', compact('productora'));
        } else {
            printf('Hubo un error al encontrar los producer');
        }
    }

    public function create(Request $request)
    {
        $productora = [
            'nombre' => $request->post('nombre'),
            'anio_inicio' =>  $request->post('anio_inicio'),
            'pais_origen' =>  $request->post('pais_origen')
        ];

        $response = Http::post('http://localhost:8080/producer/create', $productora);
        if ($response->getStatusCode() === 201) {
            return $this->index();
        } else {
            printf($response);
        }
    }

    public function update(Request $request)
    {
        $productora = [
            'codigo_productora' => $request->input('codigo'),
            'nombre' => $request->input('nombre'),
            'anio_inicio' =>  $request->input('anio_inicio'),
            'pais_origen' =>  $request->input('pais_origen')
        ];

        $url = 'http://localhost:8080/producer/edit';
        $response = Http::put($url, $productora);
        if ($response->getStatusCode() === 201) {
            return $this->index();
        } else {
            printf($response);
        }
    }


    public function delete($id)
    {
        $url = 'http://localhost:8080/producer/delete/' . $id;
        $response = Http::delete($url);
        if ($response->ok()) {
            return $this->index();
        } else {
            printf('Hubo un error al eliminar al producer');
        }
    }
    //! get by id como se trabajara 

    public function getByID($id)
    {
        $url = 'http://localhost:8080/producer/find/' . $id;

        $response = Http::get($url);

        if ($response->ok()) {
            $proArt=$response->json();
            return view('proArt', compact('proArt'));
        } else {
            printf('No se encontro el producer');
        }
    }

    public function edit($id)
    {
        $url = 'http://localhost:8080/producer/find/' . $id;
        $response = Http::get($url);

        if ($response->ok()) {
            $productora = $response->json();
            return view('editarProductora', compact('productora'));
        } else {
            printf('No se encontro el producer');
        }
    }

    public function save()
    {
        return view('nuevoProductora');
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
