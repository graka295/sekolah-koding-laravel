<?php

use Illuminate\Support\Facades\Route;

// route

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article/create', 'ArticleController@create');
Route::post('/article/create', 'ArticleController@doCreate');
Route::get('/article/{name}', 'ArticleController@index');
Route::get('/article/update/{id}', 'ArticleController@update');
Route::post('/article/update/{id}', 'ArticleController@doUpdate');
Route::get('/article/delete/{id}', 'ArticleController@doDelete');
