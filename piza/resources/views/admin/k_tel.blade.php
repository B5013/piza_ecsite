@extends('admin.layout.auth')

@section('content')
 <header id="header">
        <h1 style="font-size: 60px;">電話注文受付</h1>
     <div style="position: relative;"><a href="/admin/home"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
 <div id="main">
       <form action="/tcart" method="post">
           {{csrf_field()}}
           <p>商品ID<input type="number" name ="id">
           サイズ
<input type="radio" name="sid" value="1" style="height: 18px; width: 18px; vertical-align: middle;" checked> M
<input type="radio" name="sid" value="2" style="height: 18px; width: 18px; vertical-align: middle;"> L
               <input type="radio" name="sid" value="3" style="height: 18px; width: 18px; vertical-align: middle;"> なし
</p>
           <select name="num">
            <?php
      for ($i = 1; $i <= 9; $i++) {
        echo "<option>$i</option>";
      }?>
           </select>
           <input type="submit" value="商品追加">
     </form>
      <div class="table-wrapper" style="width: 100%;
        margin-left: auto; margin-right: auto;">
                {{--商品が入っているとき--}}
                @if($items)
                 <?php $goukei = 0; ?>
                    <table class="alt2" style="width: 41%;">
                        <thead>
                        <tr>
                            <th >ID</th>
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
           <table class="alt2" style="width: 18%;">
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
                           <table class="alt2" style="width: 17%;">
                        <thead>
                        <tr>
                            <th class="a">個数 </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($as as $index=>$a)
                            <tr>
                                <td style="height: 80px;"><form action="/kup" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="index" value="{{ $index }}">
                                    <select name="kosu" style="width: 40px; height: 40px;">
                                    <?php for ($i = 1; $i < 10; $i++){
                                    if("{$a}" == $i){
                                    echo "<option selected>$i</option>";
                                         }else{
                                    echo "<option>$i</option>";
                                     }} ?>
                                        </select> <input type="submit" value="変更" style="width: 72px; height: 50px;"></form></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
           <table class="alt2" style="width: 24%;">
                        <thead>
                        <tr>
                            <th class="a">金額 </th>
                             <th class="c">取消 </th>
                        </tr>
                        </thead>
                        <tbody>
                      
                            @foreach($cs as $index=>$c)
                            <tr>
                                <td style="height: 80px;">{{ $c }}</td>
                                 <td style="text-align: center;"><a href="/tdelete?index={{ $index }}">取消</a></td>
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
    <a href="/delete/all" class="button" style="margin-bottom: 20px;">カートを空にする</a>
       <a href="/k_tshosai">確定</a>
</div>

@endsection