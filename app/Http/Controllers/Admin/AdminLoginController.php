<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Use App\models\User;

class AdminLoginController extends Controller
{
    public function viewLoginPage(){
        return view('dangnhap');
    }

    public function loginAdmin(Request $request){
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];
        
        $account = User::where('email', $email)->first();
        // dd($data,$account,!empty($account));
        if(!empty($account)){
            if($account->status == 1){
                if(Hash::check($password, $account->password)){
                   if($account->isAdmin == 1){
                    Auth::login($account);
                    return redirect()->route('adminDashboard');
                   }
                   else{
                    return redirect()->back()->withErrors(['error' => 'Không có quyền truy cập vào trang này']);
                   }
                }
                else{
                    return redirect()->back()->withErrors(['error' => 'Sai mật khẩu']);
                }
            }
            else{
                return redirect()->back()->withErrors(['error' => 'Tài khoản đã bị khóa']);
            }
                
        }else{
            return redirect()->back()->withErrors(['error' => 'Tài khoản không tồn tại']);
        }

    }

    public function logoutAdmin(){
        Auth::logout();
        return redirect()->route('viewLoginPage');
    }
}
