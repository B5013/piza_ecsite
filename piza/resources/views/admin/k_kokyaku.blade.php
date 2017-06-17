@extends('admin.layout.auth')

@section('content')
 <header id="header">
        <h1 style="font-size: 60px;">顧客管理</h1>
     <div style="position: relative;"><a href="/k_black"><input type="button" value="ブラックリスト" style="color: #000; width: 155px; font-size: 25px; position: absolute; right: 250px;"></a><a href="/admin/home"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
 <div id="main">
       
           
            <form action="/k_kkensaku" method="post">
           {{csrf_field()}}
        <input type="search" name="name">
           <input type="submit" name="kbtn" value="検索">
         @if($kazu === 1 and count($cl) === 0)
                <a href="/k_kokyaku"><input type="button" value="顧客一覧へ" style="color: #000;  width: 140px; height: 51px; font-size: 25px;"></a> 
            <h1>顧客データがありません</h1>  
           @elseif($kazu === 1)
           <a href="/k_kokyaku"><input type="button" value="顧客一覧へ" style="color: #000;  width: 140px; height: 51px; font-size: 25px;"></a>
                @elseif($kazu === 0)
           @endif
                
        </form>
      @if($kazu === 1 and count($cl) === 0)
      @else
        <table class="alt">
            <thead>
                    <tr>
                        <th class="a">顧客ID </th>
                        <th class="b">顧客名 </th>
                        <th class="a">電話番号 </th>
                        <th class="b">メールアドレス </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
</tr>
          @foreach($cl as $cls)    
            <tr>
            <td><a href="/k_kshosai?id={{ $cls->id }}">{{ $cls->id }}</a></td>
            <td>{{ $cls->name}}</td>
            <td>{{ $cls->TEL }}</td>
            <td>{{ $cls->email}}</td>
            </tr>
        @endforeach()
            </tbody>
        </table>
     @endif
 
       
</div>

@endsection