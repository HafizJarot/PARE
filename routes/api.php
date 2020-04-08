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

Route::group(['prefix' => 'pemilik'], function (){
    Route::post('register', 'v1\PemilikReklame\Auth\RegisterController@register');
    Route::post('login', 'v1\PemilikReklame\Auth\LoginController@login');
});
Route::group(['prefix' => 'penyewa'], function (){
    Route::post('register', 'v1\PenyewaReklame\Auth\RegisterController@register');
    Route::post('login', 'v1\PenyewaReklame\Auth\LoginController@login');
});