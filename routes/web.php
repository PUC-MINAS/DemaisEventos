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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@evento');
Route::post('/home/confirmarPresenca', 'HomeController@confirmarPresenca');
Route::delete('/home/cancelarPresenca', 'HomeController@cancelarPresenca');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin/eventos', 'EventoController@index');
Route::get('/admin/eventos/create','EventoController@create')->name('eventos/create');
Route::post('/admin/eventos/', 'EventoController@store');
Route::get('/admin/eventos/{id}', 'EventoController@show');
Route::put('/admin/eventos/{id}', 'EventoController@update');
Route::delete('/admin/eventos/{id}', 'EventoController@destroy');

Route::get('/admin/presencas', 'PresencaController@index');