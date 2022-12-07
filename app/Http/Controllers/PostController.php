<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\media_file_upload;
use App\Models\friend;
use App\Models\Post;
use App\Models\comment;
use App\Models\likepost;
use App\models\media_upload_comment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	public function checkIsFriend($id){
        $check_relation = 0;
        if(Auth::user()->id == $id){
             return $check_relation = 1;
        }
        
        $relation = Friend::Where('id_user_target', Session()->get('LoggedUser'))->Where('id_user_preference',$id)->first();
        
        $relation_preference = Friend::Where('id_user_preference', Session()->get('LoggedUser'))->Where('id_user_target',$id)->first();
        if(!empty($relation)||!empty($relation_preference)){
            return $check_relation = 2;
        }
        else return $check_relation;
    }

	public function getListFrien($id){
		$listFriend = Friend::Where('id_user_target',$id)->get();
		$listFriend_ = Friend::Where('id_user_preference',$id)->get();
		// dd($listFriend,$listFriend_);
		return (['listFriend'=>$listFriend, 'listFriend_'=>$listFriend_]);
	}

	public function get_post(){
        //truy vấn theo user hoặc theo bạn bè

		$id =  Auth::user()->id;
		
		$account = User::Where('id',$id)->first();  
		if($account->avatar == null){
            $account->avatar = 'no_avatar.png';
        }
		$listPost = Post::All()->where('status',1)->sortByDesc('created_at');
		$list_media = media_file_upload::where('status',1)->get();
        foreach($list_media as $media){
            $media = Storage::url($media->media_file_name);
        }
		
		$lstFriend = Friend::Where('id_user_target',$id)->where('status',1)->orWhere('id_user_preference',$id)->Where('status',1)->get();
		
		// dd($id,$lstFriend);
		
		// $listFriend = Friend::ALL()->Where('id_user_preference',$id);
		
		foreach($listPost as $item){
            if($item->view_mode == 1){
                $item->view_mode = 'Công Khai';
            }else{
                $item->view_mode = 'Riêng Tư';
            }
            
        }
		// dd($listPost);
		// dd($listFriend,$listFriend_);
		return view('bangtin.bangtinmoi')
		->with('account',$account)
		->with('listPost',$listPost)
		->with('list_media',$list_media)
		->with('lstFriend',$lstFriend);
	}

    public function create_post(Request $request){
        $data = $request->all();
        $post = new Post();
        $post->id_user = Auth::user()->id;
        $post->content_post = $data['content_post'];
        $post->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $post->view_mode = 1;
        $post->id_post_parent = null;
        $post->updated_at = null;
        $post->status = 1;
        $post->save();
        // kiểm tra có files sẽ xử lý
		if($request->hasFile('image_post')) {
			$allowedfileExtension=['jpg','png', 'jpeg', 'PNG', 'JPG', 'JPEG'];
			$files = $request->file('image_post');
            // flag xem có thực hiện lưu DB không. Mặc định là có
			$exe_flg = true;
			// kiểm tra tất cả các files xem có đuôi mở rộng đúng không
			foreach($files as $file) {
				$extension = $file->getClientOriginalExtension();
				$check=in_array($extension,$allowedfileExtension);

				if(!$check) {
                    // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
					$exe_flg = false;
					break;
				}
			} 
			// nếu không có file nào vi phạm validate thì tiến hành lưu DB
			if($exe_flg) {
                // duyệt từng ảnh và thực hiện lưu

				foreach ($request->image_post as $image_post) {
					$file_name = time().Str::random(10).'.'.$image_post->getClientOriginalExtension();
					$imagePath = $image_post->move('image_post', $file_name);
					media_file_upload::create([
						'id_post' => $post->id,
						'media_file_name' => $file_name,
						'status'=> 1
					]);
				}
				
			} else {
				echo "Falied to upload. Only accept jpg, png photos.";
			}
		}

        
        return redirect()->route('newfeed');
        
    }

    public function get_list_post(){
        $id = Auth::user()->id;
        $listPost = Post::Where('id_user',$id)->join('users','users.id','=','posts.id_user')->get();
        return view('canhan.baivietcanhan')->with('listPost',$listPost);
    }

	public function post_comment_post(Request $request ){
            $idpost = $request->idpost;
            $id_user = Auth::user()->id;
            $noidungbinhluan = $request->noidungbinhluan;
            $created_at =  Carbon::now('Asia/Bangkok');       
            $status = 1;
            $id_comment_parent = null;
            $hinhbinhluan= $request->file('hinhbinhluan');
            comment::create([
                'id_post' => $idpost,
                'id_user' => $id_user,
                'content_comment' => $noidungbinhluan,
                'created_at' => $created_at,
                'status' => 1,
                'id_comment_parnet' => null
            ]);
            
            if($hinhbinhluan != null){
                foreach($hinhbinhluan as $hinhbinhluan){
                    $file_name = time().Str::random(10).'.'.$hinhbinhluan->getClientOriginalExtension();
                    $id_comment =  comment::where('id_post',$idpost)->orderBy('id','desc')->first()->id;
                    $imagePath = $hinhbinhluan->move(public_path('image_comment/'.$idpost.'/'.$id_comment.'/'), $file_name);
                    $ten_file = $idpost.'/'.$id_comment.'/'.$file_name;
                    media_upload_comment::create([
                        'id_comment' => $id_comment,
                        'media_file_name' => $ten_file,
                        'status'=> 1
                    ]);
             
                }
            }
	}

		public function load_comment_post( Request $request ){
		$id_post = $request->idpost;
    
        $listComment = comment::join('users','users.id','=','comments.id_user')->select('comments.*', 'users.first_name', 'users.last_name','users.avatar')->where('id_post',$id_post)->where('id_comment_parent', null )->orderby('comments.created_at','desc')->get();
		$listComment2 = comment::Where('id_post',$id_post)->select('comments.*', 'users.first_name', 'users.last_name','users.avatar')->join('users','users.id','=','comments.id_user')->where('id_comment_parent', '!=', null)->get();
        //truy vấn hình bình luận của bài viết
        $hinhbinhluan = comment::join('posts','posts.id','=', 'comments.id_post')
                        ->join('media_upload_comments', 'media_upload_comments.id_comment', '=', 'comments.id')
                        ->select( 'media_upload_comments.media_file_name', 'media_upload_comments.id_comment')
                        ->where('id_post',$id_post)->get();
        
        //so sánh user
        $user = User::find(session()->get('LoggedUser')); ;

		$output = '';
		foreach($listComment as $item){
		$output.= '  <div class="coment-area">
                            <ul class="we-comet">
                                <li>
                                    <div class="comet-avatar">
                                        <img src="'.url('avatar/').'/'.$item->avatar.'" alt="">
                                    </div>
                                    <div class="we-comment">
                                        <div class="coment-head">
                                            <h5><a href="time-line.html" title="">'.$item->first_name.' '.$item->last_name.'</a></h5>
                                            <span>1 year ago</span>
                                            <button class="we-reply" title="trả lời" name="we-reply'.$item->id.'" id="we-reply'.$item->id.'" onclick="hienthitraloibinhluan('.$item->id.')">
                                                <i class="fa fa-reply"></i>
                                            </button>
                                        </div>
                                        <p>'.$item->content_comment .'</p>';
        $output.='                         <div class="hinhanhbinhluan">';
                            foreach($hinhbinhluan as $itemhinhbinhluan){
                                if($itemhinhbinhluan->id_comment == $item->id){
    
        $output.='                <img src="'.url('image_comment/').'/'.$itemhinhbinhluan->media_file_name.'" alt="" class="imgbinhluan">';
                                               }
                            }
        $output.='                         </div>
                                    </div>';
                            
                    foreach($listComment2 as $item2){
                        if($item2->id_comment_parent == $item->id){          
        $output.='                  <ul>
                                        <li>
                                            <div class="comet-avatar">
                                                <img src="'.url('avatar/').'/'.$item2->avatar.'" alt="">
                                            </div>
                                            <div class="we-comment">
                                                <div class="coment-head">
                                                    <h5><a href="time-line.html" title="">'.$item2->first_name.' '.$item2->last_name.'</a></h5>
                                                    <span>1 month ago</span>
                                                  
                                                </div>
                                                <p>'.$item2->content_comment .'</p>';
        $output.='                         <div class="hinhanhbinhluan">';
                            foreach($hinhbinhluan as $itemhinhbinhluan){
                                if($itemhinhbinhluan->id_comment == $item2->id){
    
        $output.='                <img src="'.url('image_comment/').'/'.$itemhinhbinhluan->media_file_name.'" alt="" class="imgbinhluan">';
                                               }
                            }
        $output.='                         </div>
                                    </div>
                                                  
                                        </li>
                                       
                                    </ul> ';
                        }
                    }
        $output.=' <div class="reply-comment" name="reply-comment'.$item->id.'" id="reply-comment'.$item->id.'">';
        $output.='  <hr style="width:100%;text-align:left;margin-left:0"> ';    
        $output.='  <div class="post-comment avatar-binhluan"> ';
        $output.='  <div class="comet-avatar">
                        <img src="'.url('avatar/').'/'.$user->avatar.'" alt=""  class="avatar-boder-radius-comment">
                    </div>';
        $output.=' <div class="post-comt-box">
                        <form> 
                            <input type="hidden" name="idpost" id="idpost" value="'.$id_post.'">
                            <textarea placeholder="Viết bình luận..." id="repnoidungbinhluan'.$item->id.'" name="repnoidungbinhluan'.$item->id.'" class="noidungbinhluan"></textarea>
                                <div class="add-smiles">
                                    <span class="em em-expressionless" title="add icon" name="add-icon'.$item->id.'"  onclick="hienicontextmenu('.$item->id.')"></span>
                                            <div class="themhinh">
                                                <i class="fa fa-image"></i>
                                                    <label class="fileContainer">
                                                        <input id="uploadanhpostrepcomment'.$item->id.'" class="btn btn-primary" type="file" name="image_post_comment[]" multiple="multiple" onchange="ImagesFileAsURLREPComment('.$item->id.')"> <br />
                                                    </label>
                                            </div>
                                            <div class="guibinhluan">
                                                <button type="button" class="btnbinhluan btnbinhluan'.$item->id.'"  id="btnbinhluan'.$item->id.'" name="btnbinhluan'.$item->id.'" onclick="repcomment('.$id_post.','.$item->id.')">
                                                    <i class="fa fa-paper-plane"></i>
                                                </button>
                                            </div>
                                </div>
                                <div class="smiles-bunch" id="smiles-bunch'.$item->id.'">
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
                    </div>';

        $output.= '</div>';
        $output.='<div class="repanhbinhluan anhbinhluan" id="repanhbinhluan'.$item->id.'"> </div>';
        $output.='  <hr style="width:100%;text-align:left;margin-left:0"> ';   
        $output.='</div>';
        $output.='          </li>
                            </ul>
                        </div>';
                 
		}
		return $output;

	}

    public function like_post(Request $request){
        $id_user = Auth::user()->id;
        $id_post = $request->idpost;
        $like = likepost::where('id_user', $id_user)->where('id_post', $id_post)->first();
        if($like == null){
            likepost::create([
                'id_user' => $id_user,
                'id_post' => $id_post,
                'like' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $like_post = likepost::where('id_post', $id_post)->count();
            return $like_post;
            //return response()->json(['success'=>'Đã thích bài viết', 'like_post'=>$like_post]);
        }
        else{
            $like->delete();
            $like_post = likepost::where('id_post', $id_post)->count();
            return $like_post;
           // return response()->json(['success'=>'Bỏ thích bài viết', 'like_post'=>$like_post]);
        }
    }

    public function repcomment(Request $request){
        $noidungbinhluan = $request->noidungbinhluan;
		$id_post = $request->idpost;
		$id_user = session()->get('LoggedUser');
		$created_at = Carbon::now('Asia/Ho_Chi_Minh');
		$status = 1;
		$id_comment_parent = $request->idcomment;

        $hinhbinhluan= $request->file('hinhbinhluan');
        
      if($hinhbinhluan == null && $noidungbinhluan == null){
            return redirect()->back()->with('error','Bạn chưa nhập bình luận');
        }else{
        
            comment::create([
                'id_post' => $id_post,
                'id_user' => $id_user,
                'content_comment' => $noidungbinhluan,
                'created_at' => $created_at,
                'status' => $status,
                'id_comment_parent' => $id_comment_parent
            ]);
        }
            if($hinhbinhluan != null){
                foreach($hinhbinhluan as $hinhbinhluan){
                    $file_name = time().Str::random(10).'.'.$hinhbinhluan->getClientOriginalExtension();
                    $id_comment = comment::where('id_post',$id_post)->where('id_user',$id_user)->orderBy('id','desc')->first()->id;
                    $imagePath = $hinhbinhluan->move(public_path('image_comment/'.$id_post.'/'.$id_comment.'/'), $file_name);
                    $ten_file = $id_post.'/'.$id_comment.'/'.$file_name;
                    media_upload_comment::create([
                        'id_comment' => $id_comment,
                        'media_file_name' => $ten_file,
                        'status'=> 1
                    ]);
             
                }
            }
        
            return $noidungbinhluan;


    }

    public function load_like_post(Request $request){
        $id_post = $request->idpost;
        $like_post = likepost::where('id_post', $id_post)->count();
        return $like_post;
      
    }

    public function load_socomment_post(Request $request){
        $id_post = $request->idpost;
        $comment_post = comment::where('id_post', $id_post)->count();
        return $comment_post;
    }

    public function kiemtralikebaiviet(Request $request){
        $id_user = session()->get('LoggedUser');
        $id_post = $request->idpost;
        $like = likepost::where('id_user', $id_user)->where('id_post', $id_post)->first();
        if($like == null){
            return 0;
        }
        else{
            return 1;
        }
    }

    public function xoabaiviet(Request $request){
        $id_post = $request->idpost;
        $post = post::find($id_post);
        //$post->delete();
        $post->status = 0;
        $post->save();
    }

    // public function suabaiviet(Request $request){
    //     $id_post = $request->idpost;
    //     $post = post::find($id_post);
    //     $post->status = 1;
    //     $post->save();
    // }

    public function suabaiviet_show(Request $request){
        $id_post = $request->idpost;
        $id_user = session()->get('LoggedUser');
       
        // $post = post::join('id_user') where('id',$id_post)->first();
        //xuất post và người dùng
        $post = post::join('users','posts.id_user','=','users.id')
                ->select('posts.id','posts.id_user','posts.content_post','posts.created_at','posts.status','posts.view_mode','posts.id_post_parent','users.first_name','users.last_name','users.avatar')
                ->where('posts.id',$id_post)
                ->where('posts.status',1)->first();
        $hinhbaiviet = media_file_upload::where('id_post',$id_post)->where('status', 1)->get();


        $outsuabaiviet = '';
        $outsuabaiviet.= '      <div class="central-meta item">
        <div class="user-post">
            <div class="friend-info">
                <div class="ttsuabaiviet">
                    <h3 class="tt">Sửa bài viết</h3>
                    <button class="nuthuysuabaiviet" id="nuthuysuabaiviet" onclick="huysuabaiviet()"><i class="fa fa-remove"></i></button>
                </div>
                <figure class="anhdaidien">
                    <img src="'.url('avatar/').'/'.$post->avatar.'" alt="">
                </figure>
                <div class="friend-name">
                    <ins id="hoten" name="hoten"><a href="time-line.html" title=""></a>'.$post->first_name.' '.$post->last_name.'</ins>
                    <span id="ngaydang" name="ngaydang">published: '.$post->create_at.'</span>
                </div>
                <div class="description textsuabaiviet" id="noidungbaiviet">
                      
                        <textarea name="content_post" id="content_post" rows="2" placeholder="'.$post->last_name.' ơi, bạn đang nghĩ gì thế ?">'.$post->content_post.'</textarea>
                        
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
                                    <button  onclick="suabaiviet('.$post->id.')">Lưu</button>
                                    
                                </li>
                            </ul>
                        </div>
    
                        <div class="preview-upload xemtruochinhanhsuabaiviet" id="anhpost">';
                    foreach($hinhbaiviet as $hinhbaiviet){
    $outsuabaiviet.= '<img src="'.url('image_post/').'/'.$hinhbaiviet->media_file_name.'" alt="">';
                    }

    $outsuabaiviet.='   </div>
                   
                </div>
            </div>
        </div>
    </div>';
        
         return $outsuabaiviet;
       
    }

    public function suabaiviet(Request $request){
        $id_post = $request->idpost;
        $id_user = session()->get('LoggedUser');
        $content_post = $request->content;
         $hinh  = $request->file('hinhanh');
        $post = post::find($id_post);
        $post->content_post = $content_post;
           
        $mediaile = media_file_upload::where('id_post',$id_post)->get();
        if($hinh != null){
           
                foreach($mediaile as $media){
                    $media->status = 0;
                    $media->save();
                }
            foreach ( $hinh as $item) {
				$file_name = time().Str::random(10).'.'.$item->getClientOriginalExtension();
				$imagePath = $item->move('image_post', $file_name);
                media_file_upload::create(
                    [
                        'id_post' => $id_post,
                        'media_file_name' => $file_name,
                        // 'media_file_type' => $image_post->getClientOriginalExtension(),
                        // 'media_file_size' => $image_post->getClientSize(),
                        // 'media_file_path' => $imagePath,
                        'status'  => 1,
                    ]
                );
            }
        }
        $post->save();
        $media = media_file_upload::where('id_post',$id_post)->where('status',1)->get();
        $socommet = comment::where('id_post',$id_post)->count();
        
        $solike = likepost::where('id_post',$id_post)->count();
        $kiemtralike = likepost::where('id_post',$id_post)->where('id_user',$id_user)->count();
        return view('bangtin.loadsuabaiviet', ['id_post' => $id_post, 'listPost' => $post, 'list_media' => $media, 'soanh' => 0, 'socommet' => $socommet, 'solike' => $solike, 'kiemtralike'=>$kiemtralike]);

    }

}
