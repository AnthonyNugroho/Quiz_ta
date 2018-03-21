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

Route::get('/user', "UserController@all");

Route::get('user/{id}', "UserController@find  ");

Route::post('/user', "UserController@register");

Route::get('/user/delete/{id}',"UserController@delete");

Route::get('/item', "ItemController@all");

Route::get('/item/{id}',"ItemController@find");

Route::post('/item',"ItemController@register");

Route::get('/item/delete/{id}',"ItemController@delete");
