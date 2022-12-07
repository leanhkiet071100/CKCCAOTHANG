@extends('layouts.appadmin')
@section('sidebar')
    @parent
     <div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th width="5%" class="table-th">
                    <p> STT </p>
                </th>
                <th width="30%" class="table-th">
                    <p> Nội dung tố cáo </p>
                </th>
                <th width="20%" class="table-th">
                    <p> Người tố cáo</p>
                </th>
                 <th class="table-th">
                    <p> Duyệt tố cáo</p>
                </th>
                  <th class="table-th">
                    <p> chức năng</p>
                </th>

            </tr>
            @foreach ($lstReport as $key => $value)
                <tr>
                    <td class="bodydstocaobaiviet">
                        <p class="td-table table-tocao">{{$key + 1}}</p>
                    </td>
                    <td class="bodydstocaobaiviet">
                        <p class="td-table table-tocao">{{$value->reason}}</p>
                    </td>
                    <td class="bodydstocaobaiviet">
                        <p class="td-table table-tocao">
                            {{$value->user->first_name}} {{$value->user->last_name}}
                        </p>
                    </td>
                    <td class="bodydstocaobaiviet">
                        <p class="td-table table-tocao">
                            <button type="button" class="btn btn-danger">Duyệt tố cáo</button>
                        </p>
                    </td>
                    <td class="bodydstocaobaiviet">
                        <p class="td-table table-tocao icon-chucnang">
                            <a  href="{{ Route('adminDetailPost', ['id' => $value->id_post]) }}" title="Xem chi tiết bài viết"><i class="fa fa-pencil-square-o" ></i></a>
                        </p>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

<script>
    function hienchitietbaiviet(idpost){
        var formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('idpost', idpost);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                $('#chitietbaiviet').html(data);
                $('#chitietbaiviet').show();
                $('#baiviet').hide();
            }
        });
    }
</script>

@endsection

@include('thuvien.js')

@section('scripts')
    <script></script>
@endsection
