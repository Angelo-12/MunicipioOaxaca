<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/**Envia un correo de verificacion para que los usuarios puedan acceder al sistema */
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['prefix' => 'Usuarios'], function () {
    Route::post('insertar','Administrador\UsuarioController@insertar');
    Route::post('editar','Administrador\UsuarioController@editar');
    Route::post('insertar_administrador','Administrador\UsuarioController@insertar_administrador');
    Route::post('insertar_rol','Administrador\UsuarioController@insertar_rol');
    Route::get('index','Administrador\UsuarioController@index');
    Route::get('municipioEstado/{id}','Administrador\MunicipioController@listarMunicipios');
    Route::get('perfil','Administrador\UsuarioController@perfil');
    Route::get('descargar_pdf','Administrador\UsuarioController@exportar_pdf_administrador');
    Route::get('descargar_csv','Administrador\UsuarioController@descargar_csv');
    Route::post('cambiar_foto/{id}','Administrador\UsuarioController@cambiar_foto_perfil');

});


Route::group(['prefix' => 'Secretarias'], function () {
    Route::get('index','Administrador\Administrador_SecretariaController@index');
    Route::get('municipioEstado/{id}','Administrador\MunicipioController@listarMunicipios');
    Route::post('insertar_secretaria','Administrador\UsuarioController@insertar_secretaria');
    Route::get('descargar_pdf','Administrador\UsuarioController@exportar_pdf_secretaria');
});

Route::group(['prefix' => 'Vendedores'], function () {
    Route::get('index','Administrador\VendedorController@index');
    Route::post('actualizar_password','Administrador\VendedorController@actualizar_password');
    Route::get('insertar','Administrador\VendedorController@insertar');
    Route::get('municipioEstado/{id}','Administrador\MunicipioController@listarMunicipios');
    Route::get('descargar_pdf','Administrador\VendedorController@descargar_pdf');
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
    Route::get('buscar/{dato}','Administrador\ZonaController@buscar');
    Route::get('detalle/{id}','Administrador\ZonaController@detalle');
    Route::get('descargar_pdf','Administrador\ZonaController@descargar_pdf');
    Route::get('descargar_pdf_detalle/{id}','Administrador\ZonaController@descargar_pdf_detalle');
    Route::get('descargar_excel','Administrador\ZonaController@descargar_excel');
    Route::get('descargar_excel_vendedor/{id}','Administrador\ZonaController@descargar_excel_vendedor');
    Route::get('buscar_vendedor/{id}/{dato}','Administrador\ZonaController@buscar_vendedor');
});

Route::group(['prefix' => 'Organizaciones'], function () {
    Route::get('index','Administrador\OrganizacionesController@index');
    Route::post('insertar','Administrador\OrganizacionesController@insertar');
    Route::post('editar','Administrador\OrganizacionesController@editar');
    Route::post('eliminar','Administrador\OrganizacionesController@eliminar');
    Route::get('detalle/{id}','Administrador\OrganizacionesController@detalle_organizacion');
    Route::get('buscar/{dato}','Administrador\OrganizacionesController@buscar');
    Route::get('buscar_vendedor/{id}/{dato}','Administrador\OrganizacionesController@buscar_vendedor');
    Route::get('vacio','Administrador\OrganizacionesController@vacio');
    Route::get('descargar_pdf','Administrador\OrganizacionesController@descargar_pdf');
    Route::get('descargar_pdf_detalle/{id}','Administrador\OrganizacionesController@descargar_pdf_detalle');
    Route::get('descargar_excel','Administrador\OrganizacionesController@descargar_excel');
    Route::get('descargar_excel_vendedor/{id}','Administrador\OrganizacionesController@descargar_excel_vendedor');
});

Route::group(['prefix' => 'Actividades'], function () {
    Route::get('index','Administrador\ActividadesComercialesController@index');
    Route::get('buscar/{dato}','Administrador\ActividadesComercialesController@buscar');
    Route::get('buscar_vendedor/{dato}/{id}','Administrador\ActividadesComercialesController@buscar_vendedor');
    Route::get('vacio','Administrador\ActividadesComercialesController@vacio');
    Route::get('detalle/{id}','Administrador\ActividadesComercialesController@detalles');
    Route::get('comerciales/{id}','Administrador\ActividadesComercialesController@index');
    Route::get('descargar_pdf','Administrador\ActividadesComercialesController@descargar_pdf');
    Route::get('descargar_pdf_detalle/{id}','Administrador\ActividadesComercialesController@descargar_pdf_detalle');
    Route::get('descargar_excel','Administrador\ActividadesComercialesController@descargar_excel');
    Route::get('descargar_excel_vendedor/{id}','Administrador\ActividadesComercialesController@descargar_excel_vendedor');
});

Route::group(['prefix' => 'Observaciones'], function () {
    Route::get('index','Administrador\ObservacionesController@index');
    Route::get('buscar/{dato}','Administrador\ObservacionesController@buscar');
    Route::get('seguimiento/{id}','Administrador\ObservacionesController@seguimiento');
    Route::post('responder','Administrador\ObservacionesController@responder_observacion');
    Route::get('descargar_pdf','Administrador\ObservacionesController@descargar_pdf');

});

Route::group(['prefix' => 'Agencia'], function () {
    Route::get('index','Administrador\AgenciasController@index');
    Route::get('vacio','Administrador\AgenciasController@vacio');
    Route::get('buscar/{dato}','Administrador\AgenciasController@buscar');
    Route::get('detalle/{id}','Administrador\AgenciasController@detalle');
    Route::get('detalle_agencia/{id}','Administrador\AgenciasController@detalle_agencia');
    Route::get('descargar_pdf','Administrador\AgenciasController@descargar_pdf');
    Route::get('descargar_pdf_colonias/{id}','Administrador\AgenciasController@descargar_pdf_colonias');
    Route::get('descargar_excel','Administrador\AgenciasController@descargar_excel');
    Route::get('descargar_excel_colonias/{id}','Administrador\AgenciasController@descargar_excel_colonias'); 
});


Route::group(['prefix' => 'Colonia'], function () {
    Route::get('detalle/{id}','Administrador\ColoniasController@detalle');
    Route::get('buscar/{id}/{dato}','Administrador\ColoniasController@buscar');
    Route::get('vacio/{id}','Administrador\ColoniasController@vacio');
});

Route::get('index','Administrador\LoginController@index');
Route::post('verificar','Administrador\LoginController@login')->name('verificar');