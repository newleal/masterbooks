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
/////////////////////////Frontoffice///////////////////////////////////////////////
Route::get('/','frontoffice\PaginasController@inicio')->name('inicio');
//Route::get('/','frontoffice\PaginasController@detalle')->name('detalle');
/////////////////////////Backoffice////////////////////////////////////////////////
Route::resource('/productos','backoffice\ProductosController');
Route::get('/productos/{id}/inactivar','backoffice\ProductosController@inactivar')->name('productos.inactivar');
Route::get('/productos/{id}/activar','backoffice\ProductosController@activar')->name('productos.activar');
Route::get('/productos-pdf','backoffice\ProductosController@exportarPDF')->name('productos.pdf');
//	Route::get('/productos-exel','backoffice\ProductosController@exportarExcel')->name('productos.excel');

////////Usuarios/////////////////////////////////////////////////
Route::resource('/usuarios', 'backoffice\UsersController');
Route::get('/usuarios/{id}/activar', 'backoffice\UsersController@activar')->name('usuarios.activar');
Route::get('/usuarios/{id}/inactivar', 'backoffice\UsersController@inactivar')->name('usuarios.inactivar');

