<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\media_file_upload;

class AdminPostController extends Controller
{
    public function adminPost(){
        $lstPost = Post::paginate(5);
        foreach($lstPost as $item){
            if($item->view_mode == 1){
                $item->view_mode = 'Công Khai';
            }else{
                $item->view_mode = 'Riêng Tư';
            }
            
        }

        foreach($lstPost as $item){
            if($item->status == 0){
                $item->status = 'Đã bị ẩn';
            }elseif($item->status == 1){
                $item->status = 'Không có báo cáo';
            }elseif($item->status == 2){
                $item->status ='Có báo cáo nội dụng';
            }
            
        }
        $lstPostReporting = Post::Where('status',2)->get()->count();
        $lstPostBlock = Post::Where('status',0)->get()->count();

        
        $totalPost = $lstPost->count();
        return view('admin.post')
        ->with(['lstPost' => $lstPost,'totalPost' => $totalPost,'lstPostReporting'=>$lstPostReporting,'lstPostBlock'=>$lstPostBlock]);
    }

    public function adminDetailPost($id){
        $post = Post::Where('id',$id)->First();
        $listMedia = media_file_upload::Where('id_post',$id)->get();
<<<<<<< HEAD
        $totalMedia = $listMedia->count();
       

        
        return view('admin.detailpost')->with(['totalMedia'=>$totalMedia,'listMedia'=>$listMedia,'post'=>$post]);
=======
        // dd($id,$listMedia);
        return view('admin.baiviet.detailpost')->with(['listMedia'=>$listMedia,'post'=>$post]);
    }

    public function getPost(Request $request){
       
        //phan trang
        $page = $request->page;
        $limit = 5;
        $total = Post::all()->count();
        $totalPage = ceil($total/$limit);
        $start = ($page - 1)*$limit;
        // $lstAccountUser = User::skip($start)->take($limit)->get();
        //panitor
        $lstPost = Post::skip($start)->take($limit)->get();
        foreach($lstPost as $item){
            if($item->status == 0){
                $item->status = 'Đã bị ẩn';
            }elseif($item->status == 1){
                $item->status = 'Không có báo cáo';
            }elseif($item->status == 2){
                $item->status ='Có báo cáo nội dụng';
            }
            
        }
        $lstPostReporting = Post::Where('status',2)->get()->count();
        $lstPostBlock = Post::Where('status',0)->get()->count();

        
        $totalPost = $lstPost->count();
        return view('admin.baiviet.dsbaiviet')
        ->with(['lstPost' => $lstPost,'totalPost' => $totalPost,'lstPostReporting'=>$lstPostReporting,'lstPostBlock'=>$lstPostBlock]);
>>>>>>> Kiet-dangnhap
    }
}