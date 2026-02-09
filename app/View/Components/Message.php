<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Message extends Component
{
    /**
     * Create a new component instance.
     */

    private $id;//追加
    private $data; //外部APIから取得したデータを格納するプロパティを定義しておく
    private $msg;

    public function __construct()
    {
        $this->msg = 'ランダムなPOSTデータを表示するよ';//追加
        $this->id = $id;//追加

        $response = Http::get('https://jsonplaceholder.typicode.com/posts/'. $this->id) ;//外部APIにアクセス
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
        //書き換え：外部からコンポーネントに値を渡す

        return view('components.message', [
            'id' => $this->id,
            'data'=> $this->data,
            'msg' => $this->msg
        ]);
    }
}
