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

Route::get('/', 'HomeController@index')->name('home');