<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\media_file_upload;
use App\Models\friend;
use App\Http\Controllers\Extension\check;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
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

    public function anhdaidien(User $user)
    {
        if(storage::disk('public')->exists($user->avatar)) 
        {
           //$user->avatar = asset('storage/'.$user->avatar);
              $user->avatar = Storage::url($user->avatar);
        }
        else
        {
           // $user->avatar = asset('storage/avatar/no-image.png'); // http://127.0.0.1:8000/storage/avatar/no-image.png
           $user->avatar = 'storage/avatar/no-image.png';
        }
    }

    protected function fixImageBia(User $user)
    {
        if(Storage::disk('public')->exists($user->cover_image)){
            $user->cover_iamge = Storage::url($user->cover_image);
        }else {
            $user->cover = 'cover_image/no_cover_image.jpg';
        }
    }

    public function change_coverimage(Request $request){
        $user = User::find(Auth::user()->id); 
        //xuất ngày
        $date = Carbon::now();
        $date = $date->format('dmY');

        // dd($request->capnhatanhbia);
        if($request->hasFile('capnhatanhbia')) {
            // $file_name = time().Str::random(10).'.'.$request->capnhatanhbia->getClientOriginalExtension(); // xuất tên file 
            // $file_name = time().Str::random(10).'.'.$request->capnhatanhbia->extension(); // xuất file (png)
            $id = Auth::user()->id;
            $file_name = time().$date.$id.$request->capnhatanhbia->getClientoriginalName();
            $user = User::Where('id',$id)->update(['cover_image' => $file_name]);
		    $imagePath = $request->capnhatanhbia->move('cover_image', $file_name);
      
		}
        return redirect()->back();
    }

    public function fixImageAvatar(User $user)
    {
        if(storage::disk('public')->exists($user->avatar)) 
        {
           //$user->avatar = asset('storage/'.$user->avatar);
              $user->avatar = Storage::url($user->avatar);
        }
        else
        {
            $user->avatar = 'storage/avatar/no-image.png';
        }
    }


    public function change_avatar(Request $request){
        $user = User::find(Auth::user()->id); 
        $date = Carbon::now();
        $date = $date->format('dmY');
        // dd($request->capnhatanhbia);
        if($request->hasFile('avatar')) {
            // $file_name = time().Str::random(10).'.'.$request->capnhatanhbia->getClientOriginalExtension(); // xuất tên file 
            // $file_name = time().Str::random(10).'.'.$request->capnhatanhbia->extension(); // xuất file (png)
            $id = session()->get('LoggedUser');
            $file_name = time().$date.$id.$request->avatar->getClientoriginalName();
         
            $user = User::Where('id',$id)->update(['avatar' => $id.'/'.$file_name]);
		    //$imagePath = $request->capnhatanhbia->move('cover_image', $file_name);
            // chuyển sang file public
            $imagePath = $request->avatar->move(public_path('avatar/'.$id.'/'), $file_name);
		}
        return redirect()->back();
    }


    public function getthaydoimatkhau(){
        $id = Auth::user()->id;
        $lstFriend = Friend::Where('id_user_target',$id)->orWhere('id_user_preference',$id)->where('status',1)->get();
        $account = User::Where('id',$id)->first();
        $check_relation = $this->checkIsFriend($id);
        return view('canhan.thaydoimatkhau')->with('account',$account)->with('check_relation',$check_relation)->with('lstFriend',$lstFriend);
    }
    
    // Thay đổi thông tin cá nhân

    public function getthaydoithongtincanhan(){
        $id = Auth::user()->id;
        $lstFriend = Friend::Where('id_user_target',$id)->orWhere('id_user_preference',$id)->where('status',1)->get();
        $account = User::Where('id',$id)->first();    
        $check_relation = $this->checkIsFriend($id);
        return view('canhan.thaydoithongtincanhan')->with('account',$account)->with('check_relation',$check_relation)->with('lstFriend',$lstFriend);
    }

    public function postthaydoithongtincanhan(Request $request){
        $this->validate($request,
            [
                'ho' => 'required',
                'ten' => 'required',
                'sodienthoai' => 'required|numeric',  
            ],
            [
                'ho.required' => 'Họ không được để trống',
                'ten.required' => 'Tên không được để trống',
                'sodienthoai.required' => 'Số điện thoại không được để trống',
                'sodienthoai.numeric' => 'Số điện thoại phải là số',
              
            ]);
       
        $user = User::find(Auth::user()->id);
   
        $user->first_name = $request->ho;
        $user->last_name = $request->ten;
        $user->phone_number = $request->sodienthoai;
        $user->birth_date = $request->ngaysinh;
        $user->sex = $request->gioitinh;
        $user->save();
        return redirect()->route('taikhoan.getthaydoithongtincanhan')->with('thongbao', 'Thay đổi thông tin cá nhân thành công');
    }

    public function getcanhan(){
        $id = Auth::user()->id;
        $account = User::Where('id',$id)->first();
        // dd($account);
        
        $id = Auth::user()->id;
        $listPost = Post::All()->where('id_user',$id)->sortByDesc('created_at');
  
        // dd($_listPost);
        $list_media = media_file_upload::All();
        foreach($list_media as $media){
            $media = Storage::url($media->media_file_name);
        }
        $lstFriend = Friend::Where('id_user_target',$id)->orWhere('id_user_preference',$id)->where('status',1)->get();
        $listUser = User::All();
        foreach($listUser as $user){
            if($user->avatar == null){
                $user->avatar ='no_avatar.png';
            }
        }
        
        foreach($listPost as $item){
            if($item->view_mode == 1){
                $item->view_mode = 'Công Khai';
            }else{
                $item->view_mode = 'Chỉ Mình Tôi';
            }
            
        }
        $check_relation = $this->checkIsFriend($id);
        
        return view('canhan.baivietcanhan')->with('account',$account)->with('listPost',$listPost)->with('listUser',$listUser)->with('list_media',$list_media)->with('lstFriend',$lstFriend)->with('check_relation',$check_relation);
    }

    

    //load view signup
    public function signup(){
        return view ('user.signup_page');
    }

    public function create_account(Request $request){
        //TODO validate signup (.blade.php)
        //! bug: notification error list by validate 
        //! bug: notReponse when timeout sendEmail
        $this->validate($request,
        [
            'email' => 'required|email|max:255|regex:/^[a-zA-Z0-9_]+@caothang.edu.vn$/|unique:users,email',
            'password' => 'required|min:8',
            'phone_number'=> 'required|numeric|digits:10',
            'first_name' => 'required',
            'last_name' => 'required',
            'confirm_password'=> 'required|same:password',
        ],
        [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'email.regex' => 'Email phải có dạng: @caothang.edu.vn',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 8 ký tự',
            'phone_number.required'=>'Vui lòng nhập số điện thoại',
            'phone_number.numberic'=> 'Số điện thoại không được khác các số 0 - 9',
            'phone_number.digits'=>'Số điện thoại phải có 10 chữ số',
            'first_name.required' => 'Vui lòng nhập họ',
            'last_name.required' => 'Vui lòng nhập tên',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu',
            'confirm_password.same' => 'Mật khẩu không trùng khớp',
        ]);

        //create account
        $data = $request->all();
        $account = new User();
        $account->first_name = $data['first_name'];
        $account->last_name = $data['last_name'];
        $account->email = $data['email'];
        $account->phone_number = $data['phone_number'];
        $account->avatar = 'no_avatar.png';
        if($data['password'] == $data['confirm_password']){
            $account->password = Hash::make($data['password']);
        }else{
            return redirect()->back()->withErrors(['error' => 'Mật khẩu không trùng khớp!']);
        }
        //create token
        $account->token = Str::random(10);
        $account->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $account->isAdmin = 0;
        $account->isSubAdmin = 0;
        $account->save();

        //Email verification for new account
        Mail::send('emails.confirm_signup',compact('account'),function($email) use($account){
            $email->subject('Xác nhận đăng ký tài khoản');
            $email->to($account->email,'CKC Social network');
        });
        return Redirect::to('/')->with('success_verify','Mã xác minh đã được gửi đến email của bạn !');
    }
    
    // public function verification_account(Request $request){

    //     $account = User::Where('id',$request->id);
    //     // If token is null
    //     if($account->token == null){
    //         return Redirect::to('/')->with('verified','Bạn đã hoàn tất xác minh trước đó rồi !');

    //     }
    //     //!bug URL not match
    //     //If token have value - or error orther //TODO fixing
       
    //     if($account->token === $request->token){
    //         $account->update(['status'=>1,'token'=>null]);
    //         return Redirect::to('/')->with('success_verify','Xác minh thành công !');
    //     }
    //     else{
    //         return Redirect::to('/sign-up')->with('failed_verify','Xác minh thẩ bại, vui lòng thử lại !');
    //     }
        
        

    // }

    public function verification_account(User $account,$token){

        // If token is null
        if($account->token == null){
            return Redirect::to('/')->with('verified','Bạn đã hoàn tất xác minh trước đó rồi !');
        }
        //!bug URL not match
        //If token have value - or error orther //TODO fixing
        if($account->token === $token){
            $account->update(['status'=>1,'token'=>null]);
            return Redirect::to('/')->with('success_verify','Xác minh thành công !');
        }
        else{
            return Redirect::to('/sign-up')->with('failed_verify','Xác minh thẩ bại, vui lòng thử lại !');
        }
    }

    public function update_password(Request $request){
        $this->validate($request,
            [
                
                'current_password' => 'required',
                'new_password' => 'required|min:8',
                'confirm_new_password' => 'required'
            ],
            [
                
                'current_password.required' => 'Vui lòng nhập mật khẩu',
                'new_password.required' => 'Vui lòng nhập mật khẩu',
                'new_password.min' => 'Mật khẩu ít nhất 8 ký tự',
            ]);
        $data = $request->all();
        $id= Auth::user()->id;  
        $account = User::Where('id',$id)->first();
        $account->token = Str::random(10);
        
        if(Hash::check($data['current_password'],$account->password)){
            
        
            if($data['new_password'] === $data['confirm_new_password']){
                $password = Hash::make($data['new_password']);
                $update_pass = User::Where('id',$id)->update(['password'=>$password]);
                Mail::send('emails.verification_change_password',compact('account'),function($email) use($account){
                    $email->subject('Đổi mật khẩu');
                    $email->to($account->email,'CKC Social network');
                });
                return redirect()->route('profile-user',['id'=>$id]);
            }
            else {
                return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau']);
            }
        }
        else{
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau']);
        }
        
        
    }

    public function reset_password(Request $request){
        $data = $request->all();
        $id = Auth::user()->id;
        $account = User::Where('id',$id)->first();
        // dd($account,$id);
        if($account->status != 1 && $account->token == null){
            $token = $account->token = Str::random(10);
            User::Where('id',$id)->update(['token'=>$token]);
            Mail::send('emails.verification_forgot_password',compact('account'),function($email) use($account){
                $email->subject('Xác nhận đặt lại mật khẩu');
                $email->to($account->email,'CKC Social network');
            });
            return redirect()->route('forget-password');
        }
        else{
            return redirect()->back()->withErrors(['error' => 'Địa chỉ mail này chưa được đăng ký hoặc tài khoản chưa được kích hoạt']);
        }
    }
 

    public function verification_forget_password(Request $request,User $account){
        // dd($data);
        // dd($request-> all(),$account->token);
        $info = USer::Where('id',$request->id)->first();
        // dd($request-> all(),$account->token);
        if($info->token === $request->token){
            
            if($request->new_password == $request->confirm_new_password){
                User::Where('token',$request->token)->update(['password'=>$request->new_password,'token'=>null]);
                return Redirect::to('/');
            }
            else{
                return Redirect::to('/sign-up')->with('reset_passwrod_failed','Vui lòng thử lại !');
            }
        }
        else{
            return Redirect::to('/sign-up')->with('reset_passwrod_failed','Vui lòng thử lại !');
        }
    }

    public function reset_password_no_auth(Request $request){
        $data = $request->all();
        $email = $data['email'];
        $account = User::Where('email',$email)->first();
        if($account->status == 1 && $account->token == null){
            $token = $account->token = Str::random(10);
            User::Where('email',$email)->update(['token'=>$token]);
            Mail::send('emails.verification_forgot_password_noAuth',compact('account'),function($email) use($account){
                $email->subject('Xác nhận đặt lại mật khẩu');
                $email->to($account->email,'CKC Social network');
            });
            return redirect()->route('forgot-password-noAuth');
        }
        else{
            return redirect()->back()->withErrors(['error' => 'Địa chỉ mail này chưa được đăng ký hoặc tài khoản chưa được kích hoạt']);
        }
    }

    public function update_profile(Request $request){
        $data = $request->all();
        $account -= new User();
    }

    //load trang cá nhân
    public function get_profile_user($id){
            $account = User::Where('id',$id)->first();
            $listPost = Post::All()->where('id_user',$id)->where('status',1)->sortByDesc('created_at');
            $list_media = media_file_upload::All()->where('status',1);
            $lstFriend = Friend::Where('id_user_target',$id)->where('status',1)->orWhere('id_user_preference',$id)->get();
            // dd($lstFriend);
            foreach($list_media as $media){
                $media = Storage::url($media->media_file_name);
            }
            foreach($listPost as $item){
                if($item->view_mode == 1){
                    $item->view_mode = 'Công Khai';
                }else{
                    $item->view_mode = 'Chỉ Mình Tôi';
                }
                
            }
        $check_relation = $this->checkIsFriend($id);

        return view('layouts.trangcanhan')
        ->with('lstFriend',$lstFriend)
        ->with('account',$account)
        ->with('listPost',$listPost)
        ->with('list_media',$list_media)
        ->with('check_relation',$check_relation);

        }

        public function get_profile_user1($id){
            $account = User::Where('id',$id)->first();
            $listPost = Post::All()->where('id_user',$id)->sortByDesc('created_at');
            $list_media = media_file_upload::All();
            $lstFriend = Friend::Where('id_user_target',$id)->where('status',1)->orWhere('id_user_preference',$id)->get();
            // dd($lstFriend);
            foreach($list_media as $media){
                $media = Storage::url($media->media_file_name);
            }
            foreach($listPost as $item){
                if($item->view_mode == 1){
                    $item->view_mode = 'Publish';
                }else{
                    $item->view_mode = 'Private';
                }
                
            }
        $check_relation = $this->checkIsFriend($id);

        return view('bangtin.suabaiviet')
        ->with('lstFriend',$lstFriend)
        ->with('account',$account)
        ->with('listPost',$listPost)
        ->with('list_media',$list_media)
        ->with('check_relation',$check_relation);

        }

    public function trangcanhan(){
        $id = session()->get('LoggedUser');
        $account = User::Where('id',$id)->first();
        $listPost = Post::All()->where('id_user',$id)->sortByDesc('created_at');
        $list_media = media_file_upload::All();
        $lstFriend = Friend::Where('id_user_target',$id)->where('status',1)->orWhere('id_user_preference',$id)->get();
        // dd($lstFriend);
        foreach($list_media as $media){
            $media = Storage::url($media->media_file_name);
        }
        foreach($listPost as $item){
            if($item->view_mode == 1){
                $item->view_mode = 'Publish';
            }else{
                $item->view_mode = 'Private';
            }
            
        }
        $check_relation = $this->checkIsFriend($id);
        return view('layouts.trangcanhan')
        ->with('lstFriend',$lstFriend)
        ->with('account',$account)
        ->with('listPost',$listPost)
        ->with('list_media',$list_media)
        ->with('check_relation',$check_relation);
    }
  
        

}
