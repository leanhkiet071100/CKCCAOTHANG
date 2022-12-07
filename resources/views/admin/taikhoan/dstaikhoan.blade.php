<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th width="10%">
                    <p class="idtaikhoan">ID</p>
                </th>
                <th width="20%">
                    <p class="table-email">Email</p>
                </th>
                <th width="15%">
                    <p class="table-sdt"> Số điện thoại </p>
                </th>
                <th width="10%">
                    <p class="table-ho"> Họ </p>
                </th>
                <th width="10%">
                    <p class="table-ten">Tên</p>
                </th>
                <th width="15%">
                    <p class="table-ngaysinh">Ngày sinh</p>
                </th>
                <th width="10%">
                    <p class="table-trangthai">Trạng thái</p>
                </th>
                <th width="10%">
                    <p class="table-tt">Thao tác</p>
                </th>
            </tr>
            @foreach ($lstAccountUser as $account => $accUser)
                <tr>
                    <td>{{ $accUser->id }}</td>
                    <td>
                        <p class="td-table nd-email"> {{ $accUser->email }}</p>
                    </td>
                    <td>
                        <p class="td-table nd-sdt">{{ isset($accUser->phone) ? $accUser->phone : 'Chưa có' }}</p>
                    </td>
                    <td>
                        <p class="td-table nd-ho">{{ $accUser->first_name }}</p>
                    </td>
                    <td>
                        <p class="td-table nd-ten">{{ $accUser->last_name }}</p>
                    </td>
                    {{-- Kiểm tra birth day --}}
                    <td>
                        <p class="td-table nd-ngaysinh">
                            {{ isset($accUser->birth_date) ? $accUser->birth_date : 'Chưa có thông tin' }}</p>
                    </td>
                    {{-- end Kiểm tra birth day --}}

                    <td>
                        @if ($accUser->status == 0)
                            <span class="label label-warning">Chưa kích hoạt</span>
                        @elseif($accUser->status == 1)
                            <span class="label label-success">Đã kích hoạt</span>
                        @else
                            <span class="label label-danger">Đang bị khóa</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group dropdown-split-info">
                           {{-- <button type="button" class="btn btn-info"><i class="icofont icofont-info-square"></i>Thao tác</button> --}}
                            <button type="button"
                                class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="thaotac" name="thaotac"  onclick="menuthaotac({{$accUser->id}})">
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start" id="nemuthaotac{{$accUser->id}}"
                                style="position: absolute; transform: translate3d(86px, 40px, 0px); top: 0px; left: 0px; will-change: transform;" style="display: block">
                                <a class="dropdown-item waves-effect waves-light"
                                    href="{{ Route('getInfoUser', ['id' => $accUser->id]) }}">Xem chi tiết</a>
                                <a class="dropdown-item waves-effect waves-light" href="#">Khóa tải khoản</a>
                                <a class="dropdown-item waves-effect waves-light" href="#">Xem Report</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
