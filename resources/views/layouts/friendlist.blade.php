@extends('layouts.appnguoidung')

@section('content')
      @include('layouts.menucanhan') 
@endsection
@section('sidebar')
    @parent
    <div class="loadtrangmenu" id="loadtrangmenu">
        
        <div class="loadMore" id="loadMore" name="loadMore">
        @include('canhan.friendlist')
        
        </div>
    </div>
@endsection