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
Route::get('/home', function () {
    return redirect()->route('adm.home');
});
Route::get('/login', function () {
    return redirect()->route('adm.login');
})->name('login');