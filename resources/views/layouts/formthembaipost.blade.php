 <div class="central-meta item">
     <div class="new-postbox">
         <figure>
             <img src="{{ URL('avatar/') }}/{{ $account->avatar }}" alt="" class="avatar-create-post">
         </figure>
         <div class="newpst-input">
             <form method="post" action="{{ route('create-post') }}" enctype="multipart/form-data">
                 @csrf
                 <textarea name="content_post" rows="2" placeholder="{{ $account->last_name }} ơi, bạn đang nghĩ gì thế ?"></textarea>
                 
                 <div class="attachments">
                     <ul>
                         <li>
                             <i class="fa fa-paper-plane"></i>
                             <label class="fileContainer">
                                 <input type="file">
                             </label>

                         </li>
                         <li>
                             <i class="fa fa-music"></i>
                             <label class="fileContainer">
                                 <input type="file">
                             </label>

                         </li>
                         <li>
                             <i class="fa fa-image"></i>
                             <label class="fileContainer">
                                 <input id="uploadanhpost" class="btn btn-primary" type="file" name="image_post[]"
                                     multiple="multiple" onchange="ImagesFileAsURL(event)"> <br />
                             </label>
                         </li>
                         <li>
                             <i class="fa fa-video-camera"></i>
                             <label class="fileContainer">
                                 <input type="file">
                             </label>
                         </li>
                         <li>
                             <i class="fa fa-camera"></i>
                             <label class="fileContainer">
                                 <input type="file">
                             </label>
                         </li>
                         <li>
                             <button type="submit">Đăng</button>
                         </li>
                     </ul>
                 </div>
                 <div class="preview-upload" id="anhpost">
                     {{-- <img id='output' /> --}}

                 </div>
                 @if ($errors->has('image_post'))
                     <div style="color: red">
                         {{ $errors->first('image_post') }}
                     </div>
                 @endif
             </form>
         </div>
     </div>
 </div>
