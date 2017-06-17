<!DOCTYPE HTML>
<html　lang="ja">
    <head>
       <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>デリバリーピザ</title>
        <link rel="stylesheet" href="assets/piza.css">
        <link rel="stylesheet" href="assets/piza_top.css">
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
        
    <div id="main">    
        <div class="banner" style="margin-top: 30px;">
            </div>
        <form action="/cart" method="post">
            {{csrf_field()}}
             <div class="mainimg">
        <img src="{{$it->img}}">
            </div>
            <div class="maindate">
            <input type="hidden" name="id" value="{{$it->PRO_ID}}">
        <h2>{{$it->PRO_NAME}}</h2>
        <h2>@if($it->GEN_ID === 1)
            サイズ
        <p><input type="radio" name="sid" value="1" style="height: 18px; width: 18px; vertical-align: middle;" checked> M ￥{{$itm->PRICE_PRICE}}</p>
            <p><input type="radio" name="sid" value="2" style="height: 18px; width: 18px; vertical-align: middle;"> L ￥{{$itl->PRICE_PRICE}}</p>
        @else
            <div style="position: relative;">
            <p><input type="hidden" name="sid" value="3">￥{{$itf->PRICE_PRICE}}</p></div>
        @endif
            </h2>
            <div class="cartbotn">
            <select name="num">
            <?php
      for ($i = 1; $i <= 9; $i++) {
        echo "<option>$i</option>";
      }?>
           </select>
            </div> </div>
            <div class="come">
           <input type="submit" value="カートに入れる">
            <h2>コメント</h2>
            <h2>{{$it->PRO_COMMENT}}</h2>
            <h2>アレルギー</h2>
            @foreach($al as $als)
            <a style="font-size: 23px;">・{{$als->ALLE_WHEAT}}</a>
            @endforeach
            </div></form>
        </div>
    </body>
</html>