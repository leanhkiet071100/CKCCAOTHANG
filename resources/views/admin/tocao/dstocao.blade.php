<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th width="5%" class="table-th">
                    <p> STT </p>
                </th>
                <th width="50%" class="table-th">
                    <p>nội dung</p>
                </th>
                <th class="table-th">
                    <p> Hiện</p>
                </th>
                 <th class="table-th">
                    <p> Chức năng</p>
                </th>
            </tr>
            @foreach ($lstReport as $key => $value)
                <tr>
                    <td>
                        <p class="td-table table-tocao">{{$key + 1}}</p>
                    </td>
                    <td>
                        <p class="td-table table-tocao">{{$value->reason}}</p>
                    </td>
                    <td>
                        <p class="td-table table-tocao">
                            @if ($value->status == 1)
                                {{-- check --}}
                                <input type="checkbox" class="check-status" id="check-status" data-id="{{$value->id}}" checked onclick="checkstatus({{$value->id}})">

                            @else
                                {{-- uncheck --}}
                                <input type="checkbox" class="check-status" id="check-status" data-id="{{$value->id}}">
                            @endif
                        </p>
                    </td>
                    <td>
                        <p class="td-table table-tocao icon-chucnang">
                            <a href="" alt="sửa"><i class="fa fa-trash w3-xxlarge" ></i></a>
                            <a href="" alt="xóa"><i class="fa fa-asterisk"></i></a>
                        </p>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

<script>
    $('.check-status').click(function() {
        console.log('click');
        // var id = $(this).attr('data-id');
        // var url = "{{ route('update-status-report') }}";
        // var formData = new FormData();
        // formData.append('id', id);
        // $.ajax({
        //     url: url,
        //     type: 'POST',
        //     data: formData,
        //     success: function(data) {
        //         console.log(data);
        //     },
        //     error: function(data) {
        //         alert('Vui lòng nhập thông tin');
        //     },
        //     cache: false,
        //     contentType: false,
        //     processData: false
        // });
    })
</script>