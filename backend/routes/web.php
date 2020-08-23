<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::post('hello', 'HelloController@post');

// ミドルウェアを使ってみる
Route::get('hello', 'HelloController@index')
    ->middleware(HelloMiddleware::class);
