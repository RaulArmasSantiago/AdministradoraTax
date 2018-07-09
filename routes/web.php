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

Route::get('/newConcesion','ConcesionesController@verRegistro')->name('newConcesion');

Route::post('registrar','ConcesionesController@registrar');

Route::get('/index','ConcesionesController@index')->name('index');


Route::post('VerConcesion','ConcesionesController@show');

Route::get('/regConductor','ConcesionesController@viewRegConductor')->name('regConductor');

Route::post('pagar','ConcesionesController@pagar');

Route::post('regAssigConductor', 'ConcesionesController@regAssigConductor');

Route::post('asignar', 'ConcesionesController@asignar');