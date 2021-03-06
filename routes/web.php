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
       
//new route
Route::post('/posts/{post_id}/comments',['as'=>'comments-post','uses'=>'CommentsController@store']);


//new route
Route::get('/register', 'RegisterController@create');
//route for submit forme register
Route::post('/register', 'RegisterController@store');
//new route and controller
Route::get('/logout', 'LoginController@logout');
//new         mora biti def ime zbog middleware-a u PostContolleru
                                             
Route::get('/login', 'LoginController@create')->name('login');
//route for input in database
Route::post('/login', 'LoginController@store');

//new route                                     and name important here
Route::get('/users/{id}', 'UsersController@show')->name('users');

///new route
Route::get('/posts/tag/{tag}','TagsController@index')->name('posts-tags');