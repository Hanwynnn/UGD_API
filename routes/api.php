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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/pengunjung', 'App\Http\Controllers\Api\PengunjungController@index');
// Route::post('/pengunjung', 'App\Http\Controllers\Api\PengunjungController@store');
// Route::get('/pengunjung/{id}', 'App\Http\Controllers\Api\PengunjungController@show');
// Route::put('/pengunjung/{id}', 'App\Http\Controllers\Api\PengunjungController@update');

    Route::get('/pengunjung', 'Api\PengunjungController@index');
    Route::post('/pengunjung', 'Api\PengunjungController@store');
    Route::get('/pengunjung/{id}', 'Api\PengunjungController@show');
    Route::put('/pengunjung/{id}', 'Api\PengunjungController@update');
    
    Route::get('/film', 'Api\FilmController@index');
    Route::post('/film', 'Api\FilmController@store');
    Route::get('/film/{id}', 'Api\FilmController@show');
    Route::put('/film/{id}', 'Api\FilmController@update');
    Route::delete('/film/{id}', 'Api\FilmController@destroy');
