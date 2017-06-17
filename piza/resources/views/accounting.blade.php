<!DOCTYPE HTML>
<html　lang="ja">
    <head>
       <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>デリバリーピザ</title>
        <link rel="stylesheet" href="/css/k_piza.css">
        <link rel="stylesheet" href="assets/piza.css">
    </head>
    <script type="text/javascript">
  function pDate()
{
	 var date = new Date()
  var year = date.getFullYear()
  var month = date.getMonth() + 1
  var day = date.getDate()
  var hours = date.getHours() + 1
  var minutes = date.getMinutes()
    
  var toTargetDigits = function (num, digits) {
    num += ''
    while (num.length < digits) {
      num = '0' + num
    }
    return num
  }
  
  var yyyy = toTargetDigits(year, 4)
  var mm = toTargetDigits(month, 2)
  var dd = toTargetDigits(day, 2)
  var hh = toTargetDigits(hours, 2)
  var mi = toTargetDigits(minutes, 2)
	document.myFORM.time.value = yyyy+"-"+mm+"-"+dd+"T"+hh+":"+mi;
}
           </script>
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
            <li><a href="menu?gen_id=1">ピザ</a></li><li>
            <a href="menu?gen_id=2">ドリンク</a></li><li>
            <a href="menu?gen_id=3">サイドメニュー</a></li><li>
            <a href="/cart">カート</a></li><br>
        </ul>    
        </div>
        </header>
<div id="main">
    <h1>会計画面</h1>
         <div class="table-wrapper" style="width: 80%;
        margin-left: auto; margin-right: auto;">
             
                {{--商品が入っているとき--}}
                @if($items)
                 <?php $goukei = 0; ?> 
                    <table class="alt2" style="width: 750px;">
                        <tbody>
                            
                        {{--sessionに入ってるデータをループで回す--}}
                        @foreach($items as $index=>$item)
                            <tr>
                                <td><img src="{{ $item->img }}" alt="" width=" 300px"; height="200px;"/></td>
                                <td>{{ $item->PRO_NAME }}</td>
                            </tr>
                              @endforeach
                            </tbody>
                           
                    </table> 
           <table class="alt2" style="width: 100px;">
                        <tbody>
                        {{--sessionに入ってるデータをループで回す--}}
                        @foreach($bs as $index=>$b)
                            <tr>
                                <td><p style="height: 144px;">{{ $b->SIZE_SIZE }}</p></td>
                                
                            </tr>
                              @endforeach
                            </tbody>
                    </table>
                           <table class="alt2" style="width: 130px;">
                        <tbody>
                            @foreach($as as $index=>$a)
                            <tr>
                                <td>
                                    <p style="height: 144px;">数　{{$a}}</p></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
           <table class="alt2" style="width: 200px;">
                        <tbody>
                      
                            @foreach($cs as $index=>$c)
                            <tr>
                                <td><p style="height: 144px;">￥ {{ $c }}</p></td>
                            </tr>
                            <?php $goukei += "{$c}"; ?>
                        @endforeach
                        </tbody>
                    </table>
                 <div class="clear"></div>
              <h2>合計金額
                <?php echo "￥".$goukei; ?></h2>
             <form action="/winsert" method="post" name="myFORM">
    {{csrf_field()}}
    <body onLoad="pDate()">
        <input type="hidden" name="cid" value="{{Auth::user()->id}}">
        
            <p>お届け日時<input type="datetime-local" name="time" style="widht: 200px; height: 40px; font-size: 30px;"></p>
            </body>
    <p>お届け先住所<input type="text" name="jyuusyo" value="{{ Auth::user()->ADD }}" style="widht: 200px; height: 40px; font-size: 30px;"></p>
   
                 <a href="/cart"><input type="button" value="カートへ戻る" style="width: 200px; font-size:30px;"></a>
                 <a><input type="submit" value="購入する" style="width: 200px; font-size:30px;"></a>
 </form>         
                {{--商品が入っていないとき--}}
                @else
                    <p>現在カート内に商品はございません。</p>
<a href="/">TOPへ</a>
                @endif
                 
       
             
                 </div>
        </div>

    </body>
</html>
