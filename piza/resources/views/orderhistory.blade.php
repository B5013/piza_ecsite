<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>カート</title>
<link rel="stylesheet" href="/css/k_piza.css">
        <link rel="stylesheet" href="assets/piza.css">
        <link rel="stylesheet" href="assets/piza_top.css">
    </head>
    <body>

        <header id="header" style="margin-top: 0;">
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
        <div style="position: relative;"><p>注文履歴<a href="/membetr"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></p></div>
     @foreach( $sale as $sales)
      <h2>日付　{{$sales->SALE_DAT}}</h2>
      <table class="alt">
             <thead>
                    <tr>
                        <th class="a">商品名 </th>
                        <th class="b">サイズ　</th>
                        <th class="e">個数 </th>
                        <th>金額</th>
                    </tr>
                    </thead>
                    <tbody>
            
            <?php $kingaku = 0;        
                  $goukei = 0; ?>
          @foreach( $krireki as $krirekis) 
          @if( $sales->SALE_ID === $krirekis->SALE_ID )
            <tr>
            <td>{{$krirekis->PRO_NAME}}</td>
            <td>{{ $krirekis->SIZE_SIZE}}</td>
            <td>{{ $krirekis->SAL}}</td>
            <?php 
                $kingaku = "{$krirekis->PRICE_PRICE}"*"{$krirekis->SAL}";
                $goukei += $kingaku;
                ?> 
            <td><?php echo $kingaku;?></td>
            </tr>
        @endif
        @endforeach()
            </tbody>
        </table>
    <h2>合計金額
                <?php echo "￥".$goukei; ?></h2>
@endforeach
        
        </div>
    </body>
</html>