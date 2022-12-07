<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\media_file_upload;
use App\Models\friend;
use Illuminate\Support\Facades\Auth;

class MediaFilePostController extends Controller
{
    //* check button addfriend + route addfriend
    public function checkIsFriend($id){
        $check_relation = 0;
        if(Auth::user()->id == $id){
             return $check_relation = 1;
        }
        
        $relation = Friend::Where('id_user_target', Auth::user()->id)->Where('id_user_preference',$id)->first();
        
        $relation_preference = Friend::Where('id_user_preference', Auth::user()->id)->Where('id_user_target',$id)->first();
        if(!empty($relation)||!empty($relation_preference)){
            return $check_relation = 2;
        }
        else return $check_relation;
    }


    public function get_photos_post($id){

		$listPhotos = Post::Where('id_user',$id)->get();

		$account = User::Where('id',$id)->first();
		$lstFriend = Friend::Where('id_user_target',$id)->where('status',1)->orWhere('id_user_preference',$id)->Where('status',1)->get();
		$check_relation = $this->checkIsFriend($id);
		if($account->avatar == null){
            $account->avatar = 'no_avatar.png';
        }
		return view('canhan.photos')->with('listPhotos',$listPhotos)->with('account',$account)->with('lstFriend',$lstFriend)->with('check_relation',$check_relation);
	}
}
