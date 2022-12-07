   <div class="card-block themtocao" id="themtocao">
       <h4 class="sub-title">form tố cáo</h4>
       <form data-url="{{ route('create-report') }}" action="" enctype="multipart/form-data" method="post"
           id="taotocao">
           @csrf
           {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}


           <div class="form-group has-success row">
               <div class="col-sm-2">
                   <label class="col-form-label" for="inputSuccess1">Lí do tố cáo</label>
               </div>
               <div class="col-sm-10">
                   <input type="text" class="form-control form-control-success" id="noidungtocao"
                       name="noidungtocao">

               </div>
           </div>
           <button class="btn hor-grd btn-grd-success" type="submit">Thêm</button>
       </form>
   </div>
   <div id="suatocao" class="suatocao">

   </div>


   <script>
       $('#taotocao').submit(function(e) {
           e.preventDefault();
           $noidungtocao = $('#noidungtocao').val();
           var url = $(this).attr('data-url');
           var formData = new FormData();
           formData.append('noidungtocao', $noidungtocao);
           $.ajax({
               url: url,
               type: 'POST',
               data: formData,
               success: function(data) {
                   console.log(data);
                   $('#dstocao').html(data);
                   $('#noidungtocao').val('');
                   $('#noidungtocao').focus();

               },
               error: function(data) {

                   alert('Vui lòng nhập thông tin');
               },
               cache: false,
               contentType: false,
               processData: false
           });
       })

       function suaformtocaotao(id) {
           var nen = document.getElementById('pcoded-main-container');
           nen.classList.add('theme-dark');
           var suatocao = document.getElementById('suatocao');
           suatocao.setAttribute('style', 'display:block');
           formData = new FormData();
           formData.append('id', id);
           $.ajax({
               url: "{{ route('show-edit-report') }}",
               type: 'POST',
               data: formData,
               success: function(data) {
                   $('#suatocao').html(data);
               },
               error: function(data) {
                   alert('Vui lòng nhập thông tin');
               },
               cache: false,
               contentType: false,
               processData: false
           });
       }

       function xoaformtocaotao(id) {
           //hiện form thông báo
           var r = confirm("Bạn có chắc chắn muốn xóa  không?");
           if (r == true) {
               $.ajax({
                   url: "{{ route('delete-report') }}",
                   type: 'POST',
                   data: {
                       id: id
                   },
                   success: function(data) {
                       $('#dstocao').html(data);
                   }
               });
           } else {
               return false;
           }

       }

       function nuthuytocao() {
           var nen = document.getElementById('pcoded-main-container');
           nen.classList.remove('theme-dark');
           var suatocao = document.getElementById('suatocao');
           suatocao.setAttribute('style', 'display:none');
           console.log('nuthuy');
       }

       function suatocao(id) {
           var noidungtocao = $('#noidungtocao' + id).val();
           var formData = new FormData();
           formData.append('id', id);
           formData.append('noidungtocao', noidungtocao);
           $.ajax({
               url: "{{ route('edit-report') }}",
               type: 'POST',
               data: formData,
               success: function(data) {
                   $('#dstocao').html(data);
                   nuthuytocao();
               },
               error: function(data) {
                   alert('Vui lòng nhập thông tin');
               },
               cache: false,
               contentType: false,
               processData: false
           });
       }

       $('#formsuatocao').submit(function(e) {
           e.preventDefault();
           var id = $('#idtocao').val();
           var noidungtocao = $('#noidungtocao' + id).val();
           console.log(url);
           console.log(id);
           console.log(noidungtocao);
           //    var formData = new FormData();
           //    formData.append('id', id);
           //    formData.append('noidungtocao', noidungtocao);
           //    $.ajax({
           //        url: url,
           //        type: 'POST',
           //        data: formData,
           //        success: function(data) {
           //            $('#dstocao').html(data);
           //            nuthuytocao();
           //        },
           //        error: function(data) {
           //            alert('Vui lòng nhập thông tin');
           //        },
           //        cache: false,
           //        contentType: false,
           //        processData: false
           //    })
       });
       //check-status
       function checkstatus(id) {
              var formData = new FormData();
              formData.append('id', id);
              $.ajax({
                url: "{{ route('check-status') }}",
                type: 'POST',
                data: formData,
                success: function(data) {
                     $('#dstocao').html(data);
                },
                error: function(data) {
                     alert('Vui lòng nhập thông tin');
                },
                cache: false,
                contentType: false,
                processData: false
              });

       }

        $('#check-status').click(function() {
            console.log('check-status');
        });

      
   </script>
