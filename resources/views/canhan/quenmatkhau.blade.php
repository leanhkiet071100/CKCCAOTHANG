@extends('layouts.appnguoidung')

@section('title', 'mạng xã hội')



@section('sidebar')
    @parent
    <div class="central-meta">
        <div class="editing-info">
            @if ($errors->has('error'))
                <div class="alert alert-danger">
                    {{ $errors->first('error') }}
                </div>
            @endif
            <h5 class="f-title"><i class="ti-lock"></i>QUÊN MẬT KHẨU</h5> <br>
            <label class="control-label" for="input">Chúng tôi sẽ gửi thư xác nhận vào địa chỉ mail bạn đăng ký tài
                khoản</label><i class="mtrl-select"></i>
            <form method="post" action="{{ route('reset-password') }}">
                @csrf
                <div class="form-group">
                    <input name="email" type="text" required="required" />
                    <label class="control-label" for="input">Địa chỉ mail đăng ký tài khoản</label><i
                        class="mtrl-select"></i>
                </div>
                <div class="submit-btns">
                    <button type="button" class="mtr-btn"><span>Hủy</span></button>
                    <button type="submit" class="mtr-btn"><span>Gửi</span></button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection
