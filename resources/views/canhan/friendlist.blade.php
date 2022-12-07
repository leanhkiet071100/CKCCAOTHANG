<div class="central-meta">
    <div class="frnds">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">Bạn Bè</a> <span> {{ $totalFriend }}
                </span></li>
            @if (Auth::user()->id == $account->id)
                <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Yêu cầu kết bạn</a><span>
                        {{ $totalrequestAddfriend }}</span></li>
            @endif
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active fade show" id="frends">
                <ul class="nearby-contct">
                    @foreach ($lstFriend as $friend => $fr)

                        @if ($fr->id_user_target == Auth::user()->id && $fr->id_user_target == $account->id)
                            <li>
                                <div class="nearly-pepls">
                                    <figure>
                                        <a href="time-line.html" title=""><img
                                                src="{{ url('avatar') }}/{{ $fr->users->avatar }}" alt=""
                                                class="avatar-create-post"></a>
                                    </figure>
                                    <div class="pepl-info">
                                        <h4><a href="{{ route('profile-user', ['id' => $fr->users->id]) }}"
                                                title="">{{ $fr->users->first_name }}
                                                {{ $fr->users->last_name }}</a></h4>
                                        <span>{{ $fr->users->email }}</span>
                                        @if ($fr->id_user_preference != Auth::user()->id)
                                            <a href="{{ route('unfriend', ['id' => $fr->user->id]) }}" title=""
                                                class="add-butn" data-ripple="">Hủy kết bạn</a>
                                        @endif

                                    </div>
                                </div>
                            </li>
                        @else
                            @if ($fr->id_user_target == $account->id)
                                <li>
                                    <div class="nearly-pepls">
                                        <figure>
                                            <a href="time-line.html" title=""><img
                                                    src="{{ url('avatar') }}/{{ $fr->users->avatar }}"
                                                    alt="" class="avatar-create-post"></a>
                                        </figure>
                                        <div class="pepl-info">
                                            <h4><a href="{{ route('profile-user', ['id' => $fr->users->id]) }}"
                                                    title="">{{ $fr->users->first_name }}
                                                    {{ $fr->users->last_name }}</a></h4>
                                            <span>{{ $fr->users->email }}</span>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active fade show" id="frends">
                                                    <ul class="nearby-contct">
                                                        @foreach ($lstFriend as $friend => $fr)
                                                            @if ($fr->id_user_target == Auth::user()->id)
                                                                <li>
                                                                    <div class="nearly-pepls">
                                                                        <figure>
                                                                            <a href="time-line.html" title=""><img
                                                                                    src="{{ url('avatar') }}/{{ $fr->users->avatar }}"
                                                                                    alt=""></a>
                                                                        </figure>
                                                                        <div class="pepl-info">
                                                                            <h4><a href="{{ route('profile-user', ['id' => $fr->users->id]) }}"
                                                                                    title="">{{ $fr->users->first_name }}
                                                                                    {{ $fr->users->last_name }}</a>
                                                                            </h4>
                                                                            <span>{{ $fr->users->email }}</span>

                                                                            @if ($fr->id_user_preference != Auth::user()->id)
                                                                                <a href="{{ route('unfriend', ['id' => $fr->user->id]) }}"
                                                                                    title="" class="add-butn"
                                                                                    data-ripple="">Hủy kết bạn</a>
                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <div class="nearly-pepls">
                                                                        <figure>
                                                                            <a href="time-line.html" title=""><img
                                                                                    src="{{ url('avatar') }}/{{ $fr->user->avatar }}"
                                                                                    alt=""
                                                                                    class="avatar-create-post"></a>
                                                                        </figure>
                                                                        <div class="pepl-info">
                                                                            <h4><a href="{{ route('profile-user', ['id' => $fr->user->id]) }}"
                                                                                    title="">{{ $fr->user->first_name }}
                                                                                    {{ $fr->user->last_name }}</a>
                                                                            </h4>
                                                                            <span>{{ $fr->user->email }}</span>


                                                                            @if ($fr->id_user_target != Auth::user()->id)
                                                                                <a href="{{ route('unfriend', ['id' => $fr->user->id]) }}"
                                                                                    title="" class="add-butn"
                                                                                    data-ripple="">Hủy kết bạn</a>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                            @endif
                        @endif
                    @endforeach


                </ul>
                <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
            </div>
            <div class="tab-pane fade" id="frends-req">
                <ul class="nearby-contct">


                    @foreach ($requestAddfriend as $requestfr => $reF)
                        <li>
                            <div class="nearly-pepls">
                                <figure>
                                    <a href="time-line.html" title=""><img
                                            src="{{ url('avatar') }}/{{ $reF->user->avatar }}" alt=""
                                            class="avatar-create-post"></a>
                                </figure>
                                <div class="pepl-info">
                                    <h4><a href="{{ route('profile-user', ['id' => $reF->user->id]) }}"
                                            title="">{{ $reF->user->first_name }}
                                            {{ $reF->user->last_name }}</a></h4>
                                    <span>{{ $reF->user->email }}</span>


                                    <a href="{{ route('accept-request-addfriend', ['id' => $reF->user->id]) }}"
                                        title="" class="add-butn" data-ripple="">Chấp nhận</a>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
                <button class="btn-view btn-load-more"></button>
            </div>
        </div>
    </div>
</div>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
