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
                <span class="symbol"><img src="images/img3.png" alt="" class="lo"/></span>
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
        <div class="banner">
            </div>
        
    <div id="wrapper">
        <div id="slideshow">
            <div class="slideContents">
                <section id="slide1">
                    <img src="images/113.jpg" style="width: 580px; height: 240px;">
                </section>
                <section id="slide2">
                    <img src="images/images.jpg" style="width: 580px; height: 240px;">
                </section>
                <section id="slide3">
                    <img src="images/imgres.jpg" style="width: 580px; height: 240px;">
                </section>
                <section id="slide4">
                    <img src="images/pizza2.jpg" style="width: 580px; height: 240px;">
                </section>
                <section id="slide5">
                    <img src="images/cola_bottle_img.png" style="width: 580px; height: 240px;">
                </section>
            </div>
        </div>
    </div>
        <div class="osirase" style="margin-top: 30px;">
        <ul>
            <h1>お知らせ</h1>
            <li><a href="#">WEBサイトオープン</a>
            </li>
            <li><a href="#">全品送料無料</a>
            </li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            </ul>
        </div>
        <h2 class="o"><a href="/osirase">お知らせ一覧</a></h2>
        </div>
        
        
       <footer id="footer">
       <div>
            <ul class="copyright">
              
            </ul>
        </div>
    </footer>
    </body>
</html>