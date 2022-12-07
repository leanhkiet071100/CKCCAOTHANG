<section>
    <div class="feature-photo">
        <figure><img src="{{ URL('cover_image/') }}/{{ $account->cover_image }}" class="anhbia" id="anhbia"
                name="anhbia">

        </figure>
        <form method="post" action="{{ route('change-coverimage') }}" enctype="multipart/form-data"
            class="form_thaydoianhbia">
            @csrf
            <div class="luuanh" id="luuanhbia">
                <a class="buttonluuanh buttonhuy" onclick="huyloadanh()"> Hủy </a>
                <button class="buttonluuanh buttonluuthaydoi"> Lưu thay đổi  </button>
            </div>

            <div class="add-btn">
                <span>1205 followers</span>
                @if ($check_relation == 2 || $check_relation == 0)
                    <a href="{{ route('request-add-friend', ['id' => $account->id]) }}" title=""
                        data-ripple=""><?php if ($check_relation == 0) {
                            echo 'Kết Bạn';
                        } else {
                            echo 'Bạn Bè';
                        } ?></a>
                @endif
            </div>


            <div class="edit-phto">
                <i class="fa fa-camera-retro"></i>
                <label class="fileContainer">
                    Cập nhật ảnh bìa
                    <input type="file" id="capnhatanhbia" name="capnhatanhbia" onchange="loadFileAnhBia(event)"  class="form-control capnhatanhbia" />
                </label>
            </div>
        </form>

        <form method="post" action="{{ route('change-avatar') }}" enctype="multipart/form-data"
            class="form_thaydoianhavatar">
            @csrf
            <div class="luuanh" id="luuanhavatar">
                <a class="buttonluuanh buttonhuy" onclick="huyloadanh()">
                    Hủy
                </a>
                <button class="buttonluuanh buttonluuthaydoi">
                    Lưu thay đổi
                </button>

            </div>
            <div class="container-fluid">
                <div class="row merged">
                    <div class="col-lg-2 col-sm-3">
                        <div class="user-avatar">
                            <figure>
                                <img src="{{ URL('avatar/') }}/{{ $account->avatar }}" alt=""
                                    class="anhdaidien" name="anhdaidien" id="anhdaidien">
                                <div class="edit-phto">
                                    <i class="fa fa-camera-retro"></i>
                                    <label class="fileContainer">
                                        Cập nhật ảnh đại diện
                                        <input type="file" onchange="loadFileAnhDaiDien(event)" name="avatar"  id="capnhatanhdaidien" name="capnhatanhdaidien"/>
                                    </label>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-10 col-sm-9">
        <div class="timeline-info" id="timeline-info">
            <ul>
                <li class="admin-name">
                    <h5>{{ $account->first_name }} {{ $account->last_name }}<?php if ($account->sub_name) {
                        echo " ({$account->sub_name})";
                    } ?></h5>
                </li>
                <li>
                    <a id="dongthoigian" class="active" href="#{{ route('profile-user1', ['id' => $account->id]) }}" title="" data-ripple="" >Dòng thời gian</a>
                    <a id="allanhcanhan" class="" id="chuyentranganh" title="" data-ripple title="" data-ripple="" href="#{{Route('photos', ['id' => $account->id])}}">Ảnh</a>
                    <a id="video" class="" href="timeline-videos.html" title="" data-ripple="">Videos</a>
                    <a id="banbecanhan" class="" href="#{{ route('friendlist', ['id' => $account->id]) }}" title="" data-ripple="">Bạn bè</a>
                    <a id="nhom" class="" href="timeline-groups.html" title="" data-ripple="">Nhóm</a>
                    <a id=" " class="" href="about.html" title="" data-ripple=""></a>
                    <a id="hơn" class="" href="#" title="" data-ripple="">more</a>
                </li>
            </ul>
        </div>
    </div>

</section><!-- top area -->
    @include('thuvien.ajax')
    
<script>

    // $("header").on("click", ".buttonluuthaydoi", function() {
    //     $.ajax({
    //         url: "{{ route('change-coverimage') }}",
    //         type: "POST",
    //         data: {
    //             '_token': "{{ csrf_token() }}",
    //             'cover_image': $('#anhbia').attr('src')
    //         },
    //         success: function(data) {
    //             $('#content').html(data);
    //         }
    //     });
    // });
    
    // $(".timeline-info").on("click", "a", function() {
    //     var hrf=$(this).attr('href');
    //     var lin = hrf.substring(1, hrf.length);
    //     var lin_split = lin.split('/');
    //     var lin_last = lin_split[lin_split.length - 1];
    //     //đổi tên url 
    //     // if(lin=="photos"){
    //     //     $("#chuyentranganh").attr("href", "{{Route('photos', ['id' => $account->id])}}");
    //     // }
    //      //$('#loadtrangmenu').load(lin);
    //      //window.location = lin;
    //     window.history.pushState("", "", lin);
    //     $('#loadtrangmenu').load(lin);
    //     $(this).addClass('active');
    //     $(this).siblings().removeClass('active');
    // });



    $(".timeline-info").on("click", "a", function() {
        var hrf=$(this).attr('href');
        var lin = hrf.substring(1, hrf.length);
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        //chuyển trang ajax
        $.ajax({
            url: lin,
            type: "GET",
            data: {
                '_token': "{{ csrf_token() }}",
                'account_id': {{ $account->id }}
            },
            success: function(data) {
                $('#loadtrangmenu').html(data);
            }
        });
    });

    
    
</script>


