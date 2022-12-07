<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th width="5%">
                    <p> ID </p>
                </th>
                <th width="15%">
                    <p>Người viết bài</p>
                </th>
                <th width="20%">
                    <p> Nội dung</p>
                </th>
                <th width="15%">
                    <p>Chế độ xem</p>
                </th>
                <th width="20%">
                    <p>Thời gian</p>
                </th>
                <th width="15%">
                    <p>Trạng thái</p>
                </th>
                <th width="10%">
                    <p>Thao tác</p>
                </th>
            </tr>
            @foreach ($lstPost as $lstpost => $post)
                <tr>
                    <td>
                        <p  class="td-table"> {{ $post->id }}</p>
                    </td>
                    <td><p class="td-table">{{ $post->user->first_name }} {{ $post->user->last_name }}</p></td>
                    <td><p class="td-table">{{ $post->content_post }}</p></td>
                    <td><p class="td-table">{{ $post->view_mode }}</p></td>
                    <td><p class="td-table">{{ $post->created_at }}</p></td>
                    <td><p class="td-table">{{ $post->status }}</p></td>


                    <td>
                        <div class="btn-group dropdown-split-info">
                            {{-- <button type="button" class="btn btn-info"><i class="icofont icofont-info-square"></i>Thao
                                tác</button> --}}
                            <button type="button"
                                class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start"
                                style="position: absolute; transform: translate3d(86px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item waves-effect waves-light"
                                    href="{{ Route('adminDetailPost', ['id' => $post->id]) }}">Xem chi
                                    tiết</a>
                                <a class="dropdown-item waves-effect waves-light" href="#">Khóa tải
                                    khoản</a>
                                <a class="dropdown-item waves-effect waves-light" href="#">Xem
                                    Report</a>



                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
