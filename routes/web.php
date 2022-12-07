<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BangTinController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AddfriendController;
use App\Http\Controllers\MediaFilePostController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminReportController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//đăng kí tài khoản
route::get('/sign-up',[AccountController::class,'signup'])->name('sign-up-user');
route::post('/create-account-user',[AccountController::class,'create_account'])->name('dangky');

route::get('/create-account-user/verification/{account}/{token}',[AccountController::class,'verification_account'])->name('complete_verify');

//trang login
Route::get('/', [LoginController::class,'getLogin'])->name('login');
//đăng nhập 
Route::post('/dangnhap', [LoginController::class, 'postDangNhap'])->name('dangnhap');
//đăng xuất
Route::get('/dangxuat', [LoginController::class, 'dangxuat'])->name('dangxuat');


//middleware
Route::middleware('auth')->group(function(){
    // Route::get('/caidat/thaydoimatkhau', function () { return view('canhan.thaydoimatkhau');});
    Route::name('taikhoan.')->group(function(){ 
        Route::get('/caidat/thaydoimatkhau', [AccountController::class, 'getthaydoimatkhau'])->name('getthaydoimatkhau');
        route::post('/caidat/capnhatmatkhau',[AccountController::class,'update_password'])->name('update-password-user');
        Route::get('/caidat/thaydoithongtincanhan', [AccountController::class, 'getthaydoithongtincanhan'])->name('getthaydoithongtincanhan');
        Route::post('/caidat/thaydoithongtincanhan', [AccountController::class, 'postthaydoithongtincanhan'])->name('postthaydoithongtincanhan');
    });

    Route::name('trangchu.')->group(function(){ 
        Route::get('/bangtin', [BangTinController::class, 'getbantin'])->name('getbantin');
    });

 });



//? update middleware
//USER  

    // Route::name('nguoidungs.')->group(function(){ 
    //  Route::get('/canhan', [AccountController::class, 'getcanhan'])->name('canhan');
    //  });


//gom nhóm
Route::prefix('/')->group(function(){

});

//USER - FORGOT PASSWORD HAVE AUTH
Route::get('/caidat/quenmatkhau', function () { return view('canhan.quenmatkhau');})->name('forget-password');
Route::post('/caidat/resetpassword',[AccountController::class,'reset_password'])->name('reset-password');
Route::post('/verification-forget-password',[AccountController::class,'verification_forget_password'])->name('verification-forget-password');
Route::get('/verification-change-forgot-password', function () { return view('canhan.change_password_forget');})->name('verification-change-forgot-password');


//USER - FORGOT PASSWORD DONT HAVE AUTH 
Route::get('/forgot-password', function () { return view('forgot_password');})->name('forgot-password-noAuth');
Route::post('/verification-forgot-password-send-mail',[AccountController::class,'reset_password_no_auth'])->name('reset-password-noAuth');
Route::post('/verification-forget-password',[AccountController::class,'verification_forget_password'])->name('verification-forget-password');
Route::get('/verification-change-forgot-password-view', function () { return view('canhan.change_password_forget');})->name('verification-change-forgot-password-view');
//Route::get('/verification-change-forgot-password-view', function () { return view('canhan.change_password_forget');})->name('verification-change-forgot-password-view');

//AUTHENTICATE WITH FIREBASE
Route::get('/auth/redirect',function(){
    return Socialite::driver('google')
    ->with(['hd' => '/canhan'])
    ->redirect();
});

Route::get('/auth/callback', function () {
    $auth = Socialite::driver('google')->stateless()->user();
    
    return redirect()->route('nguoidungs.canhan');
});

// Route::get('login/{social}',[ LoginController::class,'redirectToProvider'] );

// Route::get('login/{social}/callback', [ LoginController::class,'handleProviderCallback']);

Route::get('ckcsocialnetwork/login/google/callback', [LoginController::class,'callback_google']);
route::get('ckcsocialnetwork/login-google',[LoginController::class,'logingoogle'])->name('login-google');

// Route::post('/auth/redirect', function () {  
//     return Socialite::driver('github')->redirect();
// });
 
// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('github')->user();
//     dd($user);
 
     // $user->token
// });

//login google
// Route::get('/login_goggle', 'LoginController@login_goggle')->name('login_goggle');
route::prefix('/goggle')->name('goggle.')->group(function(){
    Route::get('/', [LoginController::class, 'login_goggle'])->name('login'); // đăng nhâp bằng goggle
    Route::any('/callback', [LoginController::class, 'callback_goggle'])->name('callback_goggle'); // gọi form
});


//TIMELINE USER
Route::get('/ckcsocialnetwork/profile/id={id}',[AccountController::class,'get_profile_user'])->name('profile-user');
//post
Route::post('/create-post',[PostController::class,'create_post'])->name('create-post');
Route::get('/list-post',[PostController::class,'get_list_post'])->name('get-list-post');
Route::post('/xoabaiviet',[PostController::class,'xoabaiviet'])->name('xoabaiviet');
Route::post('/suabaiviet-show',[PostController::class,'suabaiviet_show'])->name('suabaiviet-show');
Route::post('/suabaiviet',[PostController::class,'suabaiviet'])->name('suabaiviet');

