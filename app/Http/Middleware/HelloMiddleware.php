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
        //$data = [
        //    ['name'=>'jua', 'mail'=>'jua@daisuki.com'],
        //    ['name'=>'jack', 'mail'=>'jack@blackjack.com'],
        //    ['name'=>'pinoko', 'mail'=>'pinoko@dayonosa.com'],
        //];

        //mergeメソッドは、フォーム送信などで送られる値に新しい値を追加して合成（merge）するものです。
        //これにより、dataという項目で$dataの内容が追加されます。
        //コントローラーの側では、$request->dataでこの値を取り出すことができるようになります。
        //$request->merge(['data'=>$data]);

        $response = $next($request);

        $content = method_exists($response, 'getContent') ? $response->getContent() : null;
        if (!is_string($content) || $content === '') {
            return $response;
        }

        $pattern = '/<middleware>(.*?)<\/middleware>/is';
        $content = preg_replace_callback($pattern, function ($matches) {
            $raw = trim($matches[1] ?? '');
            if ($raw === '') {
                return '';
            }

            $href = preg_match('/^https?:\/\//i', $raw) ? $raw : 'https://' . $raw;

            $escapedText = htmlspecialchars($raw, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            $escapedHref = htmlspecialchars($href, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

            return '<a href="' . $escapedHref . '">' . $escapedText . '</a>';
        }, $content);

        $response->setContent($content);

        return $response;
    }
}
