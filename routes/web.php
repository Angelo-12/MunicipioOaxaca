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
    Route::get('index','Administrador\UsuarioController@index');
    Route::get('municipioEstado/{id}','Administrador\MunicipioController@listarMunicipios');

});

Route::group(['prefix' => 'Vendedores'], function () {
    Route::get('index','Administrador\VendedorController@index');
});

Route::group(['prefix' => 'Permisos'], function () {
    Route::get('index/{nombre}','Administrador\PermisosController@index');
    Route::post('insertar','Administrador\PermisosController@insertar');
    Route::get('download/pdf/{nombre}','Administrador\PermisosController@exportarPdf');
});

Route::post('insertarAnuales','Administrador\AnualesController@insertarAnuales');

Route::group(['prefix' => 'Eventuales'], function () {
    Route::post('insertar','Administrador\EventualesController@insertar');
});

Route::group(['prefix' => 'Provisionales'], function () {
    Route::post('insertar','Administrador\ProvisionalesController@insertar');
});


Route::group(['prefix' => 'Zonas'], function () {
    Route::get('index','Administrador\ZonaController@index');
    Route::get('detalle_zona/{id}','Administrador\ZonaController@detalle_zona');
    Route::get('pagination', 'Administrador\ZonaController@fetch_data');
    Route::get('download/pdf','Administrador\ZonaController@exportarPdf');
});

Route::group(['prefix' => 'Organizaciones'], function () {
    Route::get('index','Administrador\OrganizacionesController@index');
    Route::post('insertar','Administrador\OrganizacionesController@insertar');
    Route::post('editar','Administrador\OrganizacionesController@editar');
});

Route::group(['prefix' => 'Actividades'], function () {
    Route::get('comerciales/{id}','Administrador\ActividadesComercialesController@index');
});

