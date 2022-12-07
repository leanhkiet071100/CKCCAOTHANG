@extends('layouts.appadmin')


@section('sidebar')
@parent

<div class="col-md-12">
    <a href="{{route('accountAdmin')}}"><button type="button" class="btn btn-outline-primary"><i
                class=" ti-arrow-left"></i>Quay lại</button></a>
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">Tạo tài khoản</h5>

            <ul class="breadcrumb-title b-t-default p-t-10">
                <li class="breadcrumb-item">
                    <a href="{{route('accountAdmin')}}"> <i class="fa fa-home"></i> Tài khoản admin </a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Tạo tài khoản</a>
                </li>

            </ul>
        </div>
    </div>

</div>



<div style="    display: block;
    margin-left: auto;
    margin-right: auto;" class="col-sm-8">
    <div class="card">
        <div class="card-header">
            <h5>Thông tin tài khoản</h5>
        </div>
        <form action="{{route('adminAddAccountAdmin')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Họ</label>
                            <input name="first_name" type="text" class="form-control" placeholder="Nhập họ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Tên</label>
                            <input name="last_name" type="text" class="form-control" placeholder="Nhập tên">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Nhập địa chỉ email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Số điện thoại</label>
                            <input name="phone_number" type="text" class="form-control"
                                placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Mật khẩu</label>
                            <input name="password" type="text" class="form-control" placeholder="Nhập địa chỉ email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Xác nhận mật khẩu</label>
                            <input name="confirm_password" type="text" class="form-control"
                                placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-datetime-local" class="col-form-label">Ngày sinh</label>
                    <input name="birth_date" class="form-control" type="datetime-local"
                        value="{{Carbon\Carbon::now('Asia/Ho_Chi_Minh')}}" id="demo-datetime-local">
                </div>
                <div class="form-group">
                    <label for="demo-input-file" class="col-form-label">Ảnh đại diện</label>
                    <input name="avatar" class="form-control" type="file" id="demo-input-file">
                </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-primary me-2">Hoàn tất</button>

            </div>

        </form>

    </div>
</div>


@endsection