<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function () {
    //Route::resource('movie', 'MovieController');
    Route::get('movie', 'MovieController@index');
    Route::get('movie/{id}', 'MovieController@show');
    Route::post('movie', 'MovieController@store');
    Route::match(['patch', 'put'],'movie/{id}', 'MovieController@update');
});

Route::match(['get', 'post'], 'get_api_token', 'ApiLoginController@index');