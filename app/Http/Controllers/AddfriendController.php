<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\friend;
use App\Models\User;
use DB;

class AddfriendController extends Controller
{

    //* check button addfriend + route addfriend
    public function checkIsFriend($id){
        $check_relation = 0;
        if(Session()->get('LoggedUser') == $id){
             return $check_relation = 1;
        }
        
        $relation = Friend::Where('id_user_target', Session()->get('LoggedUser'))->Where('id_user_preference',$id)->first();
        
        $relation_preference = Friend::Where('id_user_preference', Session()->get('LoggedUser'))->Where('id_user_target',$id)->first();
        if(!empty($relation)||!empty($relation_preference)){
            return $check_relation = 2;
        }
        else return $check_relation;
    }

    public function requestAddFriend($id){
        $idUserTarget = Auth::user()->id;
        $requestAddfriend = new Friend();
        $requestAddfriend->id_user_target = $idUserTarget;
        $requestAddfriend->id_user_preference = $id;
        $requestAddfriend->status = 0;
        $requestAddfriend->save();
        return redirect()->route('profile-user',['id'=>$id]);
    }    

    public function get_friendlist($id){
        
        $listFriend = Friend::Where('id_user_target',$id)->where('status',1)->get();
		$listFriend_ = Friend::Where('id_user_preference',$id)->where('status',1)->get();
        $requestAddfriend = Friend::Where('id_user_preference',Session()->get('LoggedUser'))->Where('status',0)->get();
        $lstFriend = Friend::Where('id_user_target',$id)->where('status',1)->orWhere('id_user_preference',$id)->Where('status',1)->get();
        // dd($lstFriend);
        $account = User::Where('id',$id)->first();
        $check_relation = $this->checkIsFriend($id);
        $countfriend = count($listFriend);
        $countFriend_ = count($listFriend_);
        $totalFriend = $countfriend + $countFriend_;
        // dd($totalFriend);
        $totalrequestAddfriend = count($requestAddfriend);
        
        
        
        
        return view('canhan.friendlist')
        ->with('listFriend',$listFriend)
        ->with('account',$account)
        ->with('totalFriend',$totalFriend)
        ->with('requestAddfriend',$requestAddfriend)
        ->with('totalrequestAddfriend',$totalrequestAddfriend)
        ->with('check_relation',$check_relation)
        ->with('lstFriend',$lstFriend);
    }

    public function get_friendlist_shortcut($id){
        
        $listFriend = Friend::Where('id_user_target',$id)->where('status',1)->get();
		$listFriend_ = Friend::Where('id_user_preference',$id)->where('status',1)->get();
        $requestAddfriend = Friend::Where('id_user_preference',Session()->get('LoggedUser'))->Where('status',0)->get();
        $lstFriend = Friend::Where('id_user_target',$id)->where('status',1)->orWhere('id_user_preference',$id)->Where('status',1)->get();
        // dd($lstFriend);
        $account = User::Where('id',$id)->first();
        $check_relation = $this->checkIsFriend($id);
        $countfriend = count($listFriend);
        $countFriend_ = count($listFriend_);
        $totalFriend = $countfriend + $countFriend_;
        // dd($totalFriend);
        $totalrequestAddfriend = count($requestAddfriend);
        
        
        
        
        return view('layouts.friendlist')
        ->with('listFriend',$listFriend)
        ->with('account',$account)
        ->with('totalFriend',$totalFriend)
        ->with('requestAddfriend',$requestAddfriend)
        ->with('totalrequestAddfriend',$totalrequestAddfriend)
        ->with('check_relation',$check_relation)
        ->with('lstFriend',$lstFriend);
    }


    public function acceptRequestAddfriend($id){
        $idUserPreference = Session()->get('LoggedUser');
        $accept = Friend::Where('id_user_target',$id)->Where('id_user_preference',$idUserPreference)->Update(['status' => 1]);
        return redirect()->back();

    }

    public function unFriend($id){
        $searchFriend = Friend::Where('id_user_target',Session()->get('LoggedUser'))->where('id_user_preference',$id)->first();
        
        if(!empty($searchFriend)){
            $unfriend = Friend::Where('id_user_target',Session()->get('LoggedUser'))->where('id_user_preference',$id)->delete();
        }
        else{
            $searchFriend = Friend::Where('id_user_target',$id)->Where('id_user_preference',Session()->get('LoggedUser'))->delete();
        }
        return redirect()->back();

    }

    

    


}
