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
        
        <h2>お名前：  {{ $kakunin->name }}</h2>
        <h2>フリガナ：  {{ $kakunin->KANA }}</h2>
        <h2>電話番号：  {{ $kakunin->TEL }}</h2>
        <h2>メールアドレス：  {{ $kakunin->email }}</h2>
        <h2>郵便番号：  {{ $kakunin->ADDN }}</h2>
        <h2>住所：  {{ $kakunin->ADD }}</h2>
        <h2><a href="/membetr"><input type="button" value="戻る" style="width: 200px; font-size:30px;"></a>
        <a href="/change?id={{$kakunin->id}}"><input type="button" value="登録情報変更" style="width: 200px; font-size:30px;"></a></h2>
    </body>
</html>
