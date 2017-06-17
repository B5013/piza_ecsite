@extends('admin.layout.auth')

@section('content')
 

<header id="header">
     
        </header>
 <div id="main">
     {{$now}}
     
      @foreach( $test as $tests)   
      <img src="{{ $tests->img }}" width="350" height="250" alt=""/>
     <h2> {{ $tests->PRO_NAME }}</h2>
     @foreach($test2 as $test2s)
     @if( $tests->PRO_ID === $test2s->PRO_ID )
     @if( $test2s->GEN_ID === 1)
           <h2> {{ $test2s->SIZE_SIZE }}</h2>
           <h2> {{ $test2s->PRICE_PRICE }}</h2>
     @else
            <h2> {{ $test2s->PRICE_PRICE }}</h2>
     @endif
           @endif
           @endforeach
     
     @endforeach()
       
</div>

@endsection