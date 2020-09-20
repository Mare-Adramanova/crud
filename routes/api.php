<?php

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('posts', 'ApiController@getAllPosts');
Route::get('posts/{post}', 'ApiController@getPost');
Route::post('posts/', 'ApiController@createPost');
Route::delete('posts/{post}', 'ApiController@deletePost');
Route::put('posts/{post}', 'ApiController@updatePost');


Route::post('asd', function(){
    //request()->all();
    $post = new Post;

    return request('name');
});
