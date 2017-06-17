@extends('admin.layout.auth')

@section('content')
 <header id="header">
        <h1 style="font-size: 60px;">配達追加</h1>
     @if($id == 0)
     <div style="position: relative;"><a href="/k_haitatu"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
     @else
     <div style="position: relative;"><a href="/k_zshosai?id={{$id}}"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
     @endif
        </header>
<script type="text/javascript">
  function pDate()
{
	 var date = new Date()
  var year = date.getFullYear()
  var month = date.getMonth() + 1
  var day = date.getDate()
  var hours = date.getHours()
  var minutes = date.getMinutes()
    
  var toTargetDigits = function (num, digits) {
    num += ''
    while (num.length < digits) {
      num = '0' + num
    }
    return num
  }
  
  var yyyy = toTargetDigits(year, 4)
  var mm = toTargetDigits(month, 2)
  var dd = toTargetDigits(day, 2)
  var hh = toTargetDigits(hours, 2)
  var mi = toTargetDigits(minutes, 2)
	document.myFORM.htime.value = yyyy+"-"+mm+"-"+dd+"T"+hh+":"+mi;
}
           </script>
    <div id="main">
        @if($id == 0)
        <form action="/hinsert" method="post" name="myFORM">
           {{csrf_field()}}
            <body onLoad="pDate()">
            <p>配達日時<input type="datetime-local" name="htime"></p>
            </body>
            <p>配達者<input type="number" name="name"></p>
            <p>販売ID<input type="number" name="hid"></p>
           <p><input type="submit" name="kbtn" value="完了"></p>
        </form>
         @else
         <form action="/hinsert" method="post" name="myFORM">
           {{csrf_field()}}
             <body onLoad="pDate()">
            <p>配達日時<input type="datetime-local" name="htime"></p>
                 </body>
            <p>配達者<input type="number" name="name"></p>
            <p>販売ID<input type="number" name="hid" value="{{$id}}"></p>
           <p><input type="submit" name="kbtn" value="完了"></p>
        </form>
         @endif
</div>
@endsection