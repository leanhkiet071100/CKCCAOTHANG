@extends('layouts.appadmin')


@section('sidebar')
    @parent

    <div class="col-md-12">
        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">Bài viết</h5>

                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ route('adminPost') }}"> <i class="fa fa-home"></i> Bài viết </a>
                    </li>


                </ul>
            </div>
        </div>

    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Tổng số bài viết</h6>
                <h2 class="text-right"><i class="ti-world f-left"></i><span>{{ $totalPost }}</span></h2>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Bài viết tháng này</h6>
                <h2 class="text-right"><i class="ti-check-box f-left"></i><span>0</span></h2>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Đang chờ xử lý</h6>
                <h2 class="text-right"><i class="ti-layout-placeholder f-left"></i><span>{{ $lstPostReporting }}</span>
                </h2>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-pink order-card">
            <div class="card-block">
                <h6 class="m-b-20">Bài viết bị xóa</h6>
                <h2 class="text-right"><i class="ti-na f-left"></i><span>{{ $lstPostBlock }}</span></h2>

            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="card tabs-card">
            <div class="card-block p-0">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs" role="tablist">
                    <li class="nav-item complete">
                        <a class="nav-link" data-toggle="tab" href="#home3" role="tab" aria-expanded="false"><i
                                class="fa fa-home"></i>Danh sách bài viết</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel" aria-expanded="false">
                        <div class="dsbaiviet" id="dsbaiviet">
                        @include('admin.baiviet.dsbaiviet')
                        </div>
                        <div class="text-center phantrang" id="phantrang">
                            {{ $lstPost->links() }}
                            <div id="test" name="test" class="test"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('thuvien.js')
@section('scripts')
    <script>
        $(".phantrang").on("click", "a", function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            //khoa phan trang
            // $(".phantrang").find("a").removeClass("active");
            // $(this).addClass("active");
            //end khoa phan trang

            $.ajax({
                url: "{{ route('getPost') }}",
                type: 'GET',
                data: {
                    page: page
                },
                success: function(data) {
                    console.log(data);
                    $('#dsbaiviet').html(data);
                }
            });
        });


        
    </script>
@endsection
