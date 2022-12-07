@extends('layouts.appnguoidung')

@section('title', 'mạng xã hội')

@section('css')

@endsection

@section('sidebar')
    @parent
    <div class="central-meta">
        <div class="editing-info">
            <h5 class="f-title"><i class="ti-info-alt"></i> THAY ĐỔI THÔNG TIN CÁ NHÂN</h5>

            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            @endif


            <form method="post" action="{{ route('taikhoan.postthaydoithongtincanhan') }}">
                @csrf
                <div class="form-group half">
                    <input type="text" id="input" required="required" value="{{old('ho') ?? Auth::user()->first_name }}" name="ho" />
                    <label class="control-label" for="input">Họ</label><i class="mtrl-select"></i>
                    @if ($errors->has('ho'))
                        <div style="color: red">
                            {{ $errors->first('ho') }}
                        </div>
                    @endif
                </div>
                <div class="form-group half">
                    <input type="text" required="required" value="{{old('ten') ?? Auth::user()->last_name }}" name="ten" value="{{old('ten')}}"/>
                    <label class="control-label" for="input">Tên</label><i class="mtrl-select"></i>
                    @if ($errors->has('ten'))
                        <div style="color: red">
                            {{ $errors->first('ten') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="text" required="required" value="{{ old('sodienthoai') ?? Auth::user()->phone_number }} " name="sodienthoai" value="{{old('sodienthoai')}}" />
                    <label class="control-label" for="input">Só điện thoại</label><i class="mtrl-select"></i>
                    @if ($errors->has('sodienthoai'))
                        <div style="color: red">
                            {{ $errors->first('sodienthoai') }}
                        </div>
                    @endif
                </div>
                <div class="dob">
                    <div class="form-group">
                        <input type="date" required="required" value="{{ old('ngaysinh') ??  Auth::user()->birth_date }}" name="ngaysinh" />
                    </div>
                </div>
                <div class="form-radio" name="gioitinh">

                    <div class="radio">
                        <label>
                            <input type="radio" {{ Auth::user()->sex == 1 ? 'checked=" checked" ' : '' }} name="gioitinh"
                                value="1" {{ old('gioitinh') == 1 ? 'checked' : '' }}><i class="check-box"></i>Nam
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" {{ Auth::user()->sex == 2 ? 'checked=" checked" ' : '' }} name="gioitinh"
                                value="2" {{ old('gioitinh') == 2 ? 'checked' : '' }}><i class="check-box"></i>Nữ
                        </label>
                    </div>
                </div>

        </div>

        <div class="submit-btns">
     
            <button type="submit" class="mtr-btn"><span>Cập nhật</span></button>
        </div>
        </form>
    </div>
    </div>
@endsection

@section('scripts')

@endsection
