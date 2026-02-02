<html>
    <head>
        <title>宇品授業説明ページ</title>
    </head>
    <body>
        <!--<h1>Hello</h1>-->
        <!--<p>This is a simple page with php-template.</p>-->
        <h1>@PHPディレクティブの説明ページ</h1>

        <p>@PHPディレクティブで書いてみます（style未適用／処理）</p>

        @php
            $arr = ['message'=>'メッセージ', 'view_message'=>'ビューメッセージ'];

            foreach($arr as $key => $value){
                echo $key."："."$value"."<br>";
            }
        @endphp

    </body>
</html>