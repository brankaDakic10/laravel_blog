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
use \App\Post;

Route::get('/', function () {
    return view('welcome');
});
// all posts
Route::get('/posts','PostsController@index')->name('all-posts');
// the same code,other way of writing
// Route::get('/posts',['as'=>'all-posts','uses'=>'PostsController@index']);



///new route                  name of the route,not necessary now
Route::get('/posts/create',['as'=>'create-post','uses'=>'PostsController@create']);
//the same code,other way of writing
// Route::get('/posts/create','PostsController@create');

////for single post
Route::get('/posts/{id}','PostsController@show' )->name('single-post');
// Route::get('/posts/{id}',['as'=>'single-post','uses'=>'PostsController@show']);

///new route  
Route::post('/posts','PostsController@store');
       
