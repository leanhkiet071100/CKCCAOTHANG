<script>
    var loadFileAnhBia = function(event) {
        var output = document.getElementById('capnhatanhbia').files[0];
        var typeoutput = output.type;
        if (typeoutput == "image/jpeg" || typeoutput == "image/png" || typeoutput == "image/gif") {
            var output = document.getElementById('anhbia');
            output.src = URL.createObjectURL(event.target.files[0]);
            var luuanhbia = document.getElementById('luuanhbia');
            luuanhbia.setAttribute('style', 'display: block');
        } else {
            alert("Vui lòng chọn hình ảnh");
        }
    };

    var loadFileAnhDaiDien = function(event) {
        var output = document.getElementById('capnhatanhdaidien').files[0];
        var typeoutput = output.type;
        if (typeoutput == "image/jpeg" || typeoutput == "image/png" || typeoutput == "image/gif") {
            luuanhavatar.setAttribute('style', 'display: block');
            var output = document.getElementById('anhdaidien');
            output.src = URL.createObjectURL(event.target.files[0]);
        } else {
            alert("Vui lòng chọn hình ảnh");
        }
    };

    function huyloadanh() {
        //hủy hành động load ảnh
        var luuanhbia = document.getElementById('luuanhbia');
        luuanhbia.setAttribute('style', 'display: none');
        var anhbia = document.getElementById('anhbia');
        var anhdaidien = document.getElementById('anhdaidien');
        //trả lại hình ảnh ban đầu
        anhbia.src = "{{ URL('cover_image/') }}/{{ $account->cover_image }}";
        anhdaidien.src = "{{ URL('avatar/') }}/{{ $account->avatar }}";

        var luuanhavatar = document.getElementById('luuanhavatar');
        luuanhavatar.setAttribute('style', 'display: none');
    }
</script>
