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

/* -- Vendas -- */
Route::get('/', 'VendasController@index')->name('vendas');
Route::post('/', 'VendasController@storeVendas');
Route::delete('/remover/{id}', 'VendasController@removerVendas');


/* -- Clientes -- */
Route::get('/clientes', 'VendasController@clientes')->name('clientes');
Route::post('/clientes', 'VendasController@storeClientes');


/* -- Produtos -- */
Route::get('/produtos', 'VendasController@produtos')->name('produtos');
Route::post('/produtos', 'VendasController@storeProdutos');


