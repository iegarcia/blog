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

Route::redirect('/', 'blog');

Auth::routes();

Route::get('/blog', 'web\PageController@blog')->name('blog');

Route::get('blog/{slug}', 'web\PageController@post')->name('post');

Route::get('category/{slug}', 'web\PageController@category')->name('category');

Route::get('tag/{slug}', 'web\PageController@tag')->name('tag');

Route::resource('posts', 'Admin\PostController')->middleware('auth');
