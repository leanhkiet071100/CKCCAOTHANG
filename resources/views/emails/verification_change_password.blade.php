<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đăng ký tài khoản</title>
</head>

<body>
    <h1>THAY ĐỔI MẬT KHẨU TÀI KHOẢN</h1>
    Xin chào {{$account->first_name}} {{$account->last_name}}</br>
    Bạn vừa thực hiện việc đổi mật khẩu thành công! </br>
    Nếu hành động này không phải từ phía bạn, hãy tiến hành xác nhận và hành động để bảo mật tài khoản !
    <!-- <a href="{{route('complete_verify',['account'=> $account->id,'token'=>$account->token])}}">Hoàn tất đăng ký tài
        khoản</a> -->
</body>

</html>