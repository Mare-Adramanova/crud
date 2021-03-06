<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
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
  
   return redirect()->route('home');
});
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/create', 'PostController@create')->name('posts.create')->middleware('auth');
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
 
Auth::routes(['register'=>false]);


Route::get('/home', 'HomeController@index')->name('home');

Route::post('/categories', 'CategoryController@store')->name('categories.store');

Route::get('/email', function(){
   return view('email.create');
});

Route::post('/emailsubmit', function(){
   $validate =[
      'email'=>'required|email',
      'message'=>'required'
   ];
   request()->validate($validate);

   Mail::raw(request('message'), function($message){
      $message->to(request('email'))
         ->subject('tema na mailot');
         

   });
});

Route::get('cacheset', function(){
   Cache::put('foo', 'ova e vrednosta vo foo', now()->addMinutes(1));
   return redirect('/cacheget');

});

Route::get('cacheget', function(){
   return Cache::get('foo');
});

Route::get('/curl', function(){
   $response = Http::get('//jsonplaceholder.typicode.com/todos');
   //$response = Http::get('//localhost:8000/api/posts');
   //dd($response);
   return $response;

});

