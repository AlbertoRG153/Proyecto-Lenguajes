<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artist', [ArtistaController::class, 'index'])->name('artist.index');
Route::get('/artist/save', [ArtistaController::class, 'create'])->name('artist.save');
Route::get('/artist/delete/{id}', [ArtistaController::class, 'delete'])->name('artist.delete');
Route::get('/artist/find/{id}', [ArtistaController::class, 'getByID'])->name('artist.find');
Route::get('/artist/{art}/producer/{prod}', [ArtistaController::class, 'prodToArt'])->name('artist.prodToArt');