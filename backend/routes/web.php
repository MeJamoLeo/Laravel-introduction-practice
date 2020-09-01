<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('person', 'PersonController@index');


// ミドルウェアを使ってみる
Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');
