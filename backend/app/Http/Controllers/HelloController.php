<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    // クエリ文字列にバリデータを作成する．
    public function index(Request $request)
    {
        return view('hello.index', ['msg' => 'フォームを入力してください．']);
    }

    public function post(HelloRequest $request)
    {
        return view('hello.index', ['msg' => '正しく入力されました．']);
    }
}
