<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class APIAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create_account_for_mobile(Request $request){
        $data = $request->all();
        $account = new User();
        $account->first_name = $data['first_name'];
        $account->last_name = $data['last_name'];
        $account->email = $data['email'];
        $account->phone_number = $data['phone_number'];
        if($data['password'] == $data['confirm_password']){
            $account->password = $data['password'];
        }else{
            //TODO progess error password mismatched
        }
        $account->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $account->status = 1;
        $account->isAdmin = 0;
        $account->isSubAdmin = 0;
        $account->save();
        $success['token'] =  $account->createToken('MyApp')-> accessToken; 
        return response()->json(['success'=>$success,'data'=>$account]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    
    public function login(Request $request)
    {
     
        
        $taikhoan = $request->input('email');
        $matkhau = $request->input('matkhau');
        $nguoidung = User::where('email', $taikhoan)->where('password', $matkhau)->first();
        if($nguoidung!=null){
            $success['token'] =  $nguoidung->createToken('MyApp')-> accessToken; 
            $token =   $nguoidung->createToken('MyApp')-> plainTextToken;
            return response()->json(['token'=>$token, 'message'=>'Đăng nhập thành công', 'data'=>$nguoidung, 'success'=>$success['token']]);
        } else {
            return response()->json(['error'=>'Đăng nhập không thành công']);
        }
       
    }
}