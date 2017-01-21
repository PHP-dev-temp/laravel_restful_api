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

Route::match(['get', 'post'], '/user', [
	'uses' => 'ApiUserController@login'
]);

Route::get('movies', [
	'uses' => 'MovieController@getAllMovies',
	'middleware' => 'auth:api',
]);

Route::get('movie/{id}', [
	'uses' => 'MovieController@getMovie',
	'middleware' => 'auth:api',
]);

Route::post('movie', [
	'uses' => 'MovieController@createMovie',
	'middleware' => 'auth:api',
]);

Route::put('movie/{id}', [
	'uses' => 'MovieController@updateMovie',
	'middleware' => 'auth:api',
]);