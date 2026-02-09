<?php

// sail artisan make:middleware HelloMiddlewareで作成した

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $data = [
            ['name'=>'jua', 'mail'=>'jua@daisuki.com'],
            ['name'=>'jack', 'mail'=>'jack@blackjack.com'],
            ['name'=>'pinoko', 'mail'=>'pinoko@dayonosa.com'],
        ];

        //mergeメソッドは、フォーム送信などで送られる値に新しい値を追加して合成（merge）するものです。
        //これにより、dataという項目で$dataの内容が追加されます。
        //コントローラーの側では、$request->dataでこの値を取り出すことができるようになります。
        $request->merge(['data'=>$data]);

        return $next($request);
    }
}
