@extends('admin.layout.auth')

@section('content')
 

<header id="header">
    <h1 style="font-size: 60px;">売上管理</h1>   
    <div style="position: relative;"><a href="/admin/home"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
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
	document.myFORM.time.value = yyyy+"-"+mm+"-"+dd+"T"+hh+":"+mi;
}
           </script>
 <div id="main">
    <h2>条件指定</h2>
     <form action="/k_toukei" method="post" name="myFORM">
     {{csrf_field()}}
         <p>カテゴリ： <select name="gen">
<option value="0">すべて表示</option>
<option value="1">ピザ</option>
<option value="2">サイドメニュー</option>
<option value="3">ドリンク</option>
</select></p>
         <p>金額順番： <select name="or">
<option value="asc">昇順</option>
<option value="desc">降順</option>
</select></p>
         <body onLoad="pDate()">
         <p>期間：　<input type="datetime-local" name="time">から現在時刻まで</p>
         </body>
         <p><input type="submit" value="集計"></p>
     </form>
       
</div>

@endsection