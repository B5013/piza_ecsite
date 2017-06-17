<!DOCTYPE HTML>
<html　lang="ja">
    <head>
       <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>デリバリーピザ</title>
        <link rel="stylesheet" href="/css/k_piza.css">
        <link rel="stylesheet" href="assets/piza.css">
    </head>
    <body>
        <header id="header" style="margin-top: 0">
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
    <h1>カート</h1>
         <div class="table-wrapper" style="width: 80%;
        margin-left: auto; margin-right: auto;">
             
                {{--商品が入っているとき--}}
                @if($items)
                 <?php $goukei = 0; ?> 
                    <table class="alt2" style="width: 55%;">
                       <form action="/cdelete" method="post">
                                    {{csrf_field()}}
                        <tbody>
                            
                        {{--sessionに入ってるデータをループで回す--}}
                        @foreach($items as $index=>$item)
                            <tr>
                                <td style="margin-top: 100px; width: 40px;">
                                    <input type="checkbox" name="k[]" value="{{$index}}" style="height: 25px; width:25px;"></td>
                                <td style="width: 55%;"><img src="{{ $item->img }}" alt="" width="100%"; height="200px;"/></td>
                                <td style="width: 40%;">{{ $item->PRO_NAME }}</td>
                            </tr>
                              @endforeach
                            </tbody>
                           <input type="submit" value="選択項目削除" style="margin-right: 20px; float: left; font-size: 20px;">
                           <div class="clear"></div>
                 </form>
                    </table> 
           <table class="alt2" style="width: 12%;">
                        <tbody>
                        {{--sessionに入ってるデータをループで回す--}}
                        @foreach($bs as $index=>$b)
                            <tr>
                                <td><p style="height: 144px;">{{ $b->SIZE_SIZE }}</p></td>
                            </tr>
                              @endforeach
                            </tbody>
                    </table>
                           <table class="alt2" style="width: 12%;">
                        <tbody>
                            @foreach($as as $index=>$a)
                            <tr>
                                <td><form action="/cup" method="post">
                                    {{csrf_field()}}
                                    <p style="height: 144px;">
                                    <input type="hidden" name="index" value="{{ $index }}">
                                    <select name="kosu" style="width: 40px; height: 40px;">
                                    <?php for ($i = 1; $i < 10; $i++){
                                    if("{$a}" == $i){
                                    echo "<option selected>$i</option>";
                                         }else{
                                    echo "<option>$i</option>";
                                     }} ?>
                                        </select>
                                        <input type="submit" value="変更" style="width: 40px; height: 40px;"></p></form></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
           <table class="alt2" style="width: 21%;">
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
             <a href="/cdelete/all" class="button" style="margin-bottom: 20px;"><input type="button" value="カートを空にする" style="width: 230px; font-size:30px;"></a>
             <a href="/accounting"><input type="button" value="会計へ進む" style="width: 230px; font-size:30px;"></a>
                {{--商品が入っていないとき--}}
                @else
                    <p>現在カート内に商品はございません。</p>
<a href="/"><input type="button" value="TOPへ" style="width: 200px; font-size:30px;"></a>
                @endif
                 

                 
             
                 </div>
        </div>

    </body>
</html>
