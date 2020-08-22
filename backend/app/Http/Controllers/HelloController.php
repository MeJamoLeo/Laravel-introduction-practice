<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 複数アクションの利用
global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
body {font-size:16pt; color:#999;}
h1 {font-size:100; text-align:right;, color:#0eee;, margin:-40px 0px -50px 0px;}
</style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

// タグの種類とコンテンツを関数を用いて作成する
function tag($tag, $text)
{
    return "<{$tag}>" . $text . "</{$tag}>";
}

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'msg' => 'これはコントローラから渡されたメッセージです．',
            'id' => $request->id // クエリ文字列を使ったビューテンプレート
        ];
        // msgに対して値を打ち込め！！
        return view('hello.index', $data);
    }
}
