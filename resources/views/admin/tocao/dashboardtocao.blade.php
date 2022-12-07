@extends('layouts.appadmin')
@section('sidebar')
    @parent
    <script>
        //load  danh sách
        $(document).ready(function() {
  
            $.ajax({
               url: "{{ route('load-report') }}",
               type: 'GET',
               success: function(data) {
                   $('#dstocao').html(data);
               }

            });
        
        });
    </script>
    <div class="dstocao" id="dstocao" name="dstocao">
        
    </div>
    @include('admin.tocao.formtocaotao')
@endsection

@include('thuvien.js')

@section('scripts')
    <script></script>
@endsection
