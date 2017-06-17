@extends('admin.layout.auth')

@section('content')
 <header id="header">
        <h1 style="font-size: 60px;">ブラックリスト追加</h1>
     <div style="position: relative;"><a href="/k_black"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
 <div id="main">
     @if($id == 0)
    <form action="/binsert" method="post">
        {{csrf_field()}}
     <p>顧客ID  <input type="text" name="id"></p>
     <p>内容</p>
           <p><textarea name="com"></textarea></p>
     <p><input type="submit" name="kbtn" value="追加"></p>
    </form>
       @else
     <form action="/binsert" method="post">
        {{csrf_field()}}
     <p>顧客ID  <input type="text" name="id" value="{{$id}}"></p>
     <p>内容</p>
           <p><textarea name="com"></textarea></p>
     <p><input type="submit" name="kbtn" value="追加"></p>
    </form>
     @endif
</div>

@endsection