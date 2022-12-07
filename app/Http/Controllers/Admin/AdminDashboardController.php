<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\models\User;

class AdminDashboardController extends Controller
{
    public function adminDashboard(){
        $totalAccount = User::Where('isAdmin',0)->get()->count();
        $totalAccountActive = User::Where('isAdmin',0)->where('status',1)->get()->count();
        $totalAccountBlock = User::Where('isAdmin',0)->where('status',2)->get()->count();
        $totalAccountUnActive = User::Where('isAdmin',0)->where('status',0)->get()->count();
        $lstAccountUser = User::Where('isAdmin',0)->paginate(5);
        foreach($lstAccountUser as $account =>$accUser)
        {
            if($accUser->phone_number == null){
                $accUser->phone_number = "Chưa có thông tin";
            }
            if($accUser->birth_date == null){
                $accUser->birth_date = "Chưa có thông tin";
            }
        }
        // dd($totalAccount);
        return view('admin.dashboard')
        ->with(['totalAccount'=>$totalAccount,
                'totalAccountActive'=>$totalAccountActive,
                'totalAccountBlock'=>$totalAccountBlock,
                'totalAccountUnActive'=>$totalAccountUnActive,
                'lstAccountUser'=>$lstAccountUser]);
        
    }
}