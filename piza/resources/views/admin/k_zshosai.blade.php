@extends('admin.layout.auth')

@section('content')
 <header id="header">
     <h1 style="font-size: 60px;">受注詳細</h1>
      <div style="position: relative;"><a href="/k_htuika?id={{$sale->SALE_ID}}"><input type="button" value="配達" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 400px;"></a><a href="/k_zhensyu?id={{$sale->SALE_ID}}"><input type="button" value="編集" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 250px;"></a><a href="/k_zyutyuu"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
 <div id="main">
     <p>販売ID　{{$sale->SALE_ID}}</p>
     <p>販売日時　{{$sale->SALE_DAT}}</p>
     <p>顧客ID　{{$sale->CL_ID}}</p>
     <p>担当者名　{{$jyu->name}}</p>
     <p>お届け日時　{{$sale->SALE_PLANDAT}}</p>
     <p>お届け先場所　{{$sale->SALE_PLANDST}}</p>
     <p>注文受付場所　{{$sale->SALE_PKACE}}</p>
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
          @foreach( $shosai as $shosais)    
            <tr>
            <td>{{$shosais->PRO_NAME}}</td>
            <td>{{ $shosais->SIZE_SIZE}}</td>
            <td>{{ $shosais->SAL}}</td>
            <?php 
                $kingaku = "{$shosais->PRICE_PRICE}"*"{$shosais->SAL}";
                $goukei += $kingaku;
                ?> 
            <td><?php echo $kingaku;?></td>
            </tr>
        @endforeach()
            </tbody>
        </table>
    <h2>合計金額
                <?php echo "￥".$goukei; ?></h2>
       
</div>

@endsection