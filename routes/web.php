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
    Route::get('municipioEstado/{id}','Administrador\MunicipioController@listarMunicipios');

});

Route::group(['prefix' => 'Zonas'], function () {
    Route::get('mostrar','Administrador\ZonaController@mostrar');
});

Route::group(['prefix' => 'Organizaciones'], function () {
    Route::get('mostrar','Administrador\OrganizacionesController@mostrar');
    Route::post('insertar','Administrador\OrganizacionesController@insertar');
    Route::post('editar','Administrador\OrganizacionesController@editar');
});

Route::group(['prefix' => 'Municipios'], function () {
    //Route::get('municipioEstado/{id}','Administrador\MunicipioController@listarMunicipios');
});



Route::get('usuarios','Administrador\UsuarioController@mostrarUsuarios');
