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
        <form action="/mhensyu" method="post">
            {{csrf_field()}}
        <input type="hidden" name="id" value="{{$kakunin->id}}">
        <h2>お名前：  <input type="text" name="name" value="{{ $kakunin->name }}"></h2>
        <h2>フリガナ：  <input type="text" name="kana" value="{{ $kakunin->KANA }}"></h2>
        <h2>電話番号：  <input type="text" name="tel" value="{{ $kakunin->TEL }}"></h2>
        <h2>メールアドレス：  <input type="text" name="email" value="{{ $kakunin->email }}"></h2>
        <h2>郵便番号：  <input type="text" name="addn" value="{{ $kakunin->ADDN }}"></h2>
        <h2>住所：  <input type="text" name="add" value="{{ $kakunin->ADD }}"></h2>
        <h2><a href="/mkakunin?id={{$kakunin->id}}"><input type="button" value="戻る" style="width: 200px; font-size:30px;"></a>
        <input type="submit" value="変更" style="width: 200px; font-size:30px;"></h2>
        </form>
    </body>
</html>
