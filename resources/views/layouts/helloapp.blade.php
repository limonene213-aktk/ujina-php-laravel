<html>
    <head>
        <title>@yield('title')</title>
        <style>
            body {font-size: 16pt; color:#555; background:#f7f8fb; font-family: "Hiragino Kaku Gothic ProN", "Noto Sans JP", Arial, sans-serif;}
            h1 {font-size:40pt; text-align:right; color:#cfd6f6; margin:-20px 0px 0px 0px; letter-spacing: 2px;}
            ul{font-size:12pt; list-style: none; padding: 10px 16px; margin: 0; background: #fff; border-radius: 10px; box-shadow: 0 6px 14px rgba(30, 40, 90, 0.08);}            
            li{padding-left: 1.2em; position: relative;}
            li:before{content:"•"; position:absolute; left:0; color:#7a8cf3;}
            hr{margin:25pt 100px; border:0; border-top:1px dashed #d9def0;}
            .menutitle{font-size: 14px; font-weight:bold; margin:0px; color:#6f7ad9;}
            .content{margin:16px; background:#fff; padding: 16px 18px; border-radius: 12px; box-shadow: 0 8px 18px rgba(30, 40, 90, 0.08);}
            .footer{text-align:right; font-size:10pt; margin:12px 10px; border-bottom:solid 1px #e3e6f2; color:#b3b7c7;}
        </style>
    </head>

    <body>
        <!--こちらが親ファイル（カラーボックス本体）で、yeildで穴をあけておく-->
        <h1>@yield('title')</h>
        @section('menubar')<!--デフォルトの値付きの穴（子が別のものを出してきたときの条件分け）-->
        
        <ul>
            <p class="menutitle">※メニュー</p>
            <li>@show</li>
        </ul>
        
        <hr silze="1">
        
        <div class="content">
            @yield('content')
        </div>
        
        <div class="footer">
            @yield('footer')
        </div>
    
    </body>
</html>