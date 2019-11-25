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

Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin/eventos', 'EventoController@index');
Route::get('/admin/eventos/create','EventoController@create')->name('eventos/create');
Route::post('/admin/eventos/', 'EventoController@store');
Route::get('/admin/eventos/{id}', 'EventoController@show');
Route::put('/admin/eventos/{id}', 'EventoController@update');