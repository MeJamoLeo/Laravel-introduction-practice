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

    // Validatorクラスでのエラーメッセージの表示
    public function post(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];
        $messages = [
            'name.required' => '名前は必ず入力してください',
            'mail.email' => 'メールアドレスが必要です．',
            'age.numeric' => '年齢を整数で記入ください',
            'age.min' => '年齢は０歳以上で記入してください．',
            'age.max' => '年齢は200歳以下で記入してください.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        // 入力値のageが数字だった場合，age, min:0を適用する
        $validator->sometimes('age', 'min:0', function ($input) {
            return is_numeric($input->age);
        });
        // 入力値のageが数字だった場合，age, max:200を適用する
        $validator->sometimes('age', 'max:200', function ($input) {
            return is_numeric($input->age);
        });


        if ($validator->fails()) {
            // 入力フォームへリダイレクト
            return redirect('/hello')
                ->withErrors($validator) // エラーメッセージをそのまま引き継ぐ
                ->withInput(); //送信されたフォームをそのまま引き継ぐ
        }
        return view('hello.index', ['msg' => '正しく入力されました！']);
    }
}
