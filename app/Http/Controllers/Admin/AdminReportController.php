<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\models\report;
Use App\models\detail_report;

class AdminReportController extends Controller
{
    public function adminReport(){
        $lstReport = detail_report::all();
       
        // foreach($lstReport as $item){
        //     if($item->status == 0){
        //         $item->status = 'Đã bị ẩn';
        //     }elseif($item->status == 1){
        //         $item->status = 'Không có báo cáo';
        //     }elseif($item->status == 2){
        //         $item->status ='Có báo cáo nội dụng';
        //     }
            
        // }
        $lstReportReporting = report::Where('status',2)->get()->count();
        $lstReportBlock = report::Where('status',0)->get()->count();

        
        $totalReport = $lstReport->count();
        return view('admin.tocao.dashboardtocao')
        ->with(['lstReport' => $lstReport,'totalReport' => $totalReport,'lstReportReporting'=>$lstReportReporting,'lstReportBlock'=>$lstReportBlock]);
    }

    public function create_report(Request $request){
        $noidungtocao = $request->noidungtocao;
        $report = detail_report::create([
            'reason' => $noidungtocao,
            'status' => 1
        ]);
        
        //load_report();
        return redirect()->route('load-report');
    }

    public function delete_report(Request $request){
        $id = $request->id;
        $report = detail_report::find($id);
        $report->delete();
        //load_report();
        return redirect()->route('load-report');
    }

    public function load_report(Request $request)
    {
        $lstReport = detail_report::all();
        $lstReportReporting = report::Where('status',2)->get()->count();
        $lstReportBlock = report::Where('status',0)->get()->count();

        $report = '';
        $report.= '<div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="5%" class="table-th">
                                        <p> STT </p>
                                    </th>
                                    <th width="50%" class="table-th">
                                        <p>nội dung</p>
                                    </th>
                                    <th class="table-th">
                                        <p> Hiện</p>
                                    </th>
                                    <th class="table-th">
                                        <p> Chức năng</p>
                                    </th>
                                </tr>';
                                foreach ($lstReport as $key => $value)
                                {
        $report.='                <tr>
                                        <td>
                                            <p class="td-table table-tocao">'.($key + 1).'</p>
                                        </td>
                                        <td>
                                            <p class="td-table table-tocao">'.$value->reason.'</p>
                                        </td>
                                        <td>
                                            <p class="td-table table-tocao">';
                                                if ($value->status == 1)
        $report.='                                <input type="checkbox" class="check-status" id="check-status" data-id="'.$value->id.'" checked onclick="checkstatus('.$value->id.')">';
                                                else{
                                         
        $report.='                                <input type="checkbox" class="check-status" id="check-status" data-id="'.$value->id.'" onclick="checkstatus('.$value->id.')">';
                                                }
        $report.='                          </p>
                                        </td>
                                     
                                        <td>
                                            <p class="td-table table-tocao icon-chucnang">
                                             
                                                <button  id="nutsuatocao" href="" alt="sửa" title="sửa" onclick="suaformtocaotao('.$value->id.')"> <i class="fa fa-pencil-square-o" ></i></button>
                                                <button  id="nutxoatocao" href="" alt="xóa" title="xóa" onclick="xoaformtocaotao('.$value->id.')"><i class="fa fa-trash w3-xxlarge" ></i></button>
                                            </p>
                                        </td>
                                    </tr>';
                                }
        $report.='          </tbody>
                        </table>
                    </div>';
                
        return $report;

        
    }

    public function show_edit_report(Request $request){
        $id = $request->id;
        $nd = detail_report::find($id);
        $report = '';
        $report.= '   <div class="card-block" >
                    <h4 class="sub-title">sửa thông tin tố cáo</h4>
                    <for  enctype="multipart/form-data" id="formsuatocao">
                      <input type="hidden" name="_token" value="'.csrf_token().'">
                        <div class="form-group has-success row">

                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-success" id="noidungtocao'.$nd->id.'"
                                    name="noidungtocao" value="'.$nd->reason.'">
                            </div>

                        </div>
                        <div class="row nutsua">
                            <button class="btn hor-grd btn-grd-success" onclick="suatocao('.$nd->id.')">Lưu</button>
                            <button class="btn hor-grd btn btn-secondary" type="button" id="nuthuy" onclick="nuthuytocao()">Hủy</button>
                            
                        </div>
                    </form>
                </div>';

        return $report;
    }

    function edit_report(Request $request){
        $id = $request->id;
        $noidungtocao = $request->noidungtocao;
        $report = detail_report::find($id);
        $report->reason = $noidungtocao;
        $report->save();
        //load_report();
        return redirect()->route('load-report');
    }

    function check_status(Request $request){
        $id = $request->id;
        $report = detail_report::find($id);
        if ($report->status == 1)
        {
            $report->status = 0;
        }
        else{
            $report->status = 1;
        }
        $report->save();
        //load_report();
        return redirect()->route('load-report');
    }

    function ds_report_post(){
        // $lstReport = detail_report::all();
        $lstReport = report::select('reports.*', 'detail_reports.reason','users.first_name', 'users.last_name')
                    ->join('detail_reports', 'reports.id_detail_report', '=', 'detail_reports.id')
                    ->join('users', 'reports.id_user', '=', 'users.id')
                    ->where('reports.status',1)
                    ->get();
        $lstReportReporting = report::Where('status',2)->get()->count();
        $lstReportBlock = report::Where('status',0)->get()->count();


        return view('admin.tocao.dstocaobaiviet',['lstReport'=>$lstReport,'lstReportReporting'=>$lstReportReporting,'lstReportBlock'=>$lstReportBlock]);
    
    }


}
