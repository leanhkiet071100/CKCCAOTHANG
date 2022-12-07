@extends('layouts.appnguoidung')

@section('content')
    @include('layouts.menucanhan')
@endsection
@section('sidebar')
    @parent
    <div class="central-meta item">
        <div class="user-post">
            <div class="friend-info">
                <figure>
                    <img src="images/resources/friend-avatar10.jpg" alt="">
                </figure>
                <div class="friend-name">
                    <ins><a href="time-line.html" title="">Janice Griffith</a></ins>
                    <span>published: june,2 2018 19:PM</span>
                </div>
                <div class="description">

                    <p>
                        World's most beautiful car in Curabitur <a href="#" title="">#test drive booking !</a>
                        the most beatuiful
                        car available in america and the saudia arabia, you can book
                        your test drive by our official website
                    </p>
                </div>
                <div class="post-meta">
                    <div class="linked-image align-left">
                        <a href="#" title=""><img src="images/resources/page1.jpg" alt=""></a>
                    </div>
                    <div class="detail">
                        <span>Love Maid - ChillGroves</span>
                        <p>Lorem ipsum dolor sit amet, consectetur ipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua... </p>
                        <a href="#" title="">www.sample.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
