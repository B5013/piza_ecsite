@extends('admin.layout.auth')

@section('content')
 <header id="header">
        <h1 style="font-size: 60px;">従業員管理</h1>
     <div style="position: relative;"><a href="/reg"><input type="button" value="追加" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 250px;"></a><a href="/admin/home"><input type="button" value="戻る" style="color: #000; width: 100px; font-size: 25px; position: absolute; right: 100px;"></a></div>
        </header>
 <div id="main">
     
        <table class="alt">
            <thead>
                    <tr>
                        <th class="a">従業員ID </th>
                        <th class="b">従業員 </th>
                    </tr>
                    </thead>
                    <tbody>
          @foreach( $jyu as $jyus)    
            <tr>
            <td>{{ $jyus->id }}</td>
            <td>{{ $jyus->name}}</td>
            
            </tr>
        @endforeach()
            </tbody>
        </table>
</div>

@endsection