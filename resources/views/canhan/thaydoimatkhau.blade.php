@extends('layouts.appnguoidung')

@section('title', 'mạng xã hội')
@section('sidebar')
@parent
<div class="central-meta">
    <div class="editing-info">
        @if($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
        @endif
        <h5 class="f-title"><i class="ti-lock"></i>THAY ĐỔI MẬT KHẨU</h5>

        <form method="post" action="{{route('taikhoan.update-password-user')}}">
            @csrf
            <div class="form-group">
                <input name="current_password" type="password" required="required" value="{{old('urrent_password')}}" />
                <label class="control-label" for="input">Mật khẩu hiện tại</label><i class="mtrl-select"></i>
            </div>
            @if($errors->has('current_password'))
            <div style="color: red">
                {{$errors->first('current_password')}}
            </div>
            @endif
            <div class="form-group">
                <input name="new_password" type="password" id="input" required="required" value="{{old('new_password')}}" />
                <label class="control-label" for="input">Mật khẩu mới</label><i class="mtrl-select"></i>
            </div>
            @if($errors->has('new_password'))
            <div style="color: red">
                {{$errors->first('new_password')}}
            </div>
            @endif
            <div class="form-group">
                <input name="confirm_new_password" type="password" required="required"  value="{{old('confirm_new_password')}}" />
                <label class="control-label" for="input">Nhập lại mật khẩu</label><i class="mtrl-select"></i>
            </div>
            @if($errors->has('confirm_new_password'))
            <div style="color: red">
                {{$errors->first('confirm_new_password')}}
            </div>
            @endif
            <a class="forgot-pwd underline" title="" href="{{route('forget-password')}}">Quên mật khẩu</a>
            <div class="submit-btns">
                <button type="button" class="mtr-btn"><span>Hủy</span></button>
                <button type="submit" class="mtr-btn"><span>Cập nhật</span></button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('content')
<p>This is my body content.</p>
@endsection