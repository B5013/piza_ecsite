@extends('admin.layout.auth')

@section('content')
 <header id="header">
        <h1 style="font-size: 60px;">詳細情報</h1>
     <a href="/k_kokyaku">戻る</a>
        </header>
 <div id="main">
     <from action="post" method="post">
         <input type="hidden" value="{{$cl->CL_TEL}}">
     <p>電話番号<input type="text" value="{{ $cl->CL_TEL}}">
           <a href="#">ブラックリスト入り</a></p>
       </from>
     <p>名前：　{{$cl->CL_NAME}}</p>
     <p>住所：　{{$cl->CL_ADD}}</p>
     <p>注文履歴</p>
     
</div>
@endsection