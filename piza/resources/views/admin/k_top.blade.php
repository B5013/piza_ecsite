@extends('admin.layout.auth')

@section('content')
   <div id="main"> 
       @if( Auth::user()->master === 'master' )
        <ul id="menu">
            <li><a href="/k_zyutyuu">受注管理</a></li>
            <li><a href="/k_haitatu">配達管理</a></li>
            <li><a href="/k_tel">電話注文受付</a></li>
            <li><a href="/">サイト確認</a></li>
        </ul>
        
        <div id="ten">
        <ul id="menu">
            <li><a href="/k_uriage">売上管理</a></li>
            <li><a href="/k_jyugyoin">従業員管理</a></li>
            <li><a href="/k_shohin">商品管理</a></li>
            <li><a href="/k_kokyaku">顧客管理</a></li>
        </ul>
        </div>
       @else
       <ul id="menu">
            <li><a href="/k_zyutyuu">受注管理</a></li>
            <li><a href="/k_haitatu">配達管理</a></li>
            <li><a href="/k_tel">電話注文受付</a></li>
            <li><a href="/">サイト確認</a></li>
        </ul>
       @endif
        </div>
@endsection