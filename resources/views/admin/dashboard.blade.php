@extends('layouts.appadmin')


@section('sidebar')
<<<<<<< HEAD
@parent

<div class="col-md-12">
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">Tài khoản người dùng</h5>

            <ul class="breadcrumb-title b-t-default p-t-10">
                <li class="breadcrumb-item">
                    <a href="{{route('adminDashboard')}}"> <i class="fa fa-home"></i> Tài khoản người dùng </a>
                </li>


            </ul>
        </div>
    </div>

</div>

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-blue order-card">
        <div class="card-block">
            <h6 class="m-b-20">Tổng số tài khoản</h6>
            <h2 class="text-right"><i class="ti-world f-left"></i><span>{{$totalAccount}}</span></h2>

        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-green order-card">
        <div class="card-block">
            <h6 class="m-b-20">Tài khoản đã kích hoạt</h6>
            <h2 class="text-right"><i class="ti-check-box f-left"></i><span>{{$totalAccountActive}}</span></h2>

        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-yellow order-card">
        <div class="card-block">
            <h6 class="m-b-20">Tài khoản chưa kích hoạt</h6>
            <h2 class="text-right"><i class="ti-layout-placeholder f-left"></i><span>{{$totalAccountUnActive}}</span>
            </h2>

        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-pink order-card">
        <div class="card-block">
            <h6 class="m-b-20">Tài khoản bị khóa</h6>
            <h2 class="text-right"><i class="ti-na f-left"></i><span>{{$totalAccountBlock}}</span></h2>

        </div>
    </div>
</div>

<div class="col-sm-12">
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
                                @foreach($lstAccountUser as $account => $accUser)
                                <tr>
                                    <td>{{$accUser->id}}</td>
                                    <td>{{$accUser->email}}</td>
                                    <td>{{$accUser->phone_number}}</td>
                                    <td>{{$accUser->first_name}}</td>
                                    <td>{{$accUser->last_name}}</td>
                                    <td>{{$accUser->birth_date}}</td>
                                    <td> @if($accUser->status == 0) <span class="label label-warning">Chưa kích
                                            hoạt</span> @elseif($accUser->status == 1) <span
                                            class="label label-success">Đã kích
                                            hoạt</span> @else <span class="label label-danger">Đang bị khóa</span>
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
                                                    href="{{Route('getInfoUser',['id'=>$accUser->id])}}">Xem chi
                                                    tiết</a>
                                                <a class="dropdown-item waves-effect waves-light" href="#">Khóa tải
                                                    khoản</a>
                                                <a class="dropdown-item waves-effect waves-light" href="#">Xem
                                                    Report</a>



                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="text-center phantrang" id="phantrang">
                        {!!$lstAccountUser->links()!!}
                    </div>

                </div>



            </div>
        </div>
=======
    @parent
    <div class="noidungtaikhoan" id="noidungtaikhoan" name="noidungtaikhoan">
        @include('admin.taikhoan.tongkettaikhoan')
>>>>>>> Kiet-dangnhap
    </div>
@endsection

<<<<<<< HEAD
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
=======
@include('thuvien.js')
@section('scripts')
    <script>
        // $(".phantrang").on("click", "a", function(e) {
        //     e.preventDefault();
        //     var page = $(this).attr('href').split('page=')[1];
        //     $.ajax({
        //         url: "{{ route('getAccountUser') }}",	
        //         type: 'GET',
        //         data: {
        //             page: page
        //         },
        //         success: function(data) {
        //             console.log(data);
        //             $('#phantrang').html(data);
        //         }
        //     });
        // });

        // $(".phantrang").on("click", "a", function(e) {
        //     e.preventDefault();
        //     var page = $(this).attr('href').split('page=')[1];
        //     fetch_data(page);
        // });

        // function fetch_data(page){
        //     $.ajax({
        //         url: "/ckcsocialnetwork/admin?page="+page,
        //         success: function(data) {
        //             $('#noidungtaikhoan').html(data);
        //         }
        //     })
        // }
        $(".phantrang").on("click", "a", function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            //khoa phan trang
            // $(".phantrang").find("a").removeClass("active");
            // $(this).addClass("active");
            //end khoa phan trang

            $.ajax({
                url: "{{ route('getAccountUser') }}",
                type: 'GET',
                data: {
                    page: page
                },
                success: function(data) {
                    $('#dstaikhoan').html(data);
                }
            });

        });

        function menuthaotac(idtaikhoan) {
            var menuthaotac = document.getElementById('nemuthaotac' + idtaikhoan);
            if (menuthaotac.style.display == 'none') {
                menuthaotac.style.display = 'block';
            } else {
                menuthaotac.style.display = 'none';
            }
        }
    </script>
@endsection
>>>>>>> Kiet-dangnhap
