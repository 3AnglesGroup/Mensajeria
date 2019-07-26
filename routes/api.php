<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('paquetes','PaqueteController@index');
Route::post('paquete','PaqueteController@crear');
Route::get('paquete/{id}','PaqueteController@detalle');

//Cliente
Route::post('cliente','ClienteController@store');
Route::get('clientes','ClienteController@index');
//Producto
Route::post('producto','ProductoController@store');
Route::get('productos','ProductoController@index');

