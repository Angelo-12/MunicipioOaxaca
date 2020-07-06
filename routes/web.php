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

/**Envia un correo de verificacion para que los usuarios puedan acceder al sistema */
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['prefix' => 'Usuarios'], function () {
    Route::post('insertar','Administrador\UsuarioController@insertar');
    Route::post('insertar_administrador','Administrador\UsuarioController@insertar_administrador');
    Route::post('insertar_rol','Administrador\UsuarioController@insertar_rol');
    Route::get('index','Administrador\UsuarioController@index');
    Route::get('municipioEstado/{id}','Administrador\MunicipioController@listarMunicipios');
    Route::get('perfil','Administrador\UsuarioController@perfil');
    Route::post('cambiar_foto/{id}','Administrador\UsuarioController@cambiar_foto_perfil');
});


Route::group(['prefix' => 'Secretarias'], function () {
    Route::get('index','Administrador\Administrador_SecretariaController@index');
    Route::get('municipioEstado/{id}','Administrador\MunicipioController@listarMunicipios');
    Route::post('insertar_secretaria','Administrador\UsuarioController@insertar_secretaria');
});

Route::group(['prefix' => 'Vendedores'], function () {
    Route::get('index','Administrador\VendedorController@index');
    Route::get('insertar','Administrador\VendedorController@insertar');
    Route::get('municipioEstado/{id}','Administrador\MunicipioController@listarMunicipios');
});

Route::group(['prefix' => 'Permisos'], function () {
    Route::get('index/{nombre}','Administrador\PermisosController@index');
    Route::post('insertar','Administrador\PermisosController@insertar');
    Route::get('detalle/{id}','Administrador\PermisosController@detalle_permiso');
    Route::get('download/pdf/{nombre}','Administrador\PermisosController@exportarPdf');
});

Route::post('insertarAnuales','Administrador\AnualesController@insertarAnuales');

Route::group(['prefix' => 'Eventuales'], function () {
    Route::post('insertar','Administrador\EventualesController@insertar');
});

Route::group(['prefix' => 'Provisionales'], function () {
    Route::post('insertar','Administrador\ProvisionalesController@insertar');
});

Route::group(['prefix' => 'Sanciones'], function () {
    Route::post('insertar','Administrador\SuspensionesController@insertar');
});

Route::group(['prefix' => 'Cancelaciones'], function () {
    Route::post('insertar','Administrador\CancelacionesController@insertar');
});

Route::group(['prefix' => 'Revalidaciones'], function () {
    Route::post('insertar','Administrador\ReevalidacionesController@insertar');
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
    Route::get('detalle/{id}','Administrador\OrganizacionesController@detalle_organizacion');
});

Route::group(['prefix' => 'Actividades'], function () {
    Route::get('comerciales/{id}','Administrador\ActividadesComercialesController@index');
});

Route::group(['prefix' => 'Observaciones'], function () {
    Route::get('index','Administrador\ObservacionesController@index');
    Route::get('seguimiento/{id}','Administrador\ObservacionesController@seguimiento');
    Route::post('responder','Administrador\ObservacionesController@responder_observacion');
});

Route::get('index','Administrador\LoginController@index');
Route::post('verificar','Administrador\LoginController@login')->name('verificar');