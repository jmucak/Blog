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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Ruta koja kreira postove
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/trashed', 'PostController@trashed')->name('posts.trashed');
Route::get('/posts/kill/{id}', 'PostController@kill')->name('post.kill');
Route::get('/posts/restore/{id}', 'PostController@restore')->name('post.restore');
Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');
Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('/post/update/{id}', 'PostController@update')->name('post.update');

// Ruta Category
Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::post('/category/store', 'CategoryController@store')->name('category.store');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');

// Ruta Tags

Route::get('/tags', 'TagController@index')->name('tags');
Route::get('/tag/edit/{id}', 'TagController@edit')->name('tag.edit');
Route::post('/tag/update/{id}', 'TagController@update')->name('tag.update');
Route::get('/tag/delete/{id}', 'TagController@destroy')->name('tag.delete');
Route::get('/tag/create', 'TagController@create')->name('tag.create');
Route::post('/tag/store', 'TagController@store')->name('tag.store');