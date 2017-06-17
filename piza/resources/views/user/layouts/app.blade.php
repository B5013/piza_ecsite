<!DOCTYPE HTML>
<html>
    <head>
       <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>デリバリーピザ</title>
      
       <link href="/css/app.css" rel="stylesheet">
         <link rel="stylesheet" href="/assets/piza.css">
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
                <span class="symbol"><img src="../images/img3.png" alt="" class="lo"/></span>
            </a>
            
          <!--ログイン-->
             <div class="a">
                <div class="login">
                    <a href="{{ url('/user/login') }}">ログイン</a><br><br>
                    <a href="{{ url('/user/register') }}">新規登録</a>
                </div>

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

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
