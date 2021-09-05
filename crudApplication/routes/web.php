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
    return view('welcome');
});

Route::get('/articles', 'App\Http\Controllers\ArticleController@show')->name('articles');

Route::get('/articles/add', 'App\Http\Controllers\ArticleController@addArticle')->name('articles.add');

Route::post('/articles/add', 'App\Http\Controllers\ArticleController@saveArticle')->name('articles.save');

Route::get('/articles/edit/{id}', 'App\Http\Controllers\ArticleController@editArticle')->name('articles.edit');

Route::post('/articles/edit/{id}', 'App\Http\Controllers\ArticleController@updateArticle')->name('articles.update');

Route::get('/articles/delete/{id}', 'App\Http\Controllers\ArticleController@deleteArticle')->name('articles.delete');