//report bai viet
Route::post('/show-tocao',[ReportController::class,'hientocao'])->name('show-tocao');
route::post('/tocao-baiviet',[ReportController::class,'tocao_baiviet'])->name('tocao-baiviet');

//list photos
Route::get('/ckcsocialnetwork/profile={id}/photos',[MediaFilePostController::class,'get_photos_post'])->name('photos');

//commnet
Route::post('/post-comment-post',[PostController::class,'post_comment_post'])->name('post-comment-post');
Route::post('/load-comment-post',[PostController::class,'load_comment_post'])->name('load-comment-post');
Route::post('/repcomment',[PostController::class,'repcomment'])->name('repcomment');
Route::post('/load-socomment-post',[PostController::class,'load_socomment_post'])->name('load-socomment-post');


//like bài viết 
Route::post('/like-post',[PostController::class,'like_post'])->name('like-post');
Route::post('/load-like-post',[PostController::class,'load_like_post'])->name('load-like-post');
Route::post('/kiemtralikebaiviet',[PostController::class,'kiemtralikebaiviet'])->name('kiemtralikebaiviet');


//ảnh bìa và avatar
Route::post('/change-coverimage',[AccountController::class,'change_coverimage'])->name('change-coverimage');
Route::post('/change-avatar',[AccountController::class,'change_avatar'])->name('change-avatar');

//newfeed
Route::get('/ckcsocialnetwork/newfeeds',[PostController::class,'get_post'])->name('newfeed');
Route::get('/ckcsocialnetwork/profile1/id={id}',[AccountController::class,'get_profile_user1'])->name('profile-user1');

//bạn bè
Route::get('/ckcsocialnetwork/requestaddfriend/id={id}',[AddfriendController::class,'requestAddFriend'])->name('request-add-friend');
Route::get('/ckcsocialnetwork/profileid={id}/friendlist',[AddfriendController::class,'get_friendlist'])->name('friendlist');
Route::get('/ckcsocialnetwork/profileid={id}/friendlist-shortcut',[AddfriendController::class,'get_friendlist_shortcut'])->name('friendlist-shortcut');
Route::get('/ckcsocialnetwork/acceptRequestAddfriend/id={id}',[AddfriendController::class,'acceptRequestAddfriend'])->name('accept-request-addfriend');
Route::get('/ckcsocialnetwork/unfriend/id={id}',[AddfriendController::class,'unFriend'])->name('unfriend');


//*ADMIN----------------------------------------------------------------------------------------------------------------------
Route::get('ckcsocialnetwork/admin/login',[AdminLoginController::class,'viewLoginPage'])->name('viewLoginPage');
Route::post('ckcsocialnetwork/admin/login/request',[AdminLoginController::class,'loginAdmin'])->name('loginAdmin');
Route::get('ckcsocialnetwork/admin/logout',[AdminLoginController::class,'logoutAdmin'])->name('logoutAdmin');
Route::get('/ckcsocialnetwork/admin', [AdminDashboardController::class,'adminDashboard'])->name('adminDashboard');

<<<<<<< HEAD
//* account admin
route::get('ckcsocialnetwork/admin/account',[AdminAccountController::class,'adminAccountAdmin'])->name('accountAdmin');
route::get('ckcsocialnetwork/admin/account/createaccount',[AdminAccountController::class,'formCreateAccount'])->name('adminCreateAccount');
route::post('ckcsocialnetwork/admin/account/addAccountAdmin',[AdminAccountController::class,'adminAddAccountAdmin'])->name('adminAddAccountAdmin');
=======


>>>>>>> Kiet-dangnhap
//post admin
route::get('ckcsocialnetwork/admin/post',[AdminPostController::class,'adminPost'])->name('adminPost');
route::get('ckcsocialnetwork/admin/post/detailpost/id={id}',[AdminPostController::class,'adminDetailPost'])->name('adminDetailPost'); 
Route::get('/getPost',[AdminPostController::class,'getPost'])->name('getPost');

//tao tac admin tren user
Route::get('ckcsocialnetwork/admin/infouser/id={id}',[AdminAccountController::class,'getInfoUser'])->name('getInfoUser');
Route::get('/getAccountUser',[AdminAccountController::class,'getAccountUser'])->name('getAccountUser');

//admin tố cáo 
Route::get('ckcsocialnetwork/admin/report',[AdminReportController::class,'adminReport'])->name('adminReport');
Route::post('/create-report',[AdminReportController::class,'create_report'])->name('create-report');
Route::get('/load-report',[AdminReportController::class,'load_report'])->name('load-report');
Route::post('/edit-report',[AdminReportController::class,'edit_report'])->name('edit-report');
Route::post('/delete-report',[AdminReportController::class,'delete_report'])->name('delete-report');
Route::post('/show-edit-report',[AdminReportController::class,'show_edit_report'])->name('show-edit-report');
Route::post('/check-status',[AdminReportController::class,'check_status'])->name('check-status');
Route::get('/ds-report-post',[AdminReportController::class,'ds_report_post'])->name('ds-report-post');


