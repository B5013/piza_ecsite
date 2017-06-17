@extends('admin.layout.auth')

@section('content')
 <header id="header">
        <h1 style="font-size: 60px;">受注一覧</h1>
      <div style="position: relative;"><a href="/admin/home"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
 <div id="main">
    <p id="RealtimeClockArea2"> </p>
<span id="view_clock"></span>

<script type="text/javascript">
timerID = setInterval('clock()',500); //0.5秒毎にclock()を実行

function clock() {
	document.getElementById("view_clock").innerHTML = getNow();
}

function getNow() {
	var now = new Date();
	var year = now.getFullYear();
	var mon = now.getMonth()+1; //１を足すこと
	var day = now.getDate();
	var hour = now.getHours();
	var min = now.getMinutes();
	var sec = now.getSeconds();

	//出力用
	var s = year + "年" + mon + "月" + day + "日" + hour + "時" + min + "分" + sec + "秒"; 
	return s;
}
</script>
           
      <table class="alt">
             <thead>
                    <tr>
                        <th class="a" style="width: 10%;">販売ID </th>
                        <th class="b">販売日時　</th>
                        <th class="e" style="width: 7%;">確認チェック </th>
                    </tr>
                    </thead>
                    <tbody>
          @foreach( $sale as $sales)    
            <tr>
            <td><a href="/k_zshosai?id={{ $sales->SALE_ID }}" >{{ $sales->SALE_ID }}</a></td>
            <td>{{ $sales->SALE_DAT}}</td>
           
                <form action="/check2" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$sales->SALE_ID}}">
            @if($sales->SALE_CHECK == 1)
                <td><input type="checkbox" name="check" value="1" style="height: 25px; width: 25px;" checked="checked"><input type="submit" name="kbtn" value="チェック"></td>
                @else
                <td><input type="checkbox" name="check" value="1" style="height: 25px; width: 25px;"><input type="submit" name="kbtn" value="チェック"></td>
                @endif
                    
                    </form>
            </tr>
        @endforeach()
            </tbody>
        </table>

 
       
</div>

@endsection