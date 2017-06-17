@extends('admin.layout.auth')

@section('content')
 <header id="header">
        <h1 style="font-size: 60px;">ブラックリスト</h1>
     <div style="position: relative;"><a href="k_btuika?id=0"><input type="button" value="追加" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 250px;"></a><a href="/admin/home"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
 <div id="main">
           
        <table class="alt">
            <thead>
                    <tr>
                        <th class="a">顧客ID </th>
                        <th class="b">顧客名 </th>
                        <th class="a">内容 </th>
                        <th class="b">登録日時 </th>
                    </tr>
                    </thead>
                    <tbody>
                    
          @foreach($black as $blacks)    
            <tr>
            <td><a href="/k_kshosai?id={{ $blacks->CL_ID }}">{{ $blacks->CL_ID }}</a></td>
            <td>{{ $blacks->name}}</td>
            <td>{{ $blacks->BL_Date }}</td>
            <td>{{ $blacks->created_at}}</td>
            </tr>
        @endforeach()
            </tbody>
        </table>

 
       
</div>

@endsection