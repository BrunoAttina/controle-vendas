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

Route::get('/', 'VendasController@index')->name('vendas');
Route::get('/clientes', 'VendasController@clientes')->name('clientes');
Route::get('/produtos', 'VendasController@produtos')->name('produtos');

Route::post('/', 'VendasController@storeVendas');
Route::post('/clientes', 'VendasController@storeClientes');
Route::post('/produtos', 'VendasController@storeProdutos');


