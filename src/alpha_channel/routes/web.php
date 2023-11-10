<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\PostController@list');
Route::get('show/{id}', 'App\Http\Controllers\PostController@show');

Route::get('post/new', 'App\Http\Controllers\PostController@new');
Route::post('post/create', 'App\Http\Controllers\PostController@create');
Route::post('post/save', 'App\Http\Controllers\PostController@save');

Route::post('comment/create/{id}', 'App\Http\Controllers\CommentController@create');

Route::post('like/{id}', 'App\Http\Controllers\LikeController@like');
Route::post('like/{id}', 'App\Http\Controllers\LikeController@unlike');

