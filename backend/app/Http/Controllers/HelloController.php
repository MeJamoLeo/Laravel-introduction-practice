<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        return view('hello.index', ['msg' => 'フォームを入力：']);
    }

    // ここのコントローラにはバリデーションが存在しない
    public function post(Request $request)
    {
        // Validateクラスのインスタンスを生成
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'mail' => 'email',
                'age' => 'numeric|between:0,150',
            ]
        );

        // エラーのチェック
        if ($validator->fails()) {
            // 入力フォームへリダイレクト
            return redirect('/hello')
                ->withErrors($validator) // エラーメッセージをそのまま引き継ぐ
                ->withInput(); //送信されたフォームをそのまま引き継ぐ
        }
        return view('hello.index', ['msg' => '正しく入力されました！']);
    }
}
