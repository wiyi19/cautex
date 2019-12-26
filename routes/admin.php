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


Route::group([], function() {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group([
    'prefix' => 'banner',
    'as' => 'banner',
], function() {
    Route::get ('/', 'BannerController@index');
    Route::get ('/create', 'BannerController@create')->name('.create');
    Route::post('/', 'BannerController@store')->name('.store');
    Route::get ('/{id}/edit', 'BannerController@edit')->name('.edit');
    Route::post('/{id?}', 'BannerController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'BannerController@destroy')->name('.destroy');
    Route::get ('/trash', 'BannerController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'BannerController@restore')->name('.restore');
});


Route::group([
    'prefix' => 'soluciones',
    'as' => 'soluciones',
], function() {
    Route::get ('/', 'SolucionesController@index');
    Route::post('/store-textos', 'SolucionesController@storeTextos')->name('.textos.store');
    // Añadir items
    Route::get ('/create', 'SolucionesController@create')->name('.create');
    Route::post('/', 'SolucionesController@store')->name('.store');
    // Editar Items
    Route::get ('/{id}/edit', 'SolucionesController@edit')->name('.edit');
    Route::post('/{id?}', 'SolucionesController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'SolucionesController@destroy')->name('.destroy');
    Route::get ('/trash', 'SolucionesController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'SolucionesController@restore')->name('.restore');
});

Route::group([
    'prefix' => 'rubros',
    'as' => 'rubros',
], function() {
    Route::get ('/', 'RubrosController@index');
    Route::post('/store-textos', 'RubrosController@storeTextos')->name('.textos.store');
    // Añadir items
    Route::get ('/create', 'RubrosController@create')->name('.create');
    Route::post('/', 'RubrosController@store')->name('.store');
    // Editar Items
    Route::get ('/{id}/edit', 'RubrosController@edit')->name('.edit');
    Route::post('/{id?}', 'RubrosController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'RubrosController@destroy')->name('.destroy');
    Route::get ('/trash', 'RubrosController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'RubrosController@restore')->name('.restore');
});




Route::group([
    'prefix' => 'matrides',
    'as' => 'matrides',
], function() {
    Route::get ('/', 'MatridesController@index');
    Route::get ('/create', 'MatridesController@create')->name('.create');
    Route::post('/', 'MatridesController@store')->name('.store');
    Route::get ('/{id}/edit', 'MatridesController@edit')->name('.edit');
    Route::post('/{id?}', 'MatridesController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'MatridesController@destroy')->name('.destroy');
    Route::get ('/trash', 'MatridesController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'MatridesController@restore')->name('.restore');
});

/////==================================Empresa===============================================
Route::group([
    'prefix' => 'bannerempresa',
    'as' => 'bannerempresa',
], function() {
    Route::get ('/', 'BannerempresaController@index');
    Route::get ('/create', 'BannerempresaController@create')->name('.create');
    Route::post('/', 'BannerempresaController@store')->name('.store');
    Route::get ('/{id}/edit', 'BannerempresaController@edit')->name('.edit');
    Route::post('/{id?}', 'BannerempresaController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'BannerempresaController@destroy')->name('.destroy');
    Route::get ('/trash', 'BannerempresaController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'BannerempresaController@restore')->name('.restore');
});

Route::group([
    'prefix' => 'empresa',
    'as' => 'empresa',
], function() {
    Route::get ('/', 'EmpresaController@index');
    Route::get ('/create', 'EmpresaController@create')->name('.create');
    Route::post('/', 'EmpresaController@store')->name('.store');
    Route::get ('/{id}/edit', 'EmpresaController@edit')->name('.edit');
    Route::post('/{id?}', 'EmpresaController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'EmpresaController@destroy')->name('.destroy');
    Route::get ('/trash', 'EmpresaController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'EmpresaController@restore')->name('.restore');
});


Route::group([
    'prefix' => 'imagenempresa',
    'as' => 'imagenempresa',
], function() {
    Route::get ('/', 'ImagenempresaController@index');
    Route::get ('/create', 'ImagenempresaController@create')->name('.create');
    Route::post('/', 'ImagenempresaController@store')->name('.store');
    Route::get ('/{id}/edit', 'ImagenempresaController@edit')->name('.edit');
    Route::post('/{id?}', 'ImagenempresaController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'ImagenempresaController@destroy')->name('.destroy');
    Route::get ('/trash', 'ImagenempresaController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'ImagenempresaController@restore')->name('.restore');
});

/////================================Materiales======================================================
Route::group([
    'prefix' => 'materiales',
    'as' => 'materiales',
], function() {
    Route::get ('/', 'MaterialesController@index');
    Route::get ('/create', 'MaterialesController@create')->name('.create');
    Route::post('/', 'MaterialesController@store')->name('.store');
    Route::get ('/{id}/edit', 'MaterialesController@edit')->name('.edit');
    Route::post('/{id?}', 'MaterialesController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'MaterialesController@destroy')->name('.destroy');
    Route::get ('/trash', 'MaterialesController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'MaterialesController@restore')->name('.restore');
});



/////================================Matriceria Propia===============================================
Route::group([
    'prefix' => 'imagenmatriceria',
    'as' => 'imagenmatriceria',
], function() {
    Route::get ('/', 'ImagenmatriceriaController@index');
    Route::get ('/create', 'ImagenmatriceriaController@create')->name('.create');
    Route::post('/', 'ImagenmatriceriaController@store')->name('.store');
    Route::get ('/{id}/edit', 'ImagenmatriceriaController@edit')->name('.edit');
    Route::post('/{id?}', 'ImagenmatriceriaController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'ImagenmatriceriaController@destroy')->name('.destroy');
    Route::get ('/trash', 'ImagenmatriceriaController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'ImagenmatriceriaController@restore')->name('.restore');
});


Route::group([
    'prefix' => 'icono',
    'as' => 'icono',
], function() {
    Route::get ('/', 'IconoController@index');
    Route::get ('/create', 'IconoController@create')->name('.create');
    Route::post('/', 'IconoController@store')->name('.store');
    Route::get ('/{id}/edit', 'IconoController@edit')->name('.edit');
    Route::post('/{id?}', 'IconoController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'IconoController@destroy')->name('.destroy');
    Route::get ('/trash', 'IconoController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'IconoController@restore')->name('.restore');
});

Route::group([
    'prefix' => 'infomatriceria',
    'as' => 'infomatriceria',
], function() {
    Route::get ('/', 'InfomatriceriaController@index');
    Route::get ('/create', 'InfomatriceriaController@create')->name('.create');
    Route::post('/', 'InfomatriceriaController@store')->name('.store');
    Route::get ('/{id}/edit', 'InfomatriceriaController@edit')->name('.edit');
    Route::post('/{id?}', 'InfomatriceriaController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'InfomatriceriaController@destroy')->name('.destroy');
    Route::get ('/trash', 'InfomatriceriaController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'InfomatriceriaController@restore')->name('.restore');
});

Route::group([
    'prefix' => 'solicitudpre',
    'as' => 'solicitudpre',
], function() {
    Route::get ('/', 'SolicitudpreController@index');
    Route::get ('/create', 'SolicitudpreController@create')->name('.create');
    Route::post('/', 'SolicitudpreController@store')->name('.store');
    Route::get ('/{id}/edit', 'SolicitudpreController@edit')->name('.edit');
    Route::post('/{id?}', 'SolicitudpreController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'SolicitudpreController@destroy')->name('.destroy');
    Route::get ('/trash', 'SolicitudpreController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'SolicitudpreController@restore')->name('.restore');
});



Route::group([
    'prefix' => 'productohome',
    'as' => 'productohome',
], function() {
    Route::get ('/', 'ProductohomeController@index');
    Route::get ('/create', 'ProductohomeController@create')->name('.create');
    Route::post('/', 'ProductohomeController@store')->name('.store');
    Route::get ('/{id}/edit', 'ProductohomeController@edit')->name('.edit');
    Route::post('/{id?}', 'ProductohomeController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'ProductohomeController@destroy')->name('.destroy');
    Route::get ('/trash', 'ProductohomeController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'ProductohomeController@restore')->name('.restore');
});


Route::get('/', 'HomeController@index')->name('home');