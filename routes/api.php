<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('crearUsuario','Administrador\UsuarioController@crearUsuario');

Route::group(['prefix'=>'Usuario'],function(){
    Route::get('listar','Administrador\UsuarioController@listarUsuarios');
    Route::get('iniciar/{nombre}','Administrador\UsuarioController@iniciarsesion');
    Route::get('listarorg','Administrador\UsuarioController@listarOrganizaciones');
    Route::get('deta/{nombre}','Administrador\UsuarioController@listarvendedoresorganizacion');
    Route::get('listarzona','Administrador\UsuarioController@listarzonascomerciales');
    Route::get('vendedoreslist','Administrador\UsuarioController@listarvendedores');
    Route::get('listarzonavendedor/{nombre}','Administrador\UsuarioController@listarvendedoreszonas');
    Route::get('listaractividades','Administrador\UsuarioController@listaractividadesbien');
});
