<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đăng ký tài khoản</title>
</head>
<body>
    <h1>XÁC NHẬN ĐĂNG KÝ TÀI KHOẢN</h1>
    Xin chào {{$account->first_name}} {{$account->last_name}}</br>
    Vui lòng click vào bên dưới để hoàn tất đăng ký! </br>
    <a href="{{route('complete_verify',['account'=> $account->id,'token'=>$account->token])}}">Xác nhận đăng ký tài khoản</a>
        
</body>

</html>