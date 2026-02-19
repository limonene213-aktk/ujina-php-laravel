<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //お願い
use Illuminate\Http\Response; //お返事

class HelloController extends Controller{

    public function index(Request $request) //引数を渡して
    {
//        $id = $request->id; //リクエストのidの値を取り出して
//        return view ('hello.index', ['id'=>$id]); //取り出した値をコンポーネントに渡す
    //return view('hello.index',['data'=>$request->data]);
    return view('hello.index', 
    ['msg'=>'フォームを入力してね：']);
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'name' => 'alpha:ascii', //alpha:asciiでASCII英字のみ許可（alphaだけだとUnicode＝日本語もOKになる）
            'mail'=> 'email',
            'age' => 'numeric|between:0,150', //numericは「数字である」、betweenは「～と・・・の間」（パイプ前後のスペースは不要）
        ];

        $request->validate($validate_rule);

        return view('hello.index',['msg'=>'正しく入力できました！！']);
    }
}
