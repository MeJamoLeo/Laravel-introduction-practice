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
        // クエリ文字列を配列で取得し，第2引数でルールを記述する
        $validator = Validator::make(
            $request->query(),
            [
                'id' => 'required',
                'pass' => 'required',
            ]
        );

        if ($validator->fails()) {
            $msg = 'クエリーに問題があります．';
        } else {
            $msg = 'ID/PASSを受け付けました．フォームを入力ください';
        };

        return view('hello.index', ['msg' => $msg,]);
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
