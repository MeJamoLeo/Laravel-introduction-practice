<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $content = $response->content();

        /*
        やりたいこと：リンクの自動生成がしたい
        <middleware>google.com</middleware>
        ビューで上のようにドメインを囲ってリンク付きのaタグにしたい．
        */
        $pattern = '/<middleware>(.*)<\/middleware>/i'; // 正規表現
        $replace = '<a href="http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content); // タグの入れ替え

        $response->setContent($content);
        return $response;
    }
}
