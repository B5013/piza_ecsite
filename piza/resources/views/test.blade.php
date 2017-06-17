<!DOCTYPE html>
<html lang="ja">
<head> 
	<meta charset="UTF-8">
    <title>javascript  *  TIME OUT</title>
    
</head>

	<body>
      <form action="/insert2" method="post">
           {{csrf_field()}}
           <p>アレルギー</p>
           <input type="checkbox" name="a[]" value="1">小麦
           <input type="checkbox" name="a[]" value="2">卵
           <input type="checkbox" name="a[]" value="3">ソバ
           <input type="checkbox" name="a[]" value="4">落花生<br>
           <input type="checkbox" name="a[]">小麦
           <input type="checkbox" name="a[]">卵
           <input type="checkbox" name="a[]">ソバ
           <input type="checkbox" name="a[]">落花生<br>
           <input type="checkbox" name="a[]">小麦
           <input type="checkbox" name="a[]">卵
           <input type="checkbox" name="a[]">ソバ
           <input type="checkbox" name="a[]">落花生<br>
           <input type="checkbox" name="a[]">小麦
           <input type="checkbox" name="a[]">卵
           <input type="checkbox" name="a[]">ソバ
           <input type="checkbox" name="a[]">落花生<br>
           <p><input type="submit" name="kbtn" value="完了"></p>
        </form>

</body>
</html>