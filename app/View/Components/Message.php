<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Message extends Component
{
    /**
     * Create a new component instance.
     */

    private $data; //外部APIから取得したデータを格納するプロパティを定義しておく

    public function __construct()
    {
        $num = rand(1, 100); //1から100までのランダムな数字を生成
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/'.$num) ;//外部APIにアクセス
        //Http::get()はLaravelのHTTPクライアント機能を使って外部APIにGETリクエストを送るメソッドで、使い方は以下の通り
        //Http::get('URL')の形で使用し、指定したURLにGETリクエストを送信します。"."で繋いで変数も使えます。
        //use Illuminate\Support\Facades\Http;を宣言しておく必要がある。

        $this->data = $response->json(); //json形式でデータを取得
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //return view('components.message'); //componentsの中のmessage.blade.phpを参照して返すだけの処理

    $data = [
        'msg' => 'ランダムなPOSTデータを表示します。',
        'data' => $this->data,
    ];
    return view('components.message', $data); //dataをビューに渡す
    }
}
