<?php

use Illuminate\Support\Facades\Route;
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
    return view('App');
});

Route::prefix('api')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::prefix('dado')->group(function () {
            Route::get('series', 'SerieController@index');
            Route::get('atencoes', 'AtencaoController@index');
        });
        Route::prefix('inscricao')->group(function () {
            Route::get('/', 'InscricaoController@index');
            Route::post('/', 'InscricaoController@store');
        });
        Route::prefix('enderecoinsc')->group(function () {
            Route::get('/{cod_insc}', 'EnderecoInscController@index');
            Route::post('/', 'EnderecoInscController@store');
        });
    });
});