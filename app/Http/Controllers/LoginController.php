<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
Use App\models\User;
Use App\models\Post;
Use App\models\Social;
// use Laravel\Socialite\Facades\Socialite;
use App\Services\AccountService;
use Socialite;
use Illuminate\Support\Str;



class LoginController extends Controller
{
    public function getLogin()
    {
        return view('dangnhap-dangki');
    }

    public function logingoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callback_google(){
        $user = Socialite::driver('google')->stateless()->user();
        // dd($user->user['sub']);
        $authUser = $this->findOrCreateUser($user,'google');
        
        $account = User::Where('id',$authUser->user)->first();
        if($account){
            Session()->put('LoggedUser', $account->id);
            Auth::login($account);
            return redirect()->route('nguoidungs.canhan');
        }
        else{
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra khi đăng nhập, vui lòng thử lại sau !']);
        }
    } 

    public function findOrCreateUser($user,$provider){
        
        $authUser = Social::Where('provider_user_id',$user->id)->first();
        
        if($authUser){
            // dd($authUser);
            return $authUser;
        }
        
        $checkUser = User::Where('email',$user->email)->first();
        
        if(!$checkUser){
            $checkUser = User::create([
                'first_name'=>$user->user['given_name'],
                'last_name'=>$user->user['family_name'],
                'email'=>$user->email,
                'password'=>'',
                'avatar'=>'no_avatar.png',
                'phone_number'=>'',
                'isAdmin'=>0,
                'isSubAdmin'=>0,
                'status'=>1
            ]);
            $users = new Social(['provider_user_id'=>$user->id,
            'provider'=>strtoupper($provider),'user'=>$checkUser->id]);
            $users->user()->associate($checkUser);
            $users->save();
            return $users;
            
        

        }
    }

    public function postDangNhap(Request $request)
    {
        
        $this->validate($request,
            [
                'email' => 'required|email|max:255|regex:/^[a-zA-Z0-9_]+@caothang.edu.vn$/',
                'matkhau' => 'required|min:8'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.regex' => 'Email phải có dạng: caothang.edu.vn',
                'matkhau.required' => 'Vui lòng nhập mật khẩu',
                'matkhau.min' => 'Mật khẩu ít nhất 8 ký tự',
            ]);
           
        // if (Auth::attempt(['email' => $request->taikhoan, 'password' => $request->matkhau])) {
        //     return redirect()->route('canhan');
        // } else {
        //     return redirect()->back()->with(['message' => 'Sai tên đăng nhập hoặc mật khẩu']);
        // }
        
        $nguoidung = User::where('email', $request->email)->first();
        // dd($nguoidung,$request->matkhau,Hash::check($request->matkhau,$nguoidung->password));
        if($nguoidung!=null){
            if($nguoidung->status == 1){
                if(Hash::check($request->matkhau,$nguoidung->password)){
                    $request->session()->regenerate();
                    Auth::login($nguoidung);
                    $request->session()->put('LoggedUser', $nguoidung->id);
                    
                    return redirect()->route('newfeed');
                }
                else{
                    return redirect()->back()->WithErrors(['error' => 'Sai mật khẩu']);
                }
            }else{
                return redirect()->back()->withErrors(['error' => 'Tài khoản này đã bị khóa']);
            }
            
            
            
        } else {
            return redirect()->back()->withErrors(['error' => 'Địa chỉ email không tồn tại hoặc không phải email từ trường Cao đẳng kỹ thuật Cao Thắng']);
        }
    }

    public function dangxuat(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect('canhan');
    }

    // public function handleProviderCallback(SocialAccountService $service, $provider)
    // {
    //     $user = $service->createOrGetUser(Socialite::driver($provider));
    //     Auth::login($user);

    //     return redirect()->to('canhan');
    // }

    //đăng nhập bằng google
     public function login_goggle()
    {
      
        return Socialite::driver('google')->redirect('newfeed');

    }

     public static function emailValid($string) 
    { 
        if (preg_match ("/^[a-zA-Z0-9_]+@caothang.edu.vn$/", $string)) 
            return true; 
        return false;
    } 

    public function callback_goggle( Request $request)
    {
        $user = Socialite::driver('google')->stateless()->user();
        $checkEmail = $this->emailValid($user->email);
        if($checkEmail){
            $nguoidung = User::where('email', $user->email)->first();
        if($nguoidung!=null){
            Auth::login($nguoidung);
            $request->session()->put('LoggedUser', $nguoidung->id);
            return redirect()->route('newfeed');
        } else {
            $nguoidung = new User;
            $nguoidung->first_name = $user->user['given_name'];
            $nguoidung->last_name = $user->user['family_name'];
            $nguoidung->email = $user->email;
            $nguoidung->avatar ='no_avatar.png';
            $nguoidung->cover_image = 'no_cover_image.jpg';
            $nguoidung->isAdmin = 0;
            $nguoidung->isSubAdmin = 0;
           
            $imageContent = file_get_contents($user->avatar);
            // $file_extension = $imageContent->getClientOriginalExtension();
            
            $image =Str::random(10).'.png';
            \Illuminate\Support\Facades\Storage::disk('public')->put($image, $imageContent);
           
            // $nguoidung->avatar = $file_name;
            $nguoidung->status = 1;
            //$nguoidung->password = Hash::make(str_random(8));
            $nguoidung->save();
            Auth::login($nguoidung);
            $request->session()->put('LoggedUser', $nguoidung->id);
            return redirect()->route('newfeed');
        }
        }
        else{
            return redirect()->route('login')->withErrors(['error'=>'Tài khoản không hợp lệ']);
        }
        
    }

    // public function timortaouser($uer, $provider){
    //     $nguoidung = User::where('email', $user->email)->first();
    //     if($nguoidung!=null){
    //         Auth::login($nguoidung);
    //         $request->session()->put('LoggedUser', $nguoidung->id);
    //         return redirect()->route('nguoidungs.canhan');
    //     } else {
    //         $nguoidung = new User;
    //         $nguoidung->name = $user->name;
    //         $nguoidung->email = $user->email;
    //         $nguoidung->password = Hash::make(str_random(8));
    //         $nguoidung->save();
    //         Auth::login($nguoidung);
    //         $request->session()->put('LoggedUser', $nguoidung->id);
    //         return redirect()->route('nguoidungs.canhan');
    //     }
    // }



}