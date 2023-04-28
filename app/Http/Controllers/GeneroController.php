<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function Ramsey\Uuid\v1;

class GeneroController extends Controller
{
    public function index()
    {
        $url = 'http://localhost:8080/gender/listar';
        $response = Http::get($url);
        if ($response->ok()) {
            $genero = $response->json();
            return view('genero', compact('genero'));
        } else {
            printf('Hubo un error al encontrar los producer');
        }
    }

    public function create()
    {
        return view('nuevoGenero');
    }

    public function save(Request $request)
    {
        $genero = [
            'descripcion' => $request->post('genero')
        ];

        $response = Http::post('http://localhost:8080/gender/create', $genero);
        if ($response->getStatusCode() === 201) {
            return $this->index();
        } else {
            printf($response);
        }
    }

    public function delete($id)
    {
        $url = 'http://localhost:8080/gender/delete/' . $id;
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
        $url = 'http://localhost:8080/gender/find/' . $id;
        $response = Http::get($url);

        if ($response->ok()) {
            print_r($response->json());
        } else {
            printf('No se encontro el producer');
        }
    }

    public function edit($id)
    {
        $url = 'http://localhost:8080/gender/find/' . $id;
        $response = Http::get($url);
        // echo ($response);
        return view('editarGenero', compact('response'));
    }

    public function update(Request $request)
    {
        $genero = [
            'codigo' => $request->input('codigo'),
            'descripcion' => $request->input('descripcion')
        ];

        $url = 'http://localhost:8080/gender/edit';
        $response = Http::put($url, $genero);
        if ($response->getStatusCode() === 201) {
            return $this->index();
        } else {
            printf($response->status());
        }
    }
}
