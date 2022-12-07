 <script type="text/javascript">
     $(document).ready(function() {
         //kiểm tra like bài viết
         $.ajax({
             url: "{{ route('kiemtralikebaiviet') }}",
             type: 'POST',
             data: data,
             success: function(data) {
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

 <div class="central-meta listPost" name="post-show{{ $listPost->id }}" id="post-show{{ $listPost->id }}">
     @if ($listPost->id_user == Auth::user()->id)
         <button class="bacham" id="bacham" name="bacham" onclick="hienchucnangbaiviet({{ $listPost->id }})">
             ...
         </button>
         <div class="chucnangbaiviet" id="chucnangbaiviet{{ $listPost->id }}" name="chucnangbaiviet{{ $listPost->id }}"
             style="display: none">
             <button class="suabaiviet" name="suabaiviet" id="suabaiviet"
                 data-url="{{ route('suabaiviet-show', ['idpost' => $listPost->id]) }}"
                 onclick="hienformsuabaiviet({{ $listPost->id }})">Sửa bài viết</button>
             <button class="xoabaiviet" name="xoabaiviet" id="xoabaiviet" onclick="xoabaiviet({{ $listPost->id }})">
                 Xóa bài viết </button>
         </div>
     @endif
     <div class="user-post">
         <div class="friend-info">
             <figure>
                 <img src="{{ URL('avatar') }}/{{ $listPost->user->avatar }}" alt=""
                     class="avatar-boder-radius">
             </figure>
             <div class="friend-name">
                 <ins><a href="{{ route('profile-user', ['id' => $listPost->user->id]) }}"
                         title="">{{ $listPost->user->first_name }} {{ $listPost->user->last_name }}</a></ins>
                 <span style=""
                     class="date">{{ $listPost->view_mode }}:{{ \Carbon\Carbon::parse($listPost->created_at)->format('d - m - Y') }}</span>
             </div>
             <div class="description" id="description-post{{ $listPost->id }}" name="description-post">
                 <p>
                     {!! nl2br($listPost->content_post) !!}
                 </p>
             </div>
             @foreach ($list_media as $key => $media)
                 @if ($media->id_post == $listPost->id)
                     <?php $soanh = $soanh + 1; ?>
                 @endif
             @endforeach

             <div class="post-meta">
                 @foreach ($list_media as $key1 => $media)
                     @if ($media->id_post == $listPost->id)
                         <?php $key1 = $key1 + 1; ?>
                         <?php //{{$list_media->count()}}
                         ?>
                         @if ($key1 <= 6)
                             <div class="linked-image listPost{{ $key1 }} ">
                                 <a href="{{ url('image_post') }}/{{ $media->media_file_name }}"
                                     title=""></a>
                                 <img src="{{ url('image_post') }}/{{ $media->media_file_name }}" alt=""
                                     class="imgpost">
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
                         <button class="comment" name="comment{{ $listPost->id }}" id="comment{{ $listPost->id }}"
                             onclick="load_comment({{ $listPost->id }})">
                             <span class="comment" data-toggle="tooltip" title="Comments">
                                 <i class="fa fa-comments-o"></i>
                                 <ins class="socomment" id="socomment{{ $listPost->id }}"
                                     name="socomment{{ $listPost->id }}">{{$socommet}}</ins>
                             </span>
                         </button>
                     </li>
                     <li>
                         <button class="likepost" name="likepost{{ $listPost->id }}" id="likepost{{ $listPost->id }}"
                             onclick="like({{ $listPost->id }})">
                             <span class="likeadmin-name data-toggle=" tooltip title="like">
                                 <div class="icon-tim" name="icon-tim{{ $listPost->id }}"
                                     id="icon-tim{{ $listPost->id }}">
                                     @if($kiemtralike == 1)
                                         <i class="fa fa-heart" aria-hidden="true" style="color:red"></i>
                                    @else
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    @endif
                                 </div>
                                 <ins class="like-show" name="like-show{{ $listPost->id }}"
                                     id="like-show{{ $listPost->id }}">
                                        {{$solike}}
                                 </ins>
                             </span>
                         </button>
                     </li>
                 </ul>
             </div>
         </div>

         {{-- Bình luận bài post --}}
         <div class="binhluanbaipost" id="binhluanbaipost{{ $listPost->id }}"
             name="binhluanbaipost{{ $listPost->id }}">
             <hr style="width:100%;text-align:left;margin-left:0">
             <div class="binhluan">
                 <div class="post-comment avatar-binhluan">
                     <div class="comet-avatar">
                         <img src="{{ URL('avatar') }}/{{ $listPost->user->avatar }}" alt=""
                             class="avatar-boder-radius-comment">
                     </div>
                     <div class="post-comt-box">
                         <form>
                             @csrf
                             <input type="hidden" name="idpost" id="idpost" value="{{ $listPost->id }}">
                             <textarea placeholder="Viết bình luận..." id="noidungbinhluan{{ $listPost->id }}"
                                 name="noidungbinhluan{{ $listPost->id }}" class="noidungbinhluan"></textarea>
                             <div class="add-smiles">
                                 <span class="em em-expressionless" title="add icon" name="add-icon{{ $listPost->id }}"
                                     onclick="hienicontextmenu({{ $listPost->id }})"></span>
                                 <div class="themhinh">
                                     <i class="fa fa-image"></i>
                                     <label class="fileContainer">
                                         <input id="uploadanhpostcomment{{ $listPost->id }}" class="btn btn-primary"
                                             type="file" name="image_post_comment[]" multiple="multiple"
                                             onchange=" ImagesFileAsURLComment({{ $listPost->id }})"> <br />
                                     </label>
                                 </div>
                                 <div class="guibinhluan">
                                     <button type="button" class="btnbinhluan btnbinhluan{{ $listPost->id }}"
                                         id="btnbinhluan{{ $listPost->id }}" name="btnbinhluan{{ $listPost->id }}"
                                         onclick="postComment({{ $listPost->id }})">
                                         {{-- onclick="postComment({{ $listPost->id }})" --}}
                                         <i class="fa fa-paper-plane"></i>
                                     </button>
                                 </div>

                             </div>
                             <div class="smiles-bunch" id="smiles-bunch{{ $listPost->id }}">
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
             <div class="anhbinhluan" id="anhbinhluan{{ $listPost->id }}">

             </div>
             <hr style="width:100%;text-align:left;margin-left:0">
             <div class="comment-show" name="comment-show{{ $listPost->id }}" id="comment-show{{ $listPost->id }}">

             </div>
             <div>
                 <a href="#" title="" class="showmore underline">Xem thêm bình</a>
             </div>


         </div>
     </div>
 </div>
