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
    return "<{$tag}>". $text. "</{$tag}>";
}

class HelloController extends Controller
{
    public function index()
    {
        global $head, $style, $body, $end;

        $html = $head. tag('title', 'Hello/Index'). $style .
            $body
            . tag('h1', 'コントローラーを複数使ったindexアクション'). tag('p', 'this is Index page')
            . '<a href="/hello/other"> go to other page</a>'
            . $end;
        return $html;
    }

    public function other()
    {
        global $head, $style, $body, $end;

        $html = $head . tag('title', 'Hello/Other') . $style .
        $body
        . tag('h1', 'Other') . tag('p', 'this is Other page')
        . $end;
        return $html;
    }
}
