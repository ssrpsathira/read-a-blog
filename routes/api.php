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

Route::post('/post/create', 'Post\PostController@create');
Route::get('/post/get/{id}', 'Post\PostController@edit');
Route::get('/post/edit/{id}', 'Post\PostController@edit');
Route::post('/post/update/{id}', 'Post\PostController@update');
Route::delete('/post/delete/{id}', 'Post\PostController@delete');
Route::get('/posts', 'Post\PostController@index');

Route::post('auth/login', 'Auth\AuthController@login');

Route::group(['middleware' => 'jwt.auth'], function(){
    Route::get('auth/user', 'Auth\AuthController@user');
    Route::post('auth/logout', 'Auth\AuthController@logout');
});

Route::group(['middleware' => 'jwt.refresh'], function(){
    Route::get('auth/refresh', 'Auth\AuthController@refresh');
});