<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>カート</title>
<link rel="stylesheet" href="assets/piza.css">
    </head>
    <body>

        <header id="header">
            <!--ロゴ-->
           <a href="/" class="logo">
                <span class="symbol"><img src="images/img3.png" alt="" class="lo"/><br></span>
            </a>
            
          <!--ログイン-->
       <div class="a">
             @if (Auth::guest())
                <div class="login">
                    <a href="{{ url('/user/login') }}">ログイン</a><br><br>
                    <a href="{{ url('/user/register') }}">新規登録</a>
                </div>
            @else
           <div class="login">
                    <a class="b">ようこそ</a><br><br>
                    <a href="/membetr" style="width: auto;">{{ Auth::user()->name }}さん</a><br><br>
                   <a href="{{ url('/user/logout') }}">ログアウト</a>
                </div>
            @endif
            </div>
            
        <!--メニューバー -->
        <div id="menu">
        <ul class="menu">
            <li><a href="/menu?gen_id=1">ピザ</a></li><li>
            <a href="/menu?gen_id=2">ドリンク</a></li><li>
            <a href="/menu?gen_id=3">サイドメニュー</a></li><li>
            <a href="/cart">カート</a></li><br>
        </ul>    
        </div>
        </header>
        <div style="margin: 50px;">
        <p><a href="/mkakunin?id={{ Auth::user()->id }}"><input type="button" value="登録情報確認" style="font-size:40px; width: 400px; margin: 20px;"></a></p>
         <p><a href="/orderhistory?id={{ Auth::user()->id }}"><input type="button" value="注文履歴" style="font-size:40px; width: 400px; margin: 20px;"></a></p>
         <p><a href="/withdrawal?id={{ Auth::user()->id }}"><input type="button" value="退会" style="font-size:40px; width: 400px; margin: 20px;"></a></p>
        </div>
    </body>
</html>
