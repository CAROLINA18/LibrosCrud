<?php

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

//Para acceder a este grupo de rutas por favor hacerlo agregando el api key para evitar el error 401 
//ejemplo de url  http://localhost:8000/libro?api_key_laika=225a46ad-cb90-4801-8c64-dc2c00820b4a

//Route::group(["middleware" => "apikeylaika.validate"], function () {
    Route::resource('libro', 'LibroController');
    Route::resource('tipo_libro', 'TipoLibroController')->name('*','tipo_libro');
//});
