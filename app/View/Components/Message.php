<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class Message extends Component
{
    private $id;
    private $data;
    private $msg;

    public function __construct($id = 1)
    {
        $this->msg = 'ランダムなPOSTデータを表示します。';
        $this->id = $id;
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $this->id);
        $this->data = $response->json();
    }

    public function render(): View|Closure|string
    {
        return view('components.message',[
            'id' => $this->id,
            'data' => $this->data,
            'msg' => $this->msg
        ]);
    }
}
