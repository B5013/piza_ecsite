@extends('admin.layout.auth')

@section('content')
<header id="header">
        <h1 style="font-size: 60px;">配達管理</h1>
     <div style="position: relative;"><a href="/k_zyutyuu"><input type="button" value="受注一覧" style="color: #000; width: 120px; font-size: 25px; position: absolute; right: 400px;"></a><a href="/k_htuika?id=0"><input type="button" value="追加" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 250px;"></a><a href="/admin/home"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
 <div id="main">
       <form action="#" method="post">
           {{csrf_field()}}
           <h1>配達一覧</h1>
           
        </form>

        <table class="alt">
             <thead>
                    <tr>
                        <th class="a">配達ID </th>
                        <th class="b">配達者　</th>
                        <th class="c">販売ID </th>
                        <th class="d">配達日時</th>
                        <th class="e">済み </th>
                    </tr>
                    </thead>
                    <tbody>
          @foreach( $del as $dels)    
            <tr>
            <td>{{ $dels->DEL_ID }}</td>
            <td>{{ $dels->name}}</td>
            <td><a href="/k_zshosai?id={{ $dels->SALE_ID }}">{{ $dels->SALE_ID }}</a></td>
            <td>{{ $dels->DEL_DAT}}</td>
                <form action="/check" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$dels->DEL_ID}}">
            @if($dels->DEL_CHECK == 1)
                <td><input type="checkbox" name="check" value="1" style="height: 25px; width: 25px;" checked="checked"><input type="submit" name="kbtn" value="チェック" ></td>
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