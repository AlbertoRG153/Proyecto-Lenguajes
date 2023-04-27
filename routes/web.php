<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\ProductoraController;

/*

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//De vuelve las vista de cada funcion 
Route::get('/', function () {
    return view('index');
})->name('index');

/* Route::get('/artista', function () {
    return view('artista');
});

Route::get('/cancion', function () {
    return view('cancion');
});

Route::get('/genero', function () {
    return view('genero');
}); */

//Rutas Productora
Route::get('/producer', [ProductoraController::class, 'index'])->name('producer.index');
Route::get('/producer/save', [ProductoraController::class, 'create'])->name('producer.save');
Route::get('/producer/delete/{id}', [ProductoraController::class, 'delete'])->name('producer.delete');
Route::get('/producer/find/{id}', [ProductoraController::class, 'getByID'])->name('producer.find');
Route::get('/producer/edit/{id}', [ProductoraController::class, 'edit'])->name('producer.edit');
Route::get('/producer/guardar', [ProductoraController::class, 'save'])->name('producer.guardar');
//Rutas aRTISTA
Route::get('/artist', [ArtistaController::class, 'index'])->name('artist.index');
Route::get('/artist/create', [ArtistaController::class, 'create'])->name('artist.create');
Route::get('/artist/edit', [ArtistaController::class, 'edit'])->name('artist.edit');
Route::post('/artist/save', [ArtistaController::class, 'save'])->name('artist.save');
Route::get('/artist/delete/{id}', [ArtistaController::class, 'delete'])->name('artist.delete');
Route::get('/artist/find/{id}', [ArtistaController::class, 'getByID'])->name('artist.find');
Route::get('/artist/{art}/producer/{prod}', [ArtistaController::class, 'prodToArt'])->name('artist.prodToArt');
