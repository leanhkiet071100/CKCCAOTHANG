<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="{{URL('user/SignUp/fonts/icomoon/style.css')}}"> -->
    <link rel="stylesheet" href="{{URL('user/signup/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{URL('user/signup/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL('user/signup/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{URL('user/signup/css/style.css')}}">

    <title>Đăng ký tài khoản</title>
</head>

<body>


    <div class="d-lg-flex half">
        <!-- <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div> -->
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 py-5">
                        <h3>ĐĂNG KÝ</h3>
                        <p class="mb-4">Tạo một tài khoản mới.</p>
                        <form action="{{route('create-account-user')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="fname">Họ</label>
                                        <input type="text" class="form-control" placeholder="Nhập họ ..."
                                            id="first_name" name='first_name'>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="lname">Tên</label>
                                        <input type="text" class="form-control" placeholder="Nhập tên ..."
                                            id="last_name" name='last_name'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" placeholder="example@caothang.edu.vn"
                                            id="email" name='email'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="lname">Số điện thoại</label>
                                        <input type="text" class="form-control" placeholder="+84 000000000"
                                            id="phone_number" name='phone_number'>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                  <div class="form-group first">
                    <label for="lname">Website</label>
                    <input type="text" class="form-control" placeholder="e.g. https://google.com" id="lname">
                  </div>    
                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group last mb-3">
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" class="form-control"
                                            placeholder="Mật khẩu 8 ký tự trở lên" id="password" name='password'>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group last mb-3">
                                        <label for="re-password">Xác nhận mật khẩu</label>
                                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu"
                                            id="confirm_password" name='confirm_password'>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="d-flex mb-5 mt-4 align-items-center">
                <div class="d-flex align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
              </div>
              </div> -->
                            <div class="d-flex mb-5 mt-4 align-items-center">
                                <div class="d-flex align-items-center">
                                    <input type="submit" value="ĐĂNG KÝ" class="btn px-5 btn-info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>