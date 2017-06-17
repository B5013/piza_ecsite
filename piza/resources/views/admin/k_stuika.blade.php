@extends('admin.layout.auth')

@section('content')
        <header id="header">
        <h1 style="font-size: 60px;">商品追加</h1>
            <div style="position: relative;"><a href="/k_shohin"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>    
        
        </header>
        <script type="text/javascript">
  function pDate()
{
	 var date = new Date()
  var year = date.getFullYear()
  var month = date.getMonth() + 1
  var day = date.getDate()

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
	document.myFORM.stime.value = yyyy+"-"+mm+"-"+dd;
}
           </script>

    <div id="main">
      
       <form action="/insert" method="post" name="myFORM">
           {{csrf_field()}}
           <p>商品名 <input type="text" name="name"></p>
           <p>価格 サイズ M・なし<input type="text" name="pricem">円</p>
           <p>サイズ L<input type="text" name="pricel">円</p>
           <body onLoad="pDate()">
           <p>開始日<input type="date" name="stime">
               時間<input type="time" name="stime2" value="00:00">
               終了日<input type="date"name="etime" value="2100-12-31">
               時間<input type="time" name="etime2" value="00:00">
           </p></body>
           <div id="comboField"><p>ジャンル
<select name="select">
<option value="1">ピザ</option>
<option value="2">ドリンク</option>
<option value="3">サイドメニュー</option>
</select>
           </p></div>
           <p>画像：</p>
                 <p id="output" class="output"></p>
<p id="error" class="error none"></p>
<div id="output"></div>
<input type="file" multiple id="file" name="img">
                <script>
      // ファイルが選択されたらイベントを実行する
document.getElementById( "file" ).addEventListener( "change", function() {
	try {
		// フォームで選択された全ファイルを取得
		var fileList = this.files ;
		// 書き出し用のHTML
		document.getElementById( "output" ).innerHTML = "" ;
		// 個数分の画像を表示する
		for( var i=0,l=fileList.length; l>i; i++ ) {
			// [FileReader]クラスを起動
			var fileReader = new FileReader() ;
			// 読み込み後の処理を決めておく
			fileReader.onload = function() {
				// データURIを取得
				var dataUri = this.result ;
				// 書き出し用のHTML (src属性にデータURIを指定)
				document.getElementById( "output" ).innerHTML += '<a href="' + dataUri + '" target="_blank"><img src="' + dataUri + '"></a>' ;
			}
			// ファイルをデータURIとして読み込む
			fileReader.readAsDataURL( fileList[i] ) ;
		}
// エラーを表示
		errorElement.className = "error none" ;

	} catch ( msg ) {
		// エラーを表示
		errorElement.className = "error" ;
		errorElement.textContent = msg ;
		console.error( msg ) ;
	}
} ) ;
// エラー表示用の要素
var errorElement = document.getElementById( "error" ) ;
// 初期化
function initialize() {
	document.getElementById( "file" ).value = "" ;
	document.getElementById( "output" ).innerHTML = "" ;
}
</script>
           <p>コメント</p>
           <p><textarea name="com"></textarea></p>
             <p>アレルギー</p>
           @foreach($all as $alls)
           @if($alls->ALLE_WHEAT === "なし" )
           <input type="checkbox" name="a[]" value="{{$alls->ALLE_ID}}" style="height: 25px; width: 25px;" checked>{{$alls->ALLE_WHEAT}}
           @else
           <input type="checkbox" name="a[]" value="{{$alls->ALLE_ID}}" style="height: 25px; width: 25px;">{{$alls->ALLE_WHEAT}}
           @endif
           @endforeach
           <p><input type="submit" name="kbtn" value="完了"></p>
        </form>
        
        
        </div>
    @endsection