@extends('admin.layout.auth')

@section('content')
 

<header id="header">
    <h1 style="font-size: 60px;">統計結果</h1>   
    <div style="position: relative;"><a href="/k_uriage"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
 <div id="main">
     <h2></h2>
     @if(count($to) > 0)
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
          @foreach( $to as $tos)    
            <tr>
            <td>{{$tos->PRO_NAME}}</td>
            <td>{{ $tos->SIZE_SIZE}}</td>
            <td>{{ $tos->sal}}</td>
            <td>{{ $tos->price}}</td>
            </tr>
        @endforeach()
            </tbody>
        </table>
       @else
     <p>記録がございません</p>
     @endif
</div>

@endsection