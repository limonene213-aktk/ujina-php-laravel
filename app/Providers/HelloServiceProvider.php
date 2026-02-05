<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade; //追加
use App\View\Components\Message; //追加

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     * =>コンポーザ処理を作成する（プロバイダー登録が必要）
     */
//    public function boot(): void
//    {
//       View::composer( //名前解決（ビューと関数orクラスを引数として渡す）
//            'hello.index', function($view){ //関数名を書く必要はなく、クロージャを渡す
//        $view->with('view_message', 'view_messageという変数名で値を渡すよ');//withメソッドはビューに変数を追加するときに使う
//            }
//        );
//    }

    public function boot(): void
    {
        //Bladeディレクティブを使ってコンポーネントを登録
        //Bladeディレクティブとは、Bladeテンプレートエンジンに特定の機能を追加するための命令です。
        Blade::component('message', Message::class); 
    }
}
