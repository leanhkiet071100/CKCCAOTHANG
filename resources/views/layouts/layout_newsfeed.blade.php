<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>@yield('title')</title>
    <link rel="icon" href="{{ URL('assets/images/LogoCKCSocialNetwork.png') }}" type="image/png" sizes="16x16">
    @yield('css')
    @include('thuvien.css')
</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">

        <div class="responsive-header">
            <div class="mh-head first Sticky">
                <span class="mh-btns-left">
                    <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
                </span>
                <span class="mh-text">
                    <a href="newsfeed.html" title=""><img src="../assets/images/logo2.png" alt=""></a>
                </span>
                <span class="mh-btns-right">
                    <a class="fa fa-sliders" href="#shoppingbag"></a>
                </span>
            </div>
            <div class="mh-head second">
                <form class="mh-form">
                    <input placeholder="search" />
                    <a href="#/" class="fa fa-search"></a>
                </form>
            </div>

            <nav id="shoppingbag">
                <div>
                    <div class="">
                        <form method="post">
                            <div class="setting-row">
                                <span>use night mode</span>
                                <input type="checkbox" id="nightmode" />
                                <label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Notifications</span>
                                <input type="checkbox" id="switch2" />
                                <label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Notification sound</span>
                                <input type="checkbox" id="switch3" />
                                <label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>My profile</span>
                                <input type="checkbox" id="switch4" />
                                <label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Show profile</span>
                                <input type="checkbox" id="switch5" />
                                <label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                        </form>
                        <h4 class="panel-title">Account Setting</h4>
                        <form method="post">
                            <div class="setting-row">
                                <span>Sub users</span>
                                <input type="checkbox" id="switch6" />
                                <label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>personal account</span>
                                <input type="checkbox" id="switch7" />
                                <label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Business account</span>
                                <input type="checkbox" id="switch8" />
                                <label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Show me online</span>
                                <input type="checkbox" id="switch9" />
                                <label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Delete history</span>
                                <input type="checkbox" id="switch10" />
                                <label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Expose author name</span>
                                <input type="checkbox" id="switch11" />
                                <label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div><!-- responsive header -->

        <div class="topbar stick">
            <div class="logo">
                <a title="" href="{{ route('newfeed') }}"><img style="width:22%"
                        src="{{ URL('assets/images/logoCKCSocialNetwork.png') }}" alt=""></a>
            </div>

            <div class="top-area">
                <ul class="main-menu">
                    <li>
                        <a href="#" title="">Trang chủ</a>
                        <ul>
                            <li><a href="index-2.html" title="">Home Social</a></li>
                            <li><a href="index2.html" title="">Home Social 2</a></li>
                            <li><a href="index-company.html" title="">Home Company</a></li>
                            <li><a href="landing.html" title="">Login page</a></li>
                            <li><a href="logout.html" title="">Logout Page</a></li>
                            <li><a href="newsfeed.html" title="">news feed</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" title="">Cài đặt tài khoản</a>
                        <ul>
                            <li><a href="{{ route('taikhoan.getthaydoithongtincanhan') }}" title="">Thay đổi  thông tin cá nhân</a></li>
                            <li><a href="{{ route('taikhoan.getthaydoimatkhau') }}" title="">Thay đổi mật   khẩu</a></li>
 

                        </ul>
                    </li>
                    <li>
                        <a href="#" title="">more pages</a>
                        <ul>
                            <li><a href="404.html" title="">404 error page</a></li>
                            <li><a href="about.html" title="">about</a></li>
                            <li><a href="contact.html" title="">contact</a></li>
                            <li><a href="faq.html" title="">faq's page</a></li>
                            <li><a href="insights.html" title="">insights</a></li>
                            <li><a href="knowledge-base.html" title="">knowledge base</a></li>
                            <li><a href="widgets.html" title="">Widgts</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="setting-area">
                    <li>
                        <a href="#" title="Home" data-ripple=""><i class="ti-search"></i></a>
                        <div class="searched">
                            <form method="post" class="form-search">
                                <input type="text" placeholder="Search Friend">
                                <button data-ripple><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </li>
                    <li><a href="newsfeed.html" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
                    <li>
                        <a href="#" title="Notification" data-ripple="">
                            <i class="ti-bell"></i><span>20</span>
                        </a>
                        <div class="dropdowns">
                            <span>4 New Notifications</span>
                            <ul class="drops-menu">
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="../assets/images//resources/thumb-1.jpg" alt="">
                                        <div class="mesg-meta">
                                            <h6>sarah Loren</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag green">New</span>
                                </li>
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="../assets/images//resources/thumb-2.jpg" alt="">
                                        <div class="mesg-meta">
                                            <h6>Jhon doe</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag red">Reply</span>
                                </li>
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="../assets/images//resources/thumb-3.jpg" alt="">
                                        <div class="mesg-meta">
                                            <h6>Andrew</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag blue">Unseen</span>
                                </li>
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="../assets/images//resources/thumb-4.jpg" alt="">
                                        <div class="mesg-meta">
                                            <h6>Tom cruse</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag">New</span>
                                </li>
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="../assets/images//resources/thumb-5.jpg" alt="">
                                        <div class="mesg-meta">
                                            <h6>Amy</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag">New</span>
                                </li>
                            </ul>
                            <a href="notifications.html" title="" class="more-mesg">view more</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" title="Messages" data-ripple=""><i
                                class="ti-comment"></i><span>12</span></a>
                        <div class="dropdowns">
                            <span>5 New Messages</span>
                            <ul class="drops-menu">
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="../assets/images//resources/thumb-1.jpg" alt="">
                                        <div class="mesg-meta">
                                            <h6>sarah Loren</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag green">New</span>
                                </li>
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="../assets/images//resources/thumb-2.jpg" alt="">
                                        <div class="mesg-meta">
                                            <h6>Jhon doe</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag red">Reply</span>
                                </li>
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="../assets/images//resources/thumb-3.jpg" alt="">
                                        <div class="mesg-meta">
                                            <h6>Andrew</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag blue">Unseen</span>
                                </li>
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="../assets/images//resources/thumb-4.jpg" alt="">
                                        <div class="mesg-meta">
                                            <h6>Tom cruse</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag">New</span>
                                </li>
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="../assets/images//resources/thumb-5.jpg" alt="">
                                        <div class="mesg-meta">
                                            <h6>Amy</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag">New</span>
                                </li>
                            </ul>
                            <a href="messages.html" title="" class="more-mesg">view more</a>
                        </div>
                    </li>
                    <li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>
                        <div class="dropdowns languages">
                            <a href="#" title=""><i class="ti-check"></i>English</a>
                            <a href="#" title="">Arabic</a>
                            <a href="#" title="">Dutch</a>
                            <a href="#" title="">French</a>
                        </div>
                    </li>
                </ul>
                <div class="user-img">
                    <img src="{{ URL('avatar') }}/{{ $account->avatar }}" alt="" class="top-area-avatar-circular">
                    <span class="status f-online"></span>
                    <div class="user-setting">
                        <a href="#" title=""><span class="status f-online"></span>online</a>
                        <a href="#" title=""><span class="status f-away"></span>away</a>
                        <a href="#" title=""><span class="status f-off"></span>offline</a>
                        <a href="{{ route('profile-user', ['id' => Session()->get('LoggedUser')]) }}" title=""><i class="ti-user"></i>Trang cá nhân</a>
                        <a href="{{ route('dangxuat') }}" title=""><i class="ti-power-off"></i>log out</a>
                    </div>
                </div>
                <span class="ti-menu main-menu" data-ripple=""></span>
            </div>
        </div><!-- topbar -->

        @yield('content')

        <section>
            <div class="gap gray-bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row" id="page-contents">
                                <div class="col-lg-3">
                                    <aside class="sidebar static">
                                        <!-- <div class="widget">
                                            <h4 class="widget-title">Socials</h4>
                                            <ul class="socials">
                                                <li class="facebook">
                                                    <a title="" href="#"><i class="fa fa-facebook"></i>
                                                        <span>facebook</span> <ins>45 likes</ins></a>
                                                </li>
                                                <li class="twitter">
                                                    <a title="" href="#"><i class="fa fa-twitter"></i>
                                                        <span>twitter</span><ins>25 likes</ins></a>
                                                </li>
                                                <li class="google">
                                                    <a title="" href="#"><i class="fa fa-google"></i>
                                                        <span>google</span><ins>35 likes</ins></a>
                                                </li>
                                            </ul>
                                        </div> -->
                                        <div class="widget">
                                            <h4 class="widget-title">Lối tắt</h4>
                                            <ul class="naves">
                                                <li>
                                                    <i class="ti-clipboard"></i>
                                                    <a href="{{ route('newfeed') }}" title="">Tin tức</a>
                                                </li>

                                                <li>
                                                    <i class="ti-files"></i>
                                                    <a href="{{ route('profile-user', ['id' => Session()->get('LoggedUser')]) }}"
                                                        title="">Trang cá nhân</a>
                                                </li>
                                                <li>
                                                    <i class="ti-user"></i>
                                                    <a href="{{ route('friendlist', ['id' => Session()->get('LoggedUser')]) }}"
                                                        title="">Bạn bè</a>
                                                </li>
                                                <li>
                                                    <i class="ti-image"></i>
                                                    <a href="timeline-photos.html" title="">Hình ảnh</a>
                                                </li>
                                                <li>
                                                    <i class="ti-video-camera"></i>
                                                    <a href="timeline-videos.html" title="">videos</a>
                                                </li>
                                                <li>
                                                    <i class="ti-comments-smiley"></i>
                                                    <a href="messages.html" title="">Nhắn tin</a>
                                                </li>

                                                @if (Auth::user() == null)
                                                    <li>
                                                        <i class="ti-power-off"></i>
                                                        <a href="{{ route('login') }}" title="">Đăng nhập</a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <i class="ti-power-off"></i>
                                                        <a href="{{ route('dangxuat') }}" title="">Đăng
                                                            xuất</a>
                                                    </li>
                                                @endif

                                            </ul>
                                        </div><!-- Shortcuts -->
                                        <div class="widget">
                                            <h4 class="widget-title">Recent Activity</h4>
                                            <ul class="activitiez">
                                                <li>
                                                    <div class="activity-meta">
                                                        <i>10 hours Ago</i>
                                                        <span><a href="#" title="">Commented on Video
                                                                posted </a></span>
                                                        <h6>by <a href="newsfeed.html">black demon.</a></h6>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="activity-meta">
                                                        <i>30 Days Ago</i>
                                                        <span><a href="newsfeed.html" title="">Posted your
                                                                status.
                                                                “Hello guys, how are you?”</a></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="activity-meta">
                                                        <i>2 Years Ago</i>
                                                        <span><a href="#" title="">Share a video on her
                                                                timeline.</a></span>
                                                        <h6>"<a href="newsfeed.html">you are so funny mr.been.</a>"
                                                        </h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- recent activites -->
                                        <div class="widget stick-widget">
                                            <h4 class="widget-title">Who's follownig</h4>
                                            <ul class="followers">
                                                <li>
                                                    <figure><img src="../assets/images//resources/friend-avatar2.jpg"
                                                            alt="">
                                                    </figure>
                                                    <div class="friend-meta">
                                                        <h4><a href="time-line.html" title="">Kelly Bill</a>
                                                        </h4>
                                                        <a href="#" title="" class="underline">Add
                                                            Friend</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="../assets/images//resources/friend-avatar4.jpg"
                                                            alt="">
                                                    </figure>
                                                    <div class="friend-meta">
                                                        <h4><a href="time-line.html" title="">Issabel</a></h4>
                                                        <a href="#" title="" class="underline">Add
                                                            Friend</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="../assets/images//resources/friend-avatar6.jpg"
                                                            alt="">
                                                    </figure>
                                                    <div class="friend-meta">
                                                        <h4><a href="time-line.html" title="">Andrew</a></h4>
                                                        <a href="#" title="" class="underline">Add
                                                            Friend</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="../assets/images//resources/friend-avatar8.jpg"
                                                            alt="">
                                                    </figure>
                                                    <div class="friend-meta">
                                                        <h4><a href="time-line.html" title="">Sophia</a></h4>
                                                        <a href="#" title="" class="underline">Add
                                                            Friend</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="../assets/images//resources/friend-avatar3.jpg"
                                                            alt="">
                                                    </figure>
                                                    <div class="friend-meta">
                                                        <h4><a href="time-line.html" title="">Allen</a></h4>
                                                        <a href="#" title="" class="underline">Add
                                                            Friend</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- who's following -->
                                    </aside>
                                </div><!-- sidebar -->
                                <div class="col-lg-6">
                                    @section('sidebar')

                                    @show
                                </div><!-- centerl meta -->
                                <div class="col-lg-3">
                                    <aside class="sidebar static">
                                        <div class="widget">
                                            <div class="banner medium-opacity bluesh">
                                                <div style="background-image: url(../assets/images//resources/baner-widgetbg.jpg)"
                                                    class="bg-image"></div>
                                                <div class="baner-top">
                                                    <span><img src="../assets/images//book-icon.png"
                                                            alt=""></span>
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </div>
                                                <div class="banermeta">
                                                    <p>
                                                        create your own favourit page.
                                                    </p>
                                                    <span>like them all</span>
                                                    <a href="#" title="" data-ripple="">start now!</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget friend-list stick-widget">
                                            <h4 class="widget-title">Bạn Bè</h4>
                                            <div id="searchDir"></div>
                                            <ul id="people-list" class="friendz-list">

                                                @foreach ($lstFriend as $friend => $fr)
                                                    @if ($fr->id_user_target == Auth::user()->id)
                                                        <li>
                                                            <figure>
                                                                <img src="{{ url('avatar') }}/{{ $fr->users->avatar }}"
                                                                    alt="" class="avatar-boder-radius">
                                                                <span class="status f-online"></span>
                                                            </figure>
                                                            <div class="friendz-meta">

                                                                <a href="time-line.html">{{ $fr->users->first_name }}
                                                                    {{ $fr->users->last_name }}</a>
                                                                <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection"
                                                                        class="__cf_email__"
                                                                        data-cfemail="f2859b9c869780819d9e969780b2959f939b9edc919d9f">{{ $fr->users->email }}</a></i>
                                                            </div>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <figure>
                                                                <img src="{{ url('avatar') }}/{{ $fr->user->avatar }}"
                                                                    alt="" class="avatar-boder-radius">
                                                                <span class="status f-online"></span>
                                                            </figure>
                                                            <div class="friendz-meta">

                                                                <a href="time-line.html">{{ $fr->user->first_name }}
                                                                    {{ $fr->user->last_name }}</a>
                                                                <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection"
                                                                        class="__cf_email__"
                                                                        data-cfemail="f2859b9c869780819d9e969780b2959f939b9edc919d9f">{{ $fr->user->email }}</a></i>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                            <div class="chat-box">
                                                <div class="chat-head">
                                                    <span class="status f-online"></span>
                                                    <h6>Huỳnh Anh</h6>
                                                    <div class="more">
                                                        <span><i class="ti-more-alt"></i></span>
                                                        <span class="close-mesage"><i class="ti-close"></i></span>
                                                    </div>
                                                </div>
                                                <div class="chat-list">
                                                    <ul>
                                                        <li class="me">
                                                            <div class="chat-thumb"><img
                                                                    src="../assets/images//resources/chatlist1.jpg"
                                                                    alt="">
                                                            </div>
                                                            <div class="notification-event">
                                                                <span class="chat-message-item">
                                                                    Hi James! Please remember to buy the food for
                                                                    tomorrow! I’m gonna be handling the gifts and Jake’s
                                                                    gonna get the drinks
                                                                </span>
                                                                <span class="notification-date"><time
                                                                        datetime="2004-07-24T18:18"
                                                                        class="entry-date updated">Yesterday at
                                                                        8:10pm</time></span>
                                                            </div>
                                                        </li>
                                                        <li class="you">
                                                            <div class="chat-thumb"><img
                                                                    src="../assets/images//resources/chatlist2.jpg"
                                                                    alt="">
                                                            </div>
                                                            <div class="notification-event">
                                                                <span class="chat-message-item">
                                                                    Hi James! Please remember to buy the food for
                                                                    tomorrow! I’m gonna be handling the gifts and Jake’s
                                                                    gonna get the drinks
                                                                </span>
                                                                <span class="notification-date"><time
                                                                        datetime="2004-07-24T18:18"
                                                                        class="entry-date updated">Yesterday at
                                                                        8:10pm</time></span>
                                                            </div>
                                                        </li>
                                                        <li class="me">
                                                            <div class="chat-thumb"><img
                                                                    src="../assets/images//resources/chatlist1.jpg"
                                                                    alt="">
                                                            </div>
                                                            <div class="notification-event">
                                                                <span class="chat-message-item">
                                                                    Hi James! Please remember to buy the food for
                                                                    tomorrow! I’m gonna be handling the gifts and Jake’s
                                                                    gonna get the drinks
                                                                </span>
                                                                <span class="notification-date"><time
                                                                        datetime="2004-07-24T18:18"
                                                                        class="entry-date updated">Yesterday at
                                                                        8:10pm</time></span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <form class="text-box">
                                                        <textarea placeholder="Post enter to post..."></textarea>
                                                        <div class="add-smiles">
                                                            <span title="add icon"
                                                                class="em em-expressionless"></span>
                                                        </div>
                                                        <div class="smiles-bunch">
                                                            <i class="em em---1"></i>
                                                            <i class="em em-smiley"></i>
                                                            <i class="em em-anguished"></i>
                                                            <i class="em em-laughing"></i>
                                                            <i class="em em-angry"></i>
                                                            <i class="em em-astonished"></i>
                                                            <i class="em em-blush"></i>
                                                            <i class="em em-disappointed"></i>
                                                            <i class="em em-worried"></i>
                                                            <i class="em em-kissing_heart"></i>
                                                            <i class="em em-rage"></i>
                                                            <i class="em em-stuck_out_tongue"></i>
                                                        </div>
                                                        <button type="submit"></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- friends list sidebar -->
                                    </aside>
                                </div><!-- sidebar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- <div class="bottombar">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
     <span class="copyright"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></span>
     <i><img src="../assets/images//credit-cards.png" alt=""></i>
    </div>
   </div>
  </div>
 </div> -->
    </div>

    <div class="side-panel">
        <h4 class="panel-title">General Setting</h4>
        <form method="post">
            <div class="setting-row">
                <span>use night mode</span>
                <input type="checkbox" id="nightmode1" />
                <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Notifications</span>
                <input type="checkbox" id="switch22" />
                <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Notification sound</span>
                <input type="checkbox" id="switch33" />
                <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>My profile</span>
                <input type="checkbox" id="switch44" />
                <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Show profile</span>
                <input type="checkbox" id="switch55" />
                <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
            </div>
        </form>
        <h4 class="panel-title">Account Setting</h4>
        <form method="post">
            <div class="setting-row">
                <span>Sub users</span>
                <input type="checkbox" id="switch66" />
                <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>personal account</span>
                <input type="checkbox" id="switch77" />
                <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Business account</span>
                <input type="checkbox" id="switch88" />
                <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Show me online</span>
                <input type="checkbox" id="switch99" />
                <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Delete history</span>
                <input type="checkbox" id="switch101" />
                <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Expose author name</span>
                <input type="checkbox" id="switch111" />
                <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
            </div>
        </form>


    </div><!-- side panel -->


    @if (Auth::user() == null)
        @include('layouts.chuadangnhap')
    @endif


    @include('thuvien.js')
    @yield('scripts')




</body>

</html>
