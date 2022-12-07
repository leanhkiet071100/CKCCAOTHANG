<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>cao thắng</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{URL('assets/css/main.min.css')}}">
    <link rel="stylesheet" href="{{URL('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{URL('assets/css/color.css')}}">
    <link rel="stylesheet" href="{{URL('assets/css/responsive.css')}}">

</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="container-fluid pdng0">
            <div class="row merged">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="land-featurearea">
                        <div class="land-meta">
                            <div class="friend-logo">
                                <span><img src="{{URL('assets/images/signin-picture.png')}}" alt="" width="700px"
                                        height="200px"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                    <div class="login-reg-bg">
                        <div class="log-reg-area sign">

                            <h2 class="log-title">Quên mật khẩu</h2>
                            <label class="control-label" for="input">Chúng tôi sẽ gửi thư xác nhận vào địa chỉ mail của
                                bạn, vui lòng kiểm tra thư.</label><i class="mtrl-select"></i>
                            <form action="{{route('reset-password-noAuth')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" id="input" required="required" name="email" />
                                    <label class=" control-label" for="input">Địa chỉ email</label><i
                                        class="mtrl-select"></i>
                                </div>

                                <div class="submit-btns">
                                    <button class="mtr-btn " type="submit"><span>Tiếp tục</span></button>
                                    <a href="{{route('login')}}"><button class="mtr-btn "
                                            type="button"><span>Hủy</span></button></a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{URL('assets/js/main.min.js')}}"></script>
    <script src="{{URL('assets/js/script.js')}}"></script>

</body>

</html>