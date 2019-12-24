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
    Route::get ('/', 'BanerempresaController@index');
    Route::get ('/create', 'BanerempresaController@create')->name('.create');
    Route::post('/', 'BanerempresaController@store')->name('.store');
    Route::get ('/{id}/edit', 'BanerempresaController@edit')->name('.edit');
    Route::post('/{id?}', 'BanerempresaController@store')->name('.update');
    //
    Route::get ('/{id}/delete', 'BanerempresaController@destroy')->name('.destroy');
    Route::get ('/trash', 'BanerempresaController@trash')->name('.trash');
    Route::get ('/{id}/restore', 'BanerempresaController@restore')->name('.restore');
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