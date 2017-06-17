@extends('admin.layout.auth')

@section('content')
 <header id="header">
        <h1 style="font-size: 60px;">詳細情報</h1>
     <div style="position: relative;"><a href="/k_kokyaku"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
 <div id="main">
     
     <p>電話番号: {{$cl->TEL}} <a href="/k_btuika?id={{$cl->id}}"><input type="button" value="ブラックリスト入り" style="color: #000; width: 205px; font-size: 25px;"></a></p>
     <p>名前：　{{$cl->name}}</p>
     <p>住所：　{{$cl->ADD}}</p>
     <p>注文履歴</p>
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
@endsection