@extends('admin.layout.auth')

@section('content')
        <header id="header">
        <h1 style="font-size: 60px;">商品一覧</h1>
        <div style="position: relative;"><a href="/k_stuika"><input type="button" value="追加" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 250px;"></a><a href="/admin/home"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
        
    <div id="main">
       <form action="/k_skensaku" method="post">
           {{csrf_field()}}
        <input type="search" name="name">
           <input type="submit" name="kbtn" value="検索">
         @if($kazu === 1 and count($shohin) === 0)
           <a href="/k_shohin"><input type="button" value="商品一覧へ" style="color: #000; width: 140px; height: 51px; font-size: 25px;"></a>
            <h1>商品がありません</h1>  
           @elseif($kazu === 1)
           <a href="/k_shohin"><input type="button" value="商品一覧へ" style="color: #000; width: 140px; height: 51px; font-size: 25px;"></a>
           @endif
        </form>
    
        
        <table class="alt">
          @foreach( $shohin as $shohins)    
            <tr>
            <td><img src="{{ $shohins->img }}" alt="" style="width: 500px; height: 300px"/></td>
            <td>{{ $shohins->PRO_NAME }}</td>
            <td style="text-align: center;"><a href="/k_shensyu?id={{$shohins->PRO_ID}}">編集</a><a href="/delete?id={{$shohins->PRO_ID}}">削除</a></td>
            </tr>
        @endforeach()
        </table>
        
        </div>
   @endsection