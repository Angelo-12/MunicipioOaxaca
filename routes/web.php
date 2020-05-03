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
    Route::post('insertar','Administrador\UsuarioController@insertar');
    Route::post('insertar_rol','Administrador\UsuarioController@insertar_rol');
    Route::get('mostrar','Administrador\UsuarioController@mostrar');
    Route::get('municipioEstado/{id}','Administrador\MunicipioController@listarMunicipios');

});

Route::group(['prefix' => 'Zonas'], function () {
    Route::get('index','Administrador\ZonaController@index');
});

Route::group(['prefix' => 'Organizaciones'], function () {
    Route::get('index','Administrador\OrganizacionesController@mostrar');
    Route::post('insertar','Administrador\OrganizacionesController@insertar');
    Route::post('editar','Administrador\OrganizacionesController@editar');
});

Route::group(['prefix' => 'Actividades'], function () {
    Route::get('comerciales/{id}','Administrador\ActividadesComercialesController@index');
});



Route::get('usuarios','Administrador\UsuarioController@mostrarUsuarios');
