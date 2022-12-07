 <script type="text/javascript">
     function ImagesFileAsURL() {
         var fileSelected = document.getElementById('uploadanhpost').files;
         // xóa ảnh post
         document.getElementById('anhpost').innerHTML = "";
         if (fileSelected.length > 0) {

             for (var i = 0; i < fileSelected.length; i++) {
                 var fileToLoad = fileSelected[i];
                 var fileReader = new FileReader();
                 fileReader.onload = function(fileLoaderEvent) {
                     var srcData = fileLoaderEvent.target.result;
                     var newImage = document.createElement('img');
                     newImage.src = srcData;
                     document.getElementById('anhpost').innerHTML += newImage.outerHTML;
                 }
                 fileReader.readAsDataURL(fileToLoad);
             }
         }
     }

     function ImagesFileAsURLComment(idpost) {
         var fileSelected = document.getElementById('uploadanhpostcomment' + idpost).files;
         // xóa ảnh post
         document.getElementById('anhbinhluan' + idpost).innerHTML = "";

         if (fileSelected.length > 0) {
             for (var i = 0; i < fileSelected.length; i++) {

                 var fileToLoad = fileSelected[i];
                 //kiểm tra có phải hình ảnh hay không
                 var kiemtrahinhanh = fileToLoad.type;
                 if (kiemtrahinhanh == "image/jpeg" || kiemtrahinhanh == "image/png" || kiemtrahinhanh == "image/gif") {
                     var fileReader = new FileReader();
                     fileReader.onload = function(fileLoaderEvent) {
                         var srcData = fileLoaderEvent.target.result;
                         var newImage = document.createElement('img');
                         newImage.src = srcData;
                         document.getElementById('anhbinhluan' + idpost).innerHTML += newImage.outerHTML;
                     }
                     fileReader.readAsDataURL(fileToLoad);
                 } else {
                     alert("Bạn chỉ được chọn file hình ảnh");
                 }
             }
         }

     }

     //thêm comment
     function postComment(idpost) {
         var noidungbinhluan = $('#noidungbinhluan' + idpost).val();
         console.log(noidungbinhluan);
         var hinhbinhluan = $('#uploadanhpostcomment' + idpost)[0].files;

         var formData = new FormData();
         formData.append('idpost', idpost);
         formData.append('noidungbinhluan', noidungbinhluan);

         for (var i = 0; i < hinhbinhluan.length; i++) {
             formData.append('hinhbinhluan[]', hinhbinhluan[i]);
         }

         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $.ajax({
             url: "{{ route('post-comment-post') }}",
             type: 'POST',
             data: formData,
             contentType: false,
             processData: false,
             success: function(data) {

                 load_comment(idpost);
                 $('#noidungbinhluan' + idpost).val('');
                 $('#uploadanhpostcomment' + idpost).val('');
                 $('#anhbinhluan' + idpost).html('');
                 // $('#anhbinhluan' + idpost).html('');
                 // $('#comment-show' + idpost).html(data);

             }
         });
     }

     //load comment
     function load_comment(idpost) {
         var binhluanbaipost = document.getElementById("binhluanbaipost" + idpost);
         binhluanbaipost.style.display = "block";
         var url = $('#url').val();
         var data = {
             'idpost': idpost
         };

         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $.ajax({
             url: "{{ route('load-comment-post') }}",
             type: 'POST',
             data: data,
             success: function(data) {
                 $('#comment-show' + idpost).html('');
                 $('#comment-show' + idpost).append(data);
             }
         });
     }

     //hiển thị thêm bình luận
     function hienicontextmenu(idpost) {
         var x = document.getElementById("smiles-bunch" + idpost);
         if (x.style.display === "none") {
             x.style.display = "block";
         } else {
             x.style.display = "none";
         }

     }

     //hiển thị trả lời bình luận
     function hienthitraloibinhluan(idcomment) {
         var x = document.getElementById("reply-comment" + idcomment);
         x.style.display = "block";
     }

     //like
     function like(idpost) {

         var data = {
             'idpost': idpost
         };

         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $.ajax({
             url: "{{ route('like-post') }}",
             type: 'POST',
             data: data,
             success: function(data) {

                 $('#like-show' + idpost).html('');
                 $('#like-show' + idpost).append(data);
                 if (data == 1) {
                     $('#icon-tim' + idpost).html(
                         '<i class="fa fa-heart" aria-hidden="true" style="color:red"></i>');
                 } else {
                     $('#icon-tim' + idpost).html('<i class="fa fa-heart-o" aria-hidden="true"></i>');
                 }
             }
         });
     }

     //repcomment 
     function repcomment(idpost, idcomment) {
         var noidungbinhluan = $('#repnoidungbinhluan' + idcomment).val();
         var hinhbinhluan = $('#uploadanhpostrepcomment' + idcomment)[0].files;
         console.log(hinhbinhluan);
         var formData = new FormData();
         formData.append('idcomment', idcomment);
         formData.append('noidungbinhluan', noidungbinhluan);
         formData.append('idpost', idpost);

         for (var i = 0; i < hinhbinhluan.length; i++) {
             formData.append('hinhbinhluan[]', hinhbinhluan[i]);
         }

         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $.ajax({
             url: "{{ route('repcomment') }}",
             type: 'POST',
             data: formData,
             contentType: false,
             processData: false,
             success: function(data) {

                 load_comment(idpost);
                 $('#noidungbinhluan' + idcomment).val('');
                 $('#uploadanhpostrepcomment' + idcomment).val('');
                 $('#anhbinhluan' + idcomment).html('');
                 // $('#anhbinhluan' + idpost).html('');
                 // $('#comment-show' + idpost).html(data);

             }
         });
     }

     //hiện hình repcomment(
     function ImagesFileAsURLREPComment(idcomment) {
         var fileSelected = document.getElementById('uploadanhpostrepcomment' + idcomment).files;
         if (fileSelected.length > 0) {
             for (var i = 0; i < fileSelected.length; i++) {

                 var fileToLoad = fileSelected[i];
                 //kiểm tra có phải hình ảnh hay không
                 var kiemtrahinhanh = fileToLoad.type;
                 if (kiemtrahinhanh == "image/jpeg" || kiemtrahinhanh == "image/png" || kiemtrahinhanh == "image/gif") {

                     var fileReader = new FileReader();
                     fileReader.onload = function(fileLoaderEvent) {
                         var srcData = fileLoaderEvent.target.result;
                         var newImage = document.createElement('img');
                         newImage.src = srcData;
                         document.getElementById('repanhbinhluan' + idcomment).innerHTML += newImage.outerHTML;
                     }
                     fileReader.readAsDataURL(fileToLoad);
                 } else {
                     alert("Chỉ được chọn hình ảnh");


                 }
             }
         }
     }

     function kiemtralikebaiviet(id_post) {
         var data = {
             'idpost': idpost
         };

         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $.ajax({
             url: "{{ route('kiemtralikebaiviet') }}",
             type: 'POST',
             data: data,
             success: function(data) {

                 if (data == 1) {
                     $('#icon-tim' + idpost).html(
                         '<i class="fa fa-heart" aria-hidden="true" style="color:red"></i>');
                 } else {
                     $('#icon-tim' + idpost).html('<i class="fa fa-heart-o" aria-hidden="true"></i>');
                 }
             }
         });
     }

     function hienchucnangbaiviet(id_post) {
         var chucnangbaiviet = document.getElementById("chucnangbaiviet" + id_post);
         if (chucnangbaiviet.style.display == "none") {
             chucnangbaiviet.style.display = "block";
         } else {
             chucnangbaiviet.style.display = "none";
         }
     }

     function xoabaiviet(id_post) {
         //xuất confirm
         var r = confirm("Bạn có chắc chắn muốn xóa bài viết này không?");
         if (r == true) {
             var data = {
                 'idpost': id_post
             };

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $.ajax({
                 url: "{{ route('xoabaiviet') }}",
                 type: 'POST',
                 data: data,
                 success: function(data) {

                     $('#post-show' + id_post).html('');
                     $('#post-show' + id_post).append(data);
                     $('#post-show' + id_post).hide();
                 }
             });
         }
     }

     function hienformsuabaiviet(id_post) {
         var formsuabaiviet = document.getElementById("formsuabaiviet");
         formsuabaiviet.setAttribute('style', 'display: block');
         var themlayout = document.getElementById("theme-layout");
         $(".theme-layout").addClass('active1');

         formData = new FormData();
         formData.append('idpost', id_post);
         formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
         $.ajax({
             url: "{{ route('suabaiviet-show') }}",
             type: 'POST',
             data: formData,
             processData: false,
             contentType: false,
             success: function(data) {

                 $('#formsuabaiviet').html(data);
             }
         });
     }

     function hientocao(idpost) {
         var formsuabaiviet = document.getElementById("formsuabaiviet");
         formsuabaiviet.setAttribute('style', 'display: block');
         var themlayout = document.getElementById("theme-layout");
         $(".theme-layout").addClass('active1');
         
         var formData = new FormData();
         formData.append('idpost', idpost);

        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $.ajax({
             url: "{{ route('show-tocao') }}",
             type: 'post',
             data: formData,
            contentType: false,
             processData: false,
             success: function(data) {
                 $('#formsuabaiviet').html(data);
             }
         });
     }


     function huysuabaiviet() {
         var r = confirm("Bạn có chắc chắn muốn hủy sửa bài viết này không?");

         if (r == true) {
             var formsuabaiviet = document.getElementById("formsuabaiviet");
             formsuabaiviet.setAttribute('style', 'display: none');
             var themlayout = document.getElementById("theme-layout");
             $(".theme-layout").removeClass('active1');
         }

     }

     function suabaiviet(id_post) {
         var noidung = $('#content_post').val();
         //  var hinh = $('#uploadanhpost')[0].files;
         var hinh = document.getElementById('uploadanhpost').files;
         console.log(hinh);
         formData = new FormData();
         formData.append('idpost', id_post);
         formData.append('content', noidung);

         for (var i = 0; i < hinh.length; i++) {
             formData.append('hinhanh[]', hinh[i]);
         }

         formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
         $.ajax({
             url: "{{ route('suabaiviet') }}",
             type: 'POST',
             data: formData,
             processData: false,
             contentType: false,
             success: function(data) {

                 var formsuabaiviet = document.getElementById("formsuabaiviet");
                 formsuabaiviet.setAttribute('style', 'display: none');
                 var themlayout = document.getElementById("theme-layout");
                 $(".theme-layout").removeClass('active1');
                 $('#post-show' + id_post).html('');
                 $('#post-show' + id_post).append(data);
             }
         });
     }

    function tocaobaiviet(idpost, idtocao){
        var formData = new FormData();
        formData.append('idpost', idpost);
        formData.append('idtocao', idtocao);
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('tocao-baiviet') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {

             var formsuabaiviet = document.getElementById("formsuabaiviet");
             formsuabaiviet.setAttribute('style', 'display: none');
             var themlayout = document.getElementById("theme-layout");
             $(".theme-layout").removeClass('active1');
            }
        });
    }
 </script>
