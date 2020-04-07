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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'Usuarios'], function () {
    Route::post('insertar','UsuarioController@crearUsuario');
    Route::get('mostrar','Administrador\UsuarioController@mostrar');

});

Route::group(['prefix' => 'Zonas'], function () {
    Route::get('mostrar','Administrador\ZonaController@mostrar');
});

Route::get('usuarios','Administrador\UsuarioController@mostrarUsuarios');
