<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>CKC Social Network</title>
    <link rel="icon" href="{{ URL('assets/images/LogoCKCSocialNetwork.png') }}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{ URL('assets/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/css/color.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/css/responsive.css') }}">

</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="container-fluid pdng0">
            <div class="row merged">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="land-featurearea">
                        <div class="land-meta">
                            <a href="https://caothang.edu.vn/" title="" class="folow-me"> <img
                                    src="{{ URL('assets/images/bannercaothang.png') }}" alt=""
                                    class="bannercaothang"></a>

                            <div class="friend-logo">
                                <span><img src="{{ URL('assets/images/signin-picture.png') }}" alt=""
                                        width="700px" height="200px"></span>
                            </div>
                            <a href="https://caothang.edu.vn/" title="" class="folow-me">THAM QUAN TRƯỜNG</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-reg-bg">
                        <div class="log-reg-area sign" id="formdangnhap">
                            @if ($errors->has('error'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('error') }}
                                </div>
                            @endif
                            <h2 class="log-title">đăng nhập</h2>
                            <form action="{{ route('dangnhap') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" id="input" required="required" name="email"
                                        value="{{ old('email') }}" />
                                    <label class="control-label" for="input">Tài khoản</label><i
                                        class="mtrl-select"></i>
                                </div>
                                @if ($errors->has('email'))
                                    <div style="color: red">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="password" required="required" name="matkhau"
                                        value="{{ old('matkhau') }}" />
                                    <label class="control-label" for="input">Mật khẩu</label><i
                                        class="mtrl-select"></i>
                                </div>
                                @if ($errors->has('matkhau'))
                                    <div style="color: red">
                                        {{ $errors->first('matkhau') }}
                                    </div>
                                @endif
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked="checked" /><i class="check-box"></i>nhớ tài
                                        khoản.
                                    </label>
                                </div>
                                <a href="{{ route('forgot-password-noAuth') }}" title=""
                                    class="forgot-pwd">Quên
                                    mật khẩu
                                    ?</a>
                                <div class="submit-btns">
                                    <button class="mtr-btn signin" type="submit"><span>Đăng nhập</span></button>
                                    <button class="mtr-btn signup" type="button" id="dangki"><span>Đăng
                                            kí</span></button>
                                </div>
                                <a href="{{ route('goggle.login') }}">
                                    <div class="logingoggle">
                                        ĐĂNG NHẬP BẰNG GOGGLE <img src="{{ URL('assets/images/icongoogle.png') }}"
                                            width="50px" height="50px" alt="">
                                    </div>
                                </a>
                            </form>

                        </div>
                        <div class="log-reg-area reg" id="formdangki">
                            @if ($errors->has('error'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('error') }}
                                </div>
                            @endif
                            <h2 class="log-title">ĐĂNG KÍ</h2>
                            <form method="post" action="{{ route('dangky') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="first_name" required="required" />
                                    <label class="control-label" for="input">Họ </label><i class="mtrl-select"></i>

                                </div>
                                @if ($errors->has('first_name'))
                                    <div style="color: red">
                                        {{ $errors->first('first_name') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="text" name="last_name" required="required" />
                                    <label class="control-label" for="input">Tên</label><i
                                        class="mtrl-select"></i>

                                </div>
                                @if ($errors->has('last_name'))
                                    <div style="color: red">
                                        {{ $errors->first('last_name') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="text" name="email" required="required" />
                                    <label class="control-label" for="input">Email</label><i
                                        class="mtrl-select"></i>

                                </div>
                                @if ($errors->has('email'))
                                    <div style="color: red">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <input type="text" name="phone_number" required="required" />
                                    <label class="control-label" for="input">Số điện thoại</label><i
                                        class="mtrl-select"></i>

                                </div>
                                @if ($errors->has('phone_number'))
                                    <div style="color: red">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <input type="password" name="password" required="required" />
                                    <label class="control-label" for="input">Mật khẩu</label><i
                                        class="mtrl-select"></i>

                                </div>
                                @if ($errors->has('password'))
                                    <div style="color: red">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <input type="password" name="confirm_password" required="required" />
                                    <label class="control-label" for="input">Xác nhận mật khẩu</label><i
                                        class="mtrl-select"></i>

                                </div>
                                @if ($errors->has('confirm_password'))
                                    <div style="color: red">
                                        {{ $errors->first('confirm_password') }}
                                    </div>
                                @endif

                                <a id="bandacotaikhoan" name="bandacotaikhoan" title=""
                                    class="already-have already-have1">Bạn đã có tài khoản</a>

                                <div class="submit-btns">
                                    <button class="mtr-btn signin" type="submit"><span>Đăng kí</span></button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ URL('assets/js/main.min.js') }}"></script>
    <script src="{{ URL('assets/js/script.js') }}"></script>

    <!-- Firebase files -->
    <!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>
    <!-- facebook provider -->
    {{-- <script type="text/javascript" src="{{ url('public/js/facebook.js') }}"></script> --}}


    <!-- google provider -->
    <script type="text/javascript" src="{{ url('js/google.js') }}"></script>

    <script>
        $('#googleLogin').click(function() {
            firebase.auth().signInWithRedirect(provider);
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#dangki').click(function() {
                var formdangki = document.getElementById('formdangki');
                formdangki.setAttribute('style', 'display: block');
                var formdangnhap = document.getElementById('formdangnhap');
                formdangnhap.setAttribute('style', 'display: none');
            });
            $('#bandacotaikhoan').click(function() {
                var formdangki = document.getElementById('formdangki');
                formdangki.setAttribute('style', 'display: none');
                var formdangnhap = document.getElementById('formdangnhap');
                formdangnhap.setAttribute('style', 'display: block');
            });
        });
    </script>


    <script type="text/javascript" src="{{ url('js/firebase_config.js') }}"></script>


</body>

</html>
