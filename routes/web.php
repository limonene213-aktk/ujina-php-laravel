<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController; //追記
use App\Http\Middleware\HelloMiddleware; //ミドルウェアのために追記

use App\Http\Controllers\UjinaController; //みんなは無視してください

/*
ここでミドルウェアを追加する（Route::get～にメソッドチェーン（->）でmiddleware追加）
Route:get(....)->middleware(...)->middleware(...);のようにチェーンして書けます。
*/

Route::get('hello', [HelloController::class, 'index'])
    ->middleware(HelloMiddleware::class);


Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', [HelloController::class, 'index']);

/* helloにアクセスすると、クロージャが発火してhello.indexを返す */
/* 直接viewメソッドをreturnしていただけ */
/*
Route::get('hello',function(){
    return view('hello.index');
});
*/

Route::post('ujina', [UjinaController::class, 'post']); //みんなは無視してください
Route::get('ujina', [UjinaController::class, 'index']); //みんなは無視してください
