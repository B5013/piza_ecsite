<!DOCTYPE HTML>
<html>
    <head>
       <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>デリバリーピザ</title>
       <link rel="stylesheet" href="assets/piza.css">
       
    <script language="JavaScript" type="text/javascript">

	var flag = false;			// global variable

	function disp(){
		setTimeout("disp()", 5000);
		var obj = document.getElementById("square");
	
		if(flag){
			obj.src = "images/img1.png";
		}else{
			obj.src = "images/logo.png";
		}
	
		flag = !flag;
	}
	</script>
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
        <div class="inner">
        
        </div>
        <br>
       <section class="tiles">
            @foreach( $test as $tests)
            <article class="style{{$tests->PRO_ID}}">
            <span class="image">
            <a href="/menu_detail?id={{$tests->PRO_ID}}">
            <img src="{{ $tests->img }}" width="350" height="250" alt=""/>
            </a>
            </span>
            <a href="/menu_detail?id={{$tests->PRO_ID}}">
            <br><h2> {{ $tests->PRO_NAME }}</h2>
            </a>
            @foreach($test2 as $test2s)
            @if( $tests->PRO_ID === $test2s->PRO_ID )
            @if( $test2s->GEN_ID === 1)
                <h2> {{ $test2s->SIZE_SIZE }}　　￥{{ $test2s->PRICE_PRICE }}</h2>
            @else
                    <h2> ￥{{ $test2s->PRICE_PRICE }}</h2>
                @break
            @endif
                @endif
                @endforeach

                <a href="/menu_detail?id={{$tests->PRO_ID}}">
                <p>注文する</p>
                </a>
                </article>
            @endforeach()   
        </section>
       
</div>
       <footer id="footer">
       <div>
            <ul class="copyright">
              
            </ul>
        </div>
    </footer>
    </body>
</html>