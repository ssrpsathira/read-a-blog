<?php

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');

/**
 * Uncomment the following routes when switching to blade.php frontend
 */

//Route::get('/', 'Post\ReaderController@index')->name('reader.index');
//Route::get('/read/{id}', 'Post\ReaderController@readPost')->name('reader.read');
//
//Auth::routes();
//
//Route::get('/home', 'Post\HomeController@index')->name('home');
//Route::get('/admin/post', 'Post\HomeController@getPostForm')->name('post.form');
//Route::post('/admin/post', 'Post\HomeController@createPost')->name('post.form');
//Route::get('/admin/post/details/{id}', 'Post\HomeController@getPost')->name('post.details');
//Route::get('/admin/post/edit/{id}', 'Post\HomeController@editPost')->name('post.edit');
//Route::post('/admin/post/edit/{id}', 'Post\HomeController@updatePost')->name('post.update');
//Route::get('/admin/post/delete/{id}', 'Post\HomeController@deletePost')->name('post.delete');
