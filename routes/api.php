<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/respuestas','Api\RespuestasController@store' )-> name('api.respuestas.store');
Route::get('/tiposusuario', 'Api\TiposUsuarioController@index')-> name('api.respuestas.store');