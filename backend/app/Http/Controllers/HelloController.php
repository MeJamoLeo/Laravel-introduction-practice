<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Facade\FlareClient\Http\Response;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);
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
