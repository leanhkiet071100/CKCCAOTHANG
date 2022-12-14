<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\models\User;
use App\Models\friend;
use App\Models\Post;
use App\Models\likepost;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminAccountController extends Controller
{
    public function getInfoUser($id){
        $user = User::find($id);
        // dd($user);
        if($user->sex == null){
            $user->sex = "Chưa có thông tin";
           
        }
        else if($user->sex == 1){
            $user->sex = "Nam";
            
        }
        elseif($user->sex == 0){
            $user->sex = "Nữ";
        }
        $totalFriend = Friend::Where('id_user_target',$id)->where('status',1)->orWhere('id_user_preference',$id)->Where('status',1)->get()->count();
        $totalPost = Post::Where('id_user',$id)->get()->count();

        $totalLike = 0;
        $listPost = Post::Where('id_user',$id)->get();
        foreach($listPost as $post){
            if($id == $post->id_user){
                $like = likepost::Where('id_post',$post->id)->get()->count();
                $totalLike = $totalLike + $like;
            }
        }
        return view('admin.info_user')->with(['user'=>$user,'totalFriend'=>$totalFriend,'totalPost'=>$totalPost,'totalFriend'=>$totalFriend,'totalLike'=>$totalLike]);
    }

    public function getAccountUser( Request $request){
        //phân trang
        $page = $request->page;
        $limit = 5;
        $total = User::all()->count();
        $totalPage = ceil($total/$limit);
        $start = ($page - 1)*$limit;
        // $lstAccountUser = User::skip($start)->take($limit)->get();
        //panitor
        $lstAccountUser = User::skip($start)->take($limit)->get();
        $totalAccount = User::Where('isAdmin',0)->get()->count();
        $totalAccountActive = User::Where('isAdmin',0)->where('status',1)->get()->count();
        $totalAccountBlock = User::Where('isAdmin',0)->where('status',2)->get()->count();
        $totalAccountUnActive = User::Where('isAdmin',0)->where('status',0)->get()->count();
        return view('admin.taikhoan.dstaikhoan')->with(['lstAccountUser'=>$lstAccountUser,
                                         'totalAccount'=>$totalAccount, 
                                        'totalAccountActive'=>$totalAccountActive,
                                        'totalAccountUnActive'=>$totalAccountUnActive,
                                       'totalAccountBlock'=>$totalAccountBlock,]);

    }
}