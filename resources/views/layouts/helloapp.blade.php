<html>
    <head>
        <title>@yield('title')</title>
        <style>
            body {font-size: 16pt; color:#777;}
            h1 {font-size:40pt; text-align:right;color:#d0d0f0; margin:-20px 0px 0px 0px;}
            ul{font-size:12pt;}
            hr{margin:25pt 100px; border-top:1px dashed #ddd;}
            .menutitle{font-size: 14px; font-weight:bold; margin:0px;}
            .content{margin:10px;}
            .footer{text-align:right; font-size:10pt; margin:10px; border-bottom:solid 1px #ccc; color:#ccc;}
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