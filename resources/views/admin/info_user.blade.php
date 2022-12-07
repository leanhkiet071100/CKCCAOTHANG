@extends('layouts.appadmin')


@section('sidebar')
<<<<<<< HEAD
@parent

<div class="col-md-12">
    <a href="{{route('adminDashboard')}}"><button type="button" class="btn btn-outline-primary"><i
                class=" ti-arrow-left"></i>Quay lại</button></a>
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">Thôn tin tài khoản</h5>


            <ul class="breadcrumb-title b-t-default p-t-10">
                <li class="breadcrumb-item">
                    <a href="{{route('adminDashboard')}}"> <i class="fa fa-home"></i> </a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Tài khoản</a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Thôn tin tài khoản</a>
                </li>
            </ul>

        </div>

    </div>


</div>

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-blue order-card">
        <div class="card-block">
            <h6 class="m-b-20">Số bài viết</h6>
            <h2 class="text-right"><i class="ti-bookmark f-left"></i><span>{{$totalPost}}</span></h2>
=======
    @parent
>>>>>>> Kiet-dangnhap

    <div class="col-md-12">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">Thôn tin tài khoản</h5>


                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ route('adminDashboard') }}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Tài khoản</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Thôn tin tài khoản</a>
                    </li>
                </ul>

            </div>

        </div>


    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Số bài viết</h6>
                <h2 class="text-right"><i class="ti-bookmark f-left"></i><span>{{ $totalPost }}</span></h2>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Bạn bè</h6>
                <h2 class="text-right"><i class="ti-user f-left"></i><span>{{ $totalFriend }}</span></h2>

            </div>
        </div>
    </div>
    <!-- <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-block">
                            <h6 class="m-b-20"></h6>
                            <h2 class="text-right"><i class="ti-reload f-left"></i><span>0</span></h2>

                        </div>
                    </div>
                </div> -->
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-pink order-card">
            <div class="card-block">
                <h6 class="m-b-20">Lượt thích</h6>
                <h2 class="text-right"><i class="ti-thumb-up f-left"></i><span>{{ $totalLike }}</span></h2>

            </div>
        </div>
    </div>

    <div class="col-md-12 order-md-2">

        <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Thông tin cá nhân</h5>

                </div>
                <div class="card-body border-top pro-det-edit collapse show" id="pro-det-edit-1">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bolder">Họ</label>
                            <div class="col-sm-9">
                                {{ $user->first_name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bolder">Tên</label>
                            <div class="col-sm-9">
                                {{ $user->last_name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bolder">Giới tính</label>
                            <div class="col-sm-9">
                                {{ $user->sex }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bolder">Ngày sinh</label>
                            <div class="col-sm-9">
                                @if ($user->birth_date != null)
                                    {{ \Carbon\Carbon::parse($user->birth_date)->format('d - m - Y') }}
                                @else
                                    Chưa có thông tin
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bolder">Ngày tạo tài khoản</label>
                            <div class="col-sm-9">
                                {{ \Carbon\Carbon::parse($user->created_at)->format('d - m - Y') }}
                            </div>
                        </div>

                    </form>
                </div>

            </div>
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Thông tin liên hệ</h5>

                </div>
                <div class="card-body border-top pro-dont-edit collapse show" id="pro-dont-edit-1">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bolder">Số điện thoại</label>
                            <div class="col-sm-9">
                                @if ($user->phone_number != null)
                                    {{ $user->phone_number }}
                                @else
                                    Chưa có thông tin
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bolder">Địa chỉ email</label>
                            <div class="col-sm-9">
                                {{ $user->email }}
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
    
    </script>
@endsection
