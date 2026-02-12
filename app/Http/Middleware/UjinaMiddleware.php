<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UjinaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
$response->setContent('
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujina Middleware Override</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            color: #fff;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            margin-top: 15vh;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        .box {
            margin: 2rem auto;
            padding: 1.5rem;
            background: rgba(255,255,255,0.15);
            border-radius: 12px;
            width: 60%;
            backdrop-filter: blur(10px);
        }
        footer {
            margin-top: 3rem;
            font-size: 0.8rem;
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 ミドルウェアが発動しました！</h1>
        <div class="box">
            <p>このページはコントローラーの内容を</p>
            <p><strong>ミドルウェアが上書きしています。</strong></p>
            <p>つまり最終出力を完全に制御できます。</p>
        </div>
        <footer>
            Powered by UjinaMiddleware
        </footer>
    </div>
</body>
</html>
');


        return $response;
    }
}
