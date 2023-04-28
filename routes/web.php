<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\ProductoraController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\GeneroController;

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

//Rutas Productora
Route::get('/producer', [ProductoraController::class, 'index'])->name('producer.index');
Route::get('/producer/save', [ProductoraController::class, 'create'])->name('producer.save');
Route::post('/producer/create', [ProductoraController::class, 'create'])->name('producer.create');
Route::put('/producer/update', [ProductoraController::class, 'update'])->name('producer.update');
Route::get('/producer/delete/{id}', [ProductoraController::class, 'delete'])->name('producer.delete');
Route::get('/producer/find/{id}', [ProductoraController::class, 'getByID'])->name('producer.find');
Route::get('/producer/edit/{id}', [ProductoraController::class, 'edit'])->name('producer.edit');
Route::get('/producer/guardar', [ProductoraController::class, 'save'])->name('producer.guardar');
//Rutas Artista
Route::get('/artist', [ArtistaController::class, 'index'])->name('artist.index');
Route::get('/artist/create', [ArtistaController::class, 'create'])->name('artist.create');
Route::get('/artist/edit/{id}', [ArtistaController::class, 'edit'])->name('artist.edit');
Route::put('/artist/update', [ArtistaController::class, 'update'])->name('artist.update');
Route::post('/artist/save', [ArtistaController::class, 'save'])->name('artist.save');
Route::get('/artist/delete/{id}', [ArtistaController::class, 'delete'])->name('artist.delete');
Route::get('/artist/find/{id}', [ArtistaController::class, 'getByID'])->name('artist.find');
Route::get('/artist/{art}/producer/{prod}', [ArtistaController::class, 'prodToArt'])->name('artist.prodToArt');
//Rutas Cancion
Route::get('/song', [CancionController::class, 'index'])->name('song.index');
Route::get('/song/create', [CancionController::class, 'create'])->name('song.create');
Route::get('/song/edit/{id}', [CancionController::class, 'edit'])->name('song.edit');
Route::put('/song/update', [CancionController::class, 'update'])->name('song.update');
Route::post('/song/save', [CancionController::class, 'save'])->name('song.save');
Route::get('/song/delete/{id}', [CancionController::class, 'delete'])->name('song.delete');
Route::get('/song/find/{id}', [CancionController::class, 'getByID'])->name('song.find');
Route::get('/song/{song}/artist/{art}', [CancionController::class, 'artToSong'])->name('song.artToSong');
Route::get('/song/{song}/gender/{gend}', [CancionController::class, 'genderToSong'])->name('song.genderToSong');
//Rutas de Genero
Route::get('/gender', [GeneroController::class, 'index'])->name('gender.index');
Route::get('/gender/create', [GeneroController::class, 'create'])->name('gender.create');
Route::post('/gender/save', [GeneroController::class, 'save'])->name('gender.save');
Route::get('/gender/delete/{id}', [GeneroController::class, 'delete'])->name('gender.delete');
Route::get('/gender/edit/{id}', [GeneroController::class, 'edit'])->name('gender.edit');
Route::put('/gender/update', [GeneroController::class, 'update'])->name('gender.update');
