<?php

use Illuminate\Support\Facades\Route;

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
  
   return redirect()->route('posts.index');
});
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::put('/posts/{post}', 'PostController@update')->name('posts.update');

Route::post('/comments', 'CommentController@store')->name('comments.store');
Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
Route::get('/comments', 'CommentController@trash')->name('comments.trash');
Route::get('/comments/{comment}', 'CommentController@restore')->name('comments.restore');
Route::delete('/trashed-comments/{comment}', 'CommentController@remove')->name('comments.remove');
Route::put('/comments/{comment}', 'CommentController@show')->name('comments.show');

Route::post('ratings', 'RatingController@store')->name('ratings.store');
Route::get('ratings', 'RatingController@show')->name('ratings.show');
 