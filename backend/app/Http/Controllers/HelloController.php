<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Facade\FlareClient\Http\Response;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        // クッキーの内容によって処理を変える
        if ($request->hasCookie('msg')) {
            $msg = 'Cookie: ' . $request->cookie('msg');
        } else {
            $msg = '※クッキーはありません';
        }
        return view('hello.index', ['msg' => $msg]);
    }

    // Validatorクラスでのエラーメッセージの表示
    public function post(Request $request)
    {
        $rules = [
            'msg' => 'required',
        ];

        // var_dump($this); // $thisの中身を知りたい
        $this->validate($request, $rules);

        $msg = $request->msg;
        $body = view('hello.index', ['msg' => '「' . $msg . '」をクッキーに保存しました．']);
        return response($body, 200)
            ->withCookie(cookie('msg', $msg));
    }
}
