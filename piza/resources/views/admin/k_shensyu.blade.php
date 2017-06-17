@extends('admin.layout.auth')

@section('content')
        <header id="header">
        <h1 style="font-size: 60px;">商品編集</h1>
            <div style="position: relative;"><a href="/k_shohin"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>  
        </header>
        
    <div id="main">
       <form action="/update" method="post">
           {{csrf_field()}}
           <p><input type="hidden" name="id" value="{{ $shohin->PRO_ID }}">
           <input type="hidden" name="mid" value="{{ $shohin2->PRICE_ID }}">  
            <input type="hidden" name="sid" value="{{ $shohin4->SALP_ID }}">             
           </p>
           <p>商品名 <input type="text" name="name" value="{{ $shohin->PRO_NAME}}"></p>
           @if ($genre->GEN_ID === 1)
           <input type="hidden" name="lid" value="{{ $shohin3->PRICE_ID }}">
           <p>価格 サイズM<input type="text" name="pricem" value="{{$shohin2->PRICE_PRICE}}">円</p>
           <p>サイズL <input type="text" name="pricel" value="{{ $shohin3->PRICE_PRICE}}">円</p>
           @else
           <p>価格 <input type="text" name="pricem" value="{{$shohin2->PRICE_PRICE}}">円</p>
           @endif
           <p>開始日<input type="date" name="stime" value="{{ $shohin4->SALP_START_DATE }}">
               時間<input type="time" name="stime2" value="{{ $shohin4->SALP_START_TIME }}">
               終了日<input type="date" name="etime" value="{{ $shohin4->SALP_END_DATE
                   }}">
               時間<input type="time" name="etime2" value="{{ $shohin4->SALP_END_TIME }}">
            </p>
           <div id="comboField"><p>ジャンル
<select name="select">
<option value="{{$genre->GEN_ID}}">{{$genre->GEN_NAME}}</option>
<option value="1">ピザ</option>
<option value="2">ドリンク</option>
<option value="3">サイドメニュー</option>
               </select></p></div>
            <p>画像：</p>
                  <p id="output" class="output"><img src="{{ $shohin->img }}" name="img2"></p>
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
               <p><textarea name="com">{{ $shohin->PRO_COMMENT }}</textarea></p>
                 <p>アレルギー</p>
           @foreach($all as $alls)
           @foreach($all2 as $all2s)
           @if( $alls->ALLE_ID === $all2s->ALLE_ID )
           <input type="checkbox" name="a[]" value="{{$alls->ALLE_ID}}" checked="checked">{{$alls->ALLE_WHEAT}}
           @break
           @elseif($loop->last)
           <input type="checkbox" name="a[]" value="{{$alls->ALLE_ID}}">{{$alls->ALLE_WHEAT}}
           @endif
           @endforeach
           @endforeach
           <p><input type="submit" name="kbtn" value="完了"></p>
        </form>
        </div>
   @endsection