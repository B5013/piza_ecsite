@extends('admin.layout.auth')

@section('content')
 <header id="header">
        <h1 style="font-size: 60px;">電話注文受付</h1>
        <div style="position: relative;"><a href="/k_tel"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
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
 <div id="main">
      <div class="table-wrapper" style="width: 100%;
        margin-left: auto; margin-right: auto;">
                {{--商品が入っているとき--}}
                @if($items)
                 <?php $goukei = 0; ?>
                    <table class="alt2" style="width: 41%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th class="a">商品名</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--sessionに入ってるデータをループで回す--}}
                        @foreach($items as $index=>$item)
                            <tr>
                                <td style="height: 80px; width: 20px;">{{ $item->PRO_ID }}</td>
                                <td style="width: 80%;">{{ $item->PRO_NAME }}</td>
                            </tr>
                           
                              @endforeach
                            </tbody>
                    </table>
           <table class="alt2" style="width: 22%;">
                        <thead>
                        <tr>
                            <th class="a">サイズ名</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--sessionに入ってるデータをループで回す--}}
                        @foreach($bs as $index=>$b)
                            <tr>
                                <td style="height: 80px;">{{ $b->SIZE_SIZE }}</td>
                                
                            </tr>
                              @endforeach
                            </tbody>
                    </table>
                           <table class="alt2" style="width: 13%;">
                        <thead>
                        <tr>
                            <th class="a">個数 </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($as as $index=>$a)
                            <tr>
                                <td style="height: 80px;">{{$a}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
           <table class="alt2" style="width: 24%;">
                        <thead>
                        <tr>
                            <th class="a">金額 </th>
                        </tr>
                        </thead>
                        <tbody>
                      
                            @foreach($cs as $index=>$c)
                            <tr>
                                <td style="height: 80px;">{{ $c }}</td>
                            </tr>
                            <?php $goukei += "{$c}"; ?>
                        @endforeach
                        </tbody>
                    </table>
          <div class="clear"></div>
                   <h2>合計金額</h2>
                <?php echo "￥".$goukei; ?>
                {{--商品が入っていないとき--}}
                @else
                    <p>商品は入っていません。</p>
                @endif
                
            </div>
     @if($ces)
      @foreach($ces as $index=>$ce)
     <form action="/ken" method="post">
         {{csrf_field()}}
         <p>電話番号 <input type="text" name="tel" value="{{$ce->TEL}}">
             <input type="submit" value="会員情報検索"></p>
     </form>
     <form action="/tinsert" method="post" name="myFORM">
         {{csrf_field()}}
         <input type="hidden" name="cid" value="{{$ce->id}}">
         <p><input type="hidden" name="tel" value="{{$ce->TEL}}"></p>
         <p>顧客名 <input type="text" name="name" value="{{$ce->name}}"></p>
         <p>住所 <input type="text" name="jyuusyo" value="{{$ce->ADD}}"></p>
          <p>担当者 <input type="text" name="eid" value="1"></p>
         <body onLoad="pDate()">
            <p>お届け日時<input type="datetime-local" name="time"></p>
            </body>
         <input type="submit" value="購入">
         <a href="/k_tel">商品変更</a>
       <a href="/delete/all">取消</a>
     </form>
     @endforeach
     @else
     <form action="/ken" method="post">
         {{csrf_field()}}
         <p>電話番号 <input type="text" name="tel">
             <input type="submit" value="会員情報検索"></p>
     </form>
     <form action="/tinsert" method="post" name="myFORM">
         {{csrf_field()}}
         <input type="hidden" name="cid" value="0">
         <p>電話番号 <input type="text" name="tel">未登録の方</p>
         <p>顧客名 <input type="text" name="name"></p>
         <p>住所 <input type="text" name="jyuusyo"></p>
          <p>担当者 <input type="text" name="eid" value="1"></p>
         <body onLoad="pDate()">
            <p>お届け日時<input type="datetime-local" name="time"></p>
            </body>
         <input type="submit" value="購入">
         <a href="/k_tel">商品変更</a>
       <a href="/delete/all">取消</a>
     </form>
     @endif
       
</div>

@endsection