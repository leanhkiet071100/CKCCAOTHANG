<!DOCTYPE html>
<html lang="en">

<head>
    <title> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} | Admin CKC Social Network | Admin </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
    <meta name="keywords"
        content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ URL('admin/assets/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ URL('admin/assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL('admin/assets/icon/font-awesome/css/font-awesome.min.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ URL('admin/assets/icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ URL('admin/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('admin/assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="icon" href="{{ URL('assets/images/LogoCKCSocialNetwork.png') }}" type="image/png" sizes="16x16">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <body>

        <div class="fixed-button">
            <a href="https://codedthemes.com/item/gradient-able-admin-template" target="_blank"
                class="btn btn-md btn-primary">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
            </a>
        </div>
        <!-- Pre-loader start -->
        <div class="theme-loader">
            <div class="loader-track">
                <div class="loader-bar"></div>
            </div>
        </div>
        <!-- Pre-loader end -->
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">

                <nav class="navbar header-navbar pcoded-header">
                    <div class="navbar-wrapper">
                        <div class="navbar-logo">
                            <a class="mobile-menu" id="mobile-collapse" href="#!">
                                <i class="ti-menu"></i>
                            </a>
                            <div class="mobile-search">
                                <div class="header-search">
                                    <div class="main-search morphsearch-search">
                                        <div class="input-group">
                                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                            <input type="text" class="form-control" placeholder="Enter Keyword">
                                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.html">
                                <img class="img-fluid" src="{{ URL('assets/images/CKCSOCIALNETWORK.png') }}"
                                    alt="Theme-Logo" />
                            </a>
                            <a class="mobile-options">
                                <i class="ti-more"></i>
                            </a>
                        </div>

                        <div class="navbar-container container-fluid">
                            <ul class="nav-left">
                                <li>
                                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                    </div>
                                </li>
                                <li class="header-search">
                                    <div class="main-search morphsearch-search">
                                        <div class="input-group">
                                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#!" onclick="javascript:toggleFullScreen()">
                                        <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-right">
                                <li class="header-notification">
                                    <a href="#!">
                                        <i class="ti-bell"></i>
                                        <span class="badge bg-c-pink"></span>
                                    </a>
                                    <ul class="show-notification">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius"
                                                    src="{{ URL('admin/assets/images/avatar-2.jpg') }}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet,
                                                        consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li class="user-profile header-notification">
                                    <a href="#!">
<<<<<<< HEAD
                                        <img src="{{ URL('avatar') }}/{{ Auth::user()->avatar }}" style="width:30px;"
                                            class="img-radius" alt="User-Profile-Image">
                                        <span>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
=======
                                        <img src="{{ URL('avatar') }}/{{ Auth::user()->avatar }}"
                                            style="width:30px;" class="img-radius" alt="User-Profile-Image">
                                        <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
>>>>>>> Kiet-dangnhap
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href="#!">
                                                <i class="ti-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html">
                                                <i class="ti-user"></i> Profile
                                            </a>
                                        </li>

                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="ti-lock"></i> Lock Screen
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logoutAdmin') }}">
                                                <i class="ti-layout-sidebar-left"></i> Đăng xuất
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="pcoded-main-container " id="pcoded-main-container">
                    <div class="pcoded-wrapper  ">
                        <nav class="pcoded-navbar">
                            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
<<<<<<< HEAD
                            <div class="pcoded-inner-navbar main-menu">


                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="active">
                                        <a href="{{route('adminDashboard')}}">
                                            <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Tài khoản người
                                                dùng</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('accountAdmin')}}">
                                            <span class="pcoded-micon"><i class="fa fa-key"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Tài khoản admin</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('adminDashboard')}}">
                                            <span class="pcoded-micon"><i class="ti-flag-alt"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Báo cáo người
                                                dùng</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('adminPost')}}">
                                            <span class="pcoded-micon"><i class="ti-bookmark"></i><b>D</b></span>
=======
                            <div class="pcoded-inner-navbar main-menu menuadmin">
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="" id="menutaikhoan">
                                        <a href="{{ route('adminDashboard') }}">
                                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Tài khoản</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="" id="menubaiviet">
                                        <a href="{{ route('adminPost') }}">
                                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
>>>>>>> Kiet-dangnhap
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Bài viết</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
<<<<<<< HEAD
=======
                                    <li class="pcoded-hasmenu" id="menutocao">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Tố
                                                cáo</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <a href="{{ route('adminReport') }}">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">danh sách tố cáo</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="{{ route('ds-report-post') }}">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">danh sách gửi tố
                                                        cáo</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>


                                        </ul>
                                    </li>
                                </ul>
>>>>>>> Kiet-dangnhap


                            </div>
                        </nav>
                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <div class="page-body">
                                            <div class="row">

                                                @section('sidebar')

                                                @show

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Warning Section Ends -->
        <!-- Required Jquery -->
        @yield('scripts')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function() {
                $url = window.location.href;
                console.log($url);
                if ($url == "{{ route('adminPost') }}") {
                    $('#menubaiviet').addClass('active');
                }
                if ($url == "{{ route('adminDashboard') }}") {
                    $('#menutaikhoan').addClass('active');
                }
            });
        </script>

        {{-- <script type="text/javascript" src="{{ URL('admin/assets/js/jquery/jquery.min.js') }}"></script> --}}
        <script type="text/javascript" src="{{ URL('admin/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL('admin/assets/js/popper.js/popper.min.js') }}"></script>

        <!-- jquery slimscroll js -->
        <script type="text/javascript" src="{{ URL('admin/assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <!-- modernizr js -->
        <script type="text/javascript" src="{{ URL('admin/assets/js/modernizr/modernizr.j') }}s"></script>
        <!-- am chart -->
        <script src="{{ URL('admin/assets/pages/widget/amchart/amcharts.min.js') }}"></script>
        <script src="{{ URL('admin/assets/pages/widget/amchart/serial.min.js') }}"></script>
        <!-- Chart js -->
        <script type="text/javascript" src="{{ URL('admin/assets/js/chart.js/Chart.js') }}"></script>
        <!-- Todo js -->
        <script type="text/javascript " src="{{ URL('admin/assets/pages/todo/todo.js') }} "></script>
        <!-- Custom js -->
        {{-- <script type="text/javascript" src="{{ URL('admin/assets/pages/dashboard/custom-dashboard.min.js') }}"></script> --}}
        <script type="text/javascript" src="{{ URL('admin/assets/js/script.js') }}"></script>
        <script type="text/javascript " src="{{ URL('admin/assets/js/SmoothScroll.js') }}"></script>
        <script src="{{ URL('admin/assets/js/pcoded.min.js') }}"></script>
        <script src="{{ URL('admin/assets/js/vartical-demo.js') }}"></script>
        <script src="{{ URL('admin/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    </body>

</html>
