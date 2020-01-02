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

Route::get('/', 'WebsiteController@home')->name('website.home');

Route::get('/empresa', 'WebsiteController@empresa')->name('website.empresa');

Route::get('/presupuesto', 'WebsiteController@presupuesto')->name('website.presupuesto');
Route::post('/presupuesto', 'WebsiteController@presupuestoStore');

Route::get('/contacto', 'WebsiteController@contacto')->name('website.contacto');
Route::post('/contacto', 'WebsiteController@contactoStore');

Route::get('/materiales', 'WebsiteController@materiales')->name('website.materiales');

Route::get('/matriceria-propia', 'WebsiteController@matriceria')->name('website.matriceria');

Route::get('/home', function () {
    return redirect()->route('adm.home');
});
Route::get('/login', function () {
    return redirect()->route('adm.login');
})->name('login');