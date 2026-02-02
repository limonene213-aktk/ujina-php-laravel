<html>
    <head>
        <title>@yield('title')</title>
        <style>
            body {
                font-size: 16px;
                color:#3f4655;
                background: linear-gradient(180deg, #f7f8fb 0%, #f2f4fb 100%);
                font-family: "Hiragino Kaku Gothic ProN", "Noto Sans JP", Arial, sans-serif;
                margin:0;
                padding:32px 24px 48px;
            }
            h1 {
                font-size:34px;
                color:#c1c9f5;
                margin:0 0 14px;
                letter-spacing: 2px;
                text-shadow: 0 2px 10px rgba(140, 155, 245, 0.2);
            }
            .main-title{ text-align:center; }
            ul{
                font-size:13px;
                list-style: none;
                padding: 12px 18px;
                margin: 0 auto 12px;
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 10px 24px rgba(30, 40, 90, 0.08);
                max-width: 960px;
            }
            li{padding-left: 1.2em; position: relative; color:#5a6072;}
            li:before{content:"•"; position:absolute; left:0; color:#7a8cf3;}
            hr{margin:22px auto; border:0; border-top:1px dashed #d9def0; max-width: 960px;}
            .menutitle{font-size: 13px; font-weight:bold; margin:0 0 6px; color:#6f7ad9;}
            .content{
                margin:16px auto;
                background:#fff;
                padding: 22px 24px;
                border-radius: 14px;
                box-shadow: 0 12px 26px rgba(30, 40, 90, 0.08);
                max-width: 960px;
            }
            .content p{margin: 8px 0; line-height: 1.7; color:#4a5163;}
            .footer{
                text-align:right;
                font-size:11px;
                margin:14px auto 0;
                border-bottom:solid 1px #e3e6f2;
                color:#9aa0b2;
                max-width: 960px;
            }
        </style>
    </head>

    <body>
        <!--こちらが親ファイル（カラーボックス本体）で、yeildで穴をあけておく-->
        <h1 class='main-title'>@yield('title')</h1>
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