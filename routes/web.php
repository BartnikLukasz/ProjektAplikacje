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
    return view('home');
});


Route::get('/posts','App\Http\Controllers\PostsController@index')->name('index');
Route::get('/posts','App\Http\Controllers\PostsController@index')->name('posts');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create','App\Http\Controllers\PostsController@create')->name('create');
Route::post('/create','App\Http\Controllers\PostsController@store')->name('store');
Route::get('/delete/{id}', 'App\Http\Controllers\PostsController@destroy')->name('delete');
Route::get('/edit/{id}', 'App\Http\Controllers\PostsController@edit')->name('edit');
Route::put('{id}', 'App\Http\Controllers\PostsController@update')->name('update');
Route::get('/post/{id}','App\Http\Controllers\PostsController@show')->name('post');
Route::get('/createComment','App\Http\Controllers\CommentsController@create')->name('createComment');
Route::post('/createComment','App\Http\Controllers\CommentsController@store')->name('storeComment');
Route::get('/createImage/{postId}','App\Http\Controllers\ImagesController@create')->name('createImage');
Route::post('/createImage','App\Http\Controllers\ImagesController@store')->name('storeImage');
Route::get('/user/{id}','App\Http\Controllers\UsersController@show')->name('user');
Route::put('/updateDesc/{id}', 'App\Http\Controllers\UsersController@update')->name('updateDesc');
Route::get('/regulamin','App\Http\Controllers\HomeController@regulamin')->name('regulamin')->withoutMiddleware(['auth']);
Route::get('/contact','App\Http\Controllers\HomeController@kontakt')->name('contact');

Auth::routes();
Auth::routes(['regulamin'=>'false']);


