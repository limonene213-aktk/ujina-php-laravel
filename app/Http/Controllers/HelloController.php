<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //お願い
use Illuminate\Http\Response; //お返事

class HelloController extends Controller{

    //ビューを使う（アクション）
    /*public function index()
    {
        $data = [
            'msg'=>'お名前を入力してください',
        ];
        return view('hello.index',$data);
    }

    public function post(Request $request)
    {
        $msg= $request->msg;
        $data = [
            'msg' =>'こんにちは、'.$msg.'さん！',
        ];
        return view('hello.index', $data);
    }*/

    public function index(Request $request) //引数を渡して
    {
        $id = $request->id; //リクエストのidの値を取り出して
        return view ('hello.index', ['id'=>$id]); //取り出した値をコンポーネントに渡す
    }

    public function post(Request $request)
    {
        return view('hello.index',['msg'=>$request->msg]);
    }
}
