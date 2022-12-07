@extends('layouts.appadmin')


@section('sidebar')
@parent

<div class="col-md-12">
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">Tài khoản admin</h5>

            <ul class="breadcrumb-title b-t-default p-t-10">
                <li class="breadcrumb-item">
                    <a href="{{route('accountAdmin')}}"> <i class="fa fa-home"></i> Tài khoản admin </a>
                </li>


            </ul>
        </div>
    </div>

</div>



<div class="col-sm-12">
    <a href="{{route('adminCreateAccount')}}"><button type="button" class="btn btn-primary"><i class="ti-plus"></i>Tạo
            tài
            khoản</button></a>
    <div class="card tabs-card">
        <div class="card-block p-0">

            <div class="tab-content card-block">
                <div class="tab-pane active" id="home3" role="tabpanel" aria-expanded="false">

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID Tài khoản</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Họ</th>
                                    <th>Tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                @foreach($lstAccountAdmin as $account => $accadmin)
                                <tr>
                                    <td>{{$accadmin->id}}</td>
                                    <td>{{$accadmin->email}}</td>
                                    <td>{{$accadmin->phone_number}}</td>
                                    <td>{{$accadmin->first_name}}</td>
                                    <td>{{$accadmin->last_name}}</td>
                                    <td>{{$accadmin->birth_date}}</td>
                                    <td> @if($accadmin->status == 0) <span class="label label-danger">Bị khóa</span>
                                        @elseif($accadmin->status == 1) <span class="label label-success">Hoạt
                                            động</span>
                                        @endif</td>
                                    <td>
                                        <div class="btn-group dropdown-split-info">
                                            <button type="button" class="btn btn-info"><i
                                                    class="icofont icofont-info-square"></i>Thao tác</button>
                                            <button type="button"
                                                class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start"
                                                style="position: absolute; transform: translate3d(86px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item waves-effect waves-light"
                                                    href="{{Route('getInfoUser',['id'=>$accadmin->id])}}">Xem chi
                                                    tiết</a>
                                                <a class="dropdown-item waves-effect waves-light" href="#">Khóa tải
                                                    khoản</a>
                                                <a class="dropdown-item waves-effect waves-light" href="#">Xóa tài
                                                    khoản</a>



                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="text-center phantrang" id="phantrang">

                    </div>

                </div>



            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
$document.on('click', '.phantrang a', function(event) {
    event.preventDefault();
    alert('ok');
});

$(".phantrang").on("click", "a", function() {
    alert('ok');
});
</script>
@endsection