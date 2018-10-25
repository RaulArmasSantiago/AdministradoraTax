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

Route::post('update/{concesion}','ConcesionesController@update');

Route::post('updateVehiculo/{concesion}','ConcesionesController@updateVehiculo');

Route::post('updConductor/{concesion}','ConcesionesController@updateConductor');

Route::get('/index','ConcesionesController@index')->name('index');

Route::any('VerConcesion','ConcesionesController@show');

Route::get('/regConductor','ConcesionesController@viewRegConductor')->name('regConductor');

Route::any('pagar','ConcesionesController@pagar');

Route::post('regConductor', 'ConcesionesController@regConductor');

Route::post('asignar', 'ConcesionesController@asignar');

Route::any('updateKm', 'ConcesionesController@updateKm');

Route::any('regReporte', 'ConcesionesController@regReporte');

Route::get('/corte', 'CorteController@index')->name('corte');

Route::any('searchReporte','CorteController@show');

Route::get('/inventario','InventarioController@index')->name('inventario');

Route::any('addProduct','InventarioController@addProduct');

Route::post('minusProduct','InventarioController@minusProduct');

Route::post('plusProduct','InventarioController@plusProduct');

Route::get('editConcesion/{concesion}', ['as' => 'edit.concesion','uses' => 'ConcesionesController@editConcesion']);

Route::get('/ventas','VentasController@index')->name('ventas');

Route::any('addVenta','VentasController@addVenta');

Route::any('filtrarVentas','VentasController@show');