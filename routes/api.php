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


Route::group(['prefix' => 'v1'], function(){

    Route::post('logon', 'Api\SigninController@logon');
    Route::post('logout', 'Api\SigninController@logout');

    Route::group([], function(){
        // Middlewares definidas nos controllers
        Route::resource('users', 'Api\UsersController');
        Route::resource('news', 'Api\NewsController');

    });

});
