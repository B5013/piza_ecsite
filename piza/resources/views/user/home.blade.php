@extends('user.layouts.app')

@section('content')

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
                    <a>ようこそ</a><br><br>
                    <a href="{{ url('/user/login') }}">{{ Auth::user()->name }}さん</a>
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
                    <img src="images/img3.png">
                </section>
                <section id="slide2">
                    <img src="http://placehold.it/600x200/fafafa/20b2aa/&text=slide_2">
                </section>
                <section id="slide3">
                    <img src="http://placehold.it/600x200/fafafa/20b2aa/&text=slide_3">
                </section>
                <section id="slide4">
                    <img src="http://placehold.it/600x200/fafafa/20b2aa/&text=slide_4">
                </section>
                <section id="slide5">
                    <img src="http://placehold.it/600x200/fafafa/20b2aa/&text=slide_5">
                </section>
            </div>
        </div>
    </div>
        <div class="osirase">
        <ul>
            <h1>お知らせ</h1>
            <li><a href="#">あなたがピザを買うことは、未来につながっています。</a>
            </li>
            <li><a href="/osirase?id=2">つまらないピザに用はない</a>
            </li>
            <li><a href="#">a</a></li>
            <li><a href="#">a</a></li>
            <li><a href="#">a</a></li>
            <li><a href="#">a</a></li>
            </ul>
        </div>
        <h2 class="o"><a href="/osirase">お知らせ一覧</a></h2>
        </div>

@endsection
