<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL('assets/css/main.min.css')}}">
    <link rel="stylesheet" href="{{URL('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{URL('assets/css/color.css')}}">
    <link rel="stylesheet" href="{{URL('assets/css/responsive.css')}}">
</head>

<body>
    <div class="col-lg-6">

        <div class="central-meta" style="margin-left: 500px;margin-top: 200px;">
            <div class="editing-info">

                <h5 class="f-title"><i class="ti-lock"></i>ĐẶT LẠI MẬT KHẨU</h5>
                <form method="post" action="{{route('verification-forget-password')}}">
                    @csrf
                    <input type="hidden" name="token" value="{{$_GET['token']}}">
                    <input type="hidden" name="id" value="{{$_GET['id']}}">
                    <div class="form-group">
                        <input name="new_password" type="password" id="input" required="required">
                        <label class="control-label" for="input">Mật khẩu mới</label><i class="mtrl-select"></i>
                    </div>
                    <div class="form-group">
                        <input name="confirm_new_password" type="password" required="required">
                        <label class="control-label" for="input">Nhập lại mật khẩu mới</label><i
                            class="mtrl-select"></i>
                    </div>
                    <div class="submit-btns">
                        <button type="submit" class="mtr-btn"><span>Xác nhận</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>