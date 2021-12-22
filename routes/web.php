<?php

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
    return view('welcome');
});
// route cho post
Route::prefix('post')->group(function () {

    // mot nhieu
    Route::get('insert', 'PostController@insert');
    Route::get('/', 'PostController@index');

    // nhieu nhieu
    Route::get('insert/tags', 'PostController@insertTags');
    Route::get('update/tags', 'PostController@updateTags');
    Route::get('tags', 'PostController@getTags');
});
// route cho cmt
Route::prefix('comment')->group(function () {
    Route::get('/', 'CommentController@index');
});

