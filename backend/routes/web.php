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

// Route::get('/hello', function () {
//     return '<html><body><h1>Hello</h1><p>This is sample.page</p></body></html>';
// });

// ヒアドキュメント,パラメータを使ってみる
Route::get('hello/{name}', function ($name) {
    $html = <<<EOF
<html>
<head>
<title>Hello</title>
<style>
body {font-size:16pt; color:#999;}
h1 {font-size:100; text-align:right;, color:#0eee;, margin:-40px 0px -50px 0px;}
</style>
</head>
<body>
    <h1>Hello</h1>
    <p>This is sample page.</p>
    <p>これは，サンプルで作ったページです</p>
    <p>{$name}さん，こんにちは<p>
</body>
</html>
EOF;
    return $html;
});


// indexアクションにルートを割り当てる, ルートパラメータを使ってみる
Route::get('hello', 'HelloController@index');
Route::get('hello/other', 'HelloController@other');
