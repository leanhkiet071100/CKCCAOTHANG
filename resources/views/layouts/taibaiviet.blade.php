@foreach ($listPost as $item)
    @if ($item->id_user == Auth::user()->id)
        <?php $key1 = 0; ?>
        <?php $soanh = 0; ?>
        {{-- load like javascipt --}}
        <script type="text/javascript">
            $(document).ready(function() {
                var idpost = {{ $item->id }};
                var data = {
                    'idpost': idpost
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                //load số like
                $.ajax({
                    url: "{{ route('load-like-post') }}",
                    type: 'POST',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        $('#like-show' + idpost).html('');
                        $('#like-show' + idpost).append(data);
                    }
                });


                //load số comment
                $.ajax({
                    url: "{{ route('load-socomment-post') }}",
                    type: 'POST',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        $('#socomment' + idpost).html('');
                        $('#socomment' + idpost).append(data);
                    }
                });

                //kiểm tra like bài viết
                $.ajax({
                    url: "{{ route('kiemtralikebaiviet') }}",
                    type: 'POST',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        if (data == 1) {
                            $('#icon-tim' + idpost).html(
                                '<i class="fa fa-heart" aria-hidden="true" style="color:red"></i>');
                        } else {
                            $('#icon-tim' + idpost).html(
                                '<i class="fa fa-heart-o" aria-hidden="true"></i>');
                        }
                    }
                });
            });
        </script>

        <div class="central-meta item" name="post-show{{ $item->id }}" id="post-show{{ $item->id }}">
            @if ($item->id_user == Auth::user()->id)
                <button class="bacham" id="bacham" name="bacham" onclick="hienchucnangbaiviet({{ $item->id }})">
                    ...
                </button>
                <div class="chucnangbaiviet" id="chucnangbaiviet{{ $item->id }}"
                    name="chucnangbaiviet{{ $item->id }}" style="display: none">
                    <button class="suabaiviet" name="suabaiviet" id="suabaiviet"
                        data-url="{{ route('suabaiviet-show', ['idpost' => $item->id]) }}"
                        onclick="hienformsuabaiviet({{ $item->id }})">Sửa bài viết</button>
                    <button class="xoabaiviet" name="xoabaiviet" id="xoabaiviet"
                        onclick="xoabaiviet({{ $item->id }})"> Xóa bài viết </button>
                    <button class="xoabaiviet" name="xoabaiviet" id="xoabaiviet" onclick="hientocao({{ $item->id }})"> Tố cáo </button>
                </div>
            @endif
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img src="{{ URL('avatar') }}/{{ $item->user->avatar }}" alt=""
                            class="avatar-boder-radius">
                    </figure>
                    <div class="friend-name">
                        <ins><a href="{{ route('profile-user', ['id' => $item->user->id]) }}"
                                title="">{{ $item->user->first_name }} {{ $item->user->last_name }}</a></ins>
                        <span style=""
                            class="date">{{ $item->view_mode }}:{{ \Carbon\Carbon::parse($item->created_at)->format('d - m - Y') }}</span>
                    </div>
                    <div class="description" id="description-post{{ $item->id }}" name="description-post">
                        <p>
                            {!! nl2br($item->content_post) !!}
                        </p>
                    </div>
                    @foreach ($list_media as $key => $media)
                        @if ($media->id_post == $item->id)
                            <?php $soanh = $soanh + 1; ?>
                        @endif
                    @endforeach

                    <div class="post-meta">
                        @foreach ($list_media as $key => $media)
                            @if ($media->id_post == $item->id)
                                <?php $key1 = $key1 + 1; ?>
                                <?php //{{$list_media->count()}}
                                ?>
                                @if ($key1 <= 6)
                                    <div class="linked-image item{{ $key1 }} ">
                                        <a href="{{ url('image_post') }}/{{ $media->media_file_name }}"
                                            title=""></a>
                                        <img src="{{ url('image_post') }}/{{ $media->media_file_name }}"
                                            alt="" class="imgpost">
                                        @if ($key1 >= 6)
                                            <div class="soanh">
                                                <div class="soanhconlai"> + {{ $soanh - 6 }}</div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>

                    <div class="we-video-info">
                        <ul>
                            <li>
                                <button class="comment" name="comment{{ $item->id }}"
                                    id="comment{{ $item->id }}" onclick="load_comment({{ $item->id }})">
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins class="socomment" id="socomment{{ $item->id }}"
                                            name="socomment{{ $item->id }}"></ins>
                                    </span>
                                </button>
                            </li>
                            <li>
                                <button class="likepost" name="likepost{{ $item->id }}"
                                    id="likepost{{ $item->id }}" onclick="like({{ $item->id }})">
                                    <span class="likeadmin-name data-toggle=" tooltip title="like">
                                        <div class="icon-tim" name="icon-tim{{ $item->id }}"
                                            id="icon-tim{{ $item->id }}">
                                            <i class="ti-heart"></i>
                                        </div>
                                        <ins class="like-show" name="like-show{{ $item->id }}"
                                            id="like-show{{ $item->id }}">

                                        </ins>
                                    </span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Bình luận bài post --}}
                <div class="binhluanbaipost" id="binhluanbaipost{{ $item->id }}"
                    name="binhluanbaipost{{ $item->id }}">
                    <hr style="width:100%;text-align:left;margin-left:0">
                    <div class="binhluan">
                        <div class="post-comment avatar-binhluan">
                            <div class="comet-avatar">
                                <img src="{{ URL('avatar') }}/{{ $item->user->avatar }}" alt=""
                                    class="avatar-boder-radius-comment">
                            </div>
                            <div class="post-comt-box">
                                <form>
                                    @csrf
                                    <input type="hidden" name="idpost" id="idpost" value="{{ $item->id }}">
                                    <textarea placeholder="Viết bình luận..." id="noidungbinhluan{{ $item->id }}"
                                        name="noidungbinhluan{{ $item->id }}" class="noidungbinhluan"></textarea>
                                    <div class="add-smiles">
                                        <span class="em em-expressionless" title="add icon"
                                            name="add-icon{{ $item->id }}"
                                            onclick="hienicontextmenu({{ $item->id }})"></span>
                                        <div class="themhinh">
                                            <i class="fa fa-image"></i>
                                            <label class="fileContainer">
                                                <input id="uploadanhpostcomment{{ $item->id }}"
                                                    class="btn btn-primary" type="file" name="image_post_comment[]"
                                                    multiple="multiple"
                                                    onchange=" ImagesFileAsURLComment({{ $item->id }})"> <br />
                                            </label>
                                        </div>
                                        <div class="guibinhluan">
                                            <button type="button" class="btnbinhluan btnbinhluan{{ $item->id }}"
                                                id="btnbinhluan{{ $item->id }}"
                                                name="btnbinhluan{{ $item->id }}"
                                                onclick="postComment({{ $item->id }})">
                                                {{-- onclick="postComment({{ $item->id }})" --}}
                                                <i class="fa fa-paper-plane"></i>
                                            </button>
                                        </div>

                                    </div>
                                    <div class="smiles-bunch" id="smiles-bunch{{ $item->id }}">
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
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="anhbinhluan" id="anhbinhluan{{ $item->id }}">

                    </div>
                    <hr style="width:100%;text-align:left;margin-left:0">
                    <div class="comment-show" name="comment-show{{ $item->id }}"
                        id="comment-show{{ $item->id }}">

                    </div>
                    <div>
                        <a href="#" title="" class="showmore underline">Xem thêm bình</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        @foreach ($lstFriend as $fr)
            @if ($item->id_user == $fr->id_user_target && $fr->id_user_target != Auth::user()->id)
                <?php $key1 = 0; ?>
                <?php $soanh = 0; ?>
                <div class="central-meta item">
                    <div class="user-post">
                        <div class="friend-info">
                            <figure>
                                <img src="{{ URL('avatar') }}/{{ $item->user->avatar }}" alt=""
                                    class="avatar-boder-radius">
                            </figure>
                            <div class="friend-name">
                                <ins><a href="{{ route('profile-user', ['id' => $item->user->id]) }}"
                                        title="">{{ $item->user->first_name }}
                                        {{ $item->user->last_name }}</a></ins>
                                <span style="" class="date">{{ $item->view_mode }}:
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d - m - Y') }}</span>
                            </div>
                            <div class="description">
                                <p>
                                    {!! nl2br($item->content_post) !!}
                                </p>
                            </div>
                            @foreach ($list_media as $key => $media)
                                @if ($media->id_post == $item->id)
                                    <?php $soanh = $soanh + 1; ?>
                                @endif
                            @endforeach

                            <div class="post-meta">
                                @foreach ($list_media as $key => $media)
                                    @if ($media->id_post == $item->id)
                                        <?php $key1 = $key1 + 1; ?>
                                        <?php //{{$list_media->count()}}
                                        ?>
                                        @if ($key1 <= 6)
                                            <div class="linked-image item{{ $key1 }} ">
                                                <a href="{{ url('image_post') }}/{{ $media->media_file_name }}"
                                                    title=""></a>
                                                <img src="{{ url('image_post') }}/{{ $media->media_file_name }}"
                                                    alt="" class="imgpost">
                                                @if ($key1 >= 6)
                                                    <div class="soanh">
                                                        <div class="soanhconlai"> + {{ $soanh - 6 }}</div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>

                            <div class="we-video-info">
                                <ul>
                                    <li>
                                        <span class="views" data-toggle="tooltip" title="views">
                                            <i class="fa fa-eye"></i>
                                            <ins>1.2k</ins>
                                        </span>
                                    </li>
                                    <li>
                                        <button class="comment" name="comment{{ $item->id }}"
                                            id="comment{{ $item->id }}"
                                            onclick="load_comment({{ $item->id }})">
                                            <span class="comment" data-toggle="tooltip" title="Comments">
                                                <i class="fa fa-comments-o"></i>
                                                <ins>52</ins>
                                            </span>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="likepost" name="likepost{{ $item->id }}"
                                            id="likepost{{ $item->id }}" onclick="like({{ $item->id }})">
                                            <span class="likeadmin-name data-toggle=" tooltip title="like">
                                                <div class="icon-tim" name="icon-tim{{ $item->id }}"
                                                    id="icon-tim{{ $item->id }}">
                                                    <i class="ti-heart"></i>
                                                </div>
                                                <ins class="like-show" name="like-show{{ $item->id }}"
                                                    id="like-show{{ $item->id }}">

                                                </ins>
                                            </span>
                                        </button>
                                    </li>
                                    <li>
                                        <span class="dislike" data-toggle="tooltip" title="dislike">
                                            <i class="ti-heart-broken"></i>
                                            <ins>200</ins>
                                        </span>
                                    </li>
                                    <li class="social-media">
                                        <div class="menu">
                                            <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-html5"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-facebook"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-google-plus"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-twitter"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-css3"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-instagram"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-dribbble"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-pinterest"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            {{-- đường kẻ --}}
                        </div>
                        <div class="binhluanbaipost" id="binhluanbaipost{{ $item->id }}"
                            name="binhluanbaipost{{ $item->id }}">
                            <hr style="width:100%;text-align:left;margin-left:0">
                            <div class="binhluan">
                                <div class="post-comment avatar-binhluan">
                                    <div class="comet-avatar">
                                        <img src="{{ URL('avatar') }}/{{ $item->user->avatar }}" alt=""
                                            class="avatar-boder-radius-comment">
                                    </div>
                                    <div class="post-comt-box">
                                        <form>
                                            @csrf
                                            <input type="hidden" name="idpost" id="idpost"
                                                value="{{ $item->id }}">
                                            <textarea placeholder="Viết bình luận..." id="noidungbinhluan{{ $item->id }}"
                                                name="noidungbinhluan{{ $item->id }}" class="noidungbinhluan"></textarea>
                                            <div class="add-smiles">
                                                <span class="em em-expressionless" title="add icon"
                                                    name="add-icon{{ $item->id }}"
                                                    onclick="hienicontextmenu({{ $item->id }})"></span>
                                                <div class="themhinh">
                                                    <i class="fa fa-image"></i>
                                                    <label class="fileContainer">
                                                        <input id="uploadanhpostcomment{{ $item->id }}"
                                                            class="btn btn-primary" type="file"
                                                            name="image_post_comment[]" multiple="multiple"
                                                            onchange=" ImagesFileAsURLComment({{ $item->id }})">
                                                        <br />
                                                    </label>
                                                </div>
                                                <div class="guibinhluan">

                                                    <button type="button"
                                                        class="btnbinhluan btnbinhluan{{ $item->id }}"
                                                        id="btnbinhluan{{ $item->id }}"
                                                        name="btnbinhluan{{ $item->id }}"
                                                        onclick="postComment({{ $item->id }})">
                                                        {{-- onclick="postComment({{ $item->id }})" --}}
                                                        <i class="fa fa-paper-plane"></i>
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="smiles-bunch" id="smiles-bunch{{ $item->id }}">
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
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="anhbinhluan" id="anhbinhluan{{ $item->id }}">

                            </div>
                            <hr style="width:100%;text-align:left;margin-left:0">
                            <div class="comment-show" name="comment-show{{ $item->id }}"
                                id="comment-show{{ $item->id }}">

                            </div>
                            <div>
                                <a href="#" title="" class="showmore underline">Xem thêm bình</a>
                            </div>


                        </div>
                    </div>
                </div>
            @elseif($item->id_user == $fr->id_user_preference && $fr->id_user_preference != Auth::user()->id)
                <?php $key1 = 0; ?>
                <?php $soanh = 0; ?>
                <div class="central-meta item">
                    <div class="user-post">
                        <div class="friend-info">
                            <figure>
                                <img src="{{ URL('avatar') }}/{{ $item->user->avatar }}" alt=""
                                    class="avatar-boder-radius">
                            </figure>
                            <div class="friend-name">
                                <ins><a href="{{ route('profile-user', ['id' => $item->user->id]) }}"
                                        title="">{{ $item->user->first_name }}
                                        {{ $item->user->last_name }}</a></ins>
                                <span style="" class="date">{{ $item->view_mode }}:
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d - m - Y') }}</span>
                            </div>
                            <div class="description">
                                <p>
                                    {!! nl2br($item->content_post) !!}
                                </p>
                            </div>
                            @foreach ($list_media as $key => $media)
                                @if ($media->id_post == $item->id)
                                    <?php $soanh = $soanh + 1; ?>
                                @endif
                            @endforeach

                            <div class="post-meta">
                                @foreach ($list_media as $key => $media)
                                    @if ($media->id_post == $item->id)
                                        <?php $key1 = $key1 + 1; ?>
                                        <?php //{{$list_media->count()}}
                                        ?>
                                        @if ($key1 <= 6)
                                            <div class="linked-image item{{ $key1 }} ">
                                                <a href="{{ url('image_post') }}/{{ $media->media_file_name }}"
                                                    title=""></a>
                                                <img src="{{ url('image_post') }}/{{ $media->media_file_name }}"
                                                    alt="" class="imgpost">
                                                @if ($key1 >= 6)
                                                    <div class="soanh">
                                                        <div class="soanhconlai"> + {{ $soanh - 6 }}</div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>

                            <div class="we-video-info">
                                <ul>
                                    <li>
                                        <span class="views" data-toggle="tooltip" title="views">
                                            <i class="fa fa-eye"></i>
                                            <ins>1.2k</ins>
                                        </span>
                                    </li>
                                    <li>
                                        <button class="comment" name="comment{{ $item->id }}"
                                            id="comment{{ $item->id }}"
                                            onclick="load_comment({{ $item->id }})">
                                            <span class="comment" data-toggle="tooltip" title="Comments">
                                                <i class="fa fa-comments-o"></i>
                                                <ins>52</ins>
                                            </span>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="likepost" name="likepost{{ $item->id }}"
                                            id="likepost{{ $item->id }}" onclick="like({{ $item->id }})">
                                            <span class="likeadmin-name data-toggle=" tooltip title="like">
                                                <div class="icon-tim" name="icon-tim{{ $item->id }}"
                                                    id="icon-tim{{ $item->id }}">
                                                    <i class="ti-heart"></i>
                                                </div>
                                                <ins class="like-show" name="like-show{{ $item->id }}"
                                                    id="like-show{{ $item->id }}">

                                                </ins>
                                            </span>
                                        </button>
                                    </li>
                                    <li>
                                        <span class="dislike" data-toggle="tooltip" title="dislike">
                                            <i class="ti-heart-broken"></i>
                                            <ins>200</ins>
                                        </span>
                                    </li>
                                    <li class="social-media">
                                        <div class="menu">
                                            <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-html5"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-facebook"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-google-plus"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-twitter"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-css3"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-instagram"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-dribbble"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i
                                                            class="fa fa-pinterest"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            {{-- đường kẻ --}}
                        </div>
                        <div class="binhluanbaipost" id="binhluanbaipost{{ $item->id }}"
                            name="binhluanbaipost{{ $item->id }}">
                            <hr style="width:100%;text-align:left;margin-left:0">
                            <div class="binhluan">
                                <div class="post-comment avatar-binhluan">
                                    <div class="comet-avatar">
                                        <img src="{{ URL('avatar') }}/{{ $item->user->avatar }}" alt=""
                                            class="avatar-boder-radius-comment">
                                    </div>
                                    <div class="post-comt-box">
                                        <form>
                                            @csrf
                                            <input type="hidden" name="idpost" id="idpost"
                                                value="{{ $item->id }}">
                                            <textarea placeholder="Viết bình luận..." id="noidungbinhluan{{ $item->id }}"
                                                name="noidungbinhluan{{ $item->id }}" class="noidungbinhluan"></textarea>
                                            <div class="add-smiles">
                                                <span class="em em-expressionless" title="add icon"
                                                    name="add-icon{{ $item->id }}"
                                                    onclick="hienicontextmenu({{ $item->id }})"></span>
                                                <div class="themhinh">
                                                    <i class="fa fa-image"></i>
                                                    <label class="fileContainer">
                                                        <input id="uploadanhpostcomment{{ $item->id }}"
                                                            class="btn btn-primary" type="file"
                                                            name="image_post_comment[]" multiple="multiple"
                                                            onchange=" ImagesFileAsURLComment({{ $item->id }})">
                                                        <br />
                                                    </label>
                                                </div>
                                                <div class="guibinhluan">

                                                    <button type="button"
                                                        class="btnbinhluan btnbinhluan{{ $item->id }}"
                                                        id="btnbinhluan{{ $item->id }}"
                                                        name="btnbinhluan{{ $item->id }}"
                                                        onclick="postComment({{ $item->id }})">
                                                        {{-- onclick="postComment({{ $item->id }})" --}}
                                                        <i class="fa fa-paper-plane"></i>
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="smiles-bunch" id="smiles-bunch{{ $item->id }}">
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
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="anhbinhluan" id="anhbinhluan{{ $item->id }}">

                            </div>
                            <hr style="width:100%;text-align:left;margin-left:0">
                            <div class="comment-show" name="comment-show{{ $item->id }}"
                                id="comment-show{{ $item->id }}">

                            </div>
                            {{-- <div>
                                <a href="#" title="" class="showmore underline">Xem thêm bình</a>
                            </div> --}}


                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
@endforeach





@include('thuvien.ajaxpost')
