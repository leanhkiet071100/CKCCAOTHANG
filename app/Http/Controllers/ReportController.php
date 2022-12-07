<?php

namespace App\Http\Controllers;

use App\Models\report;
Use App\models\detail_report;
use App\Models\User;
use App\Models\friend;
use App\Http\Requests\StorereportRequest;
use App\Http\Requests\UpdatereportRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hientocao(Request $request){
        $idpost = $request->idpost;
        
        $report = detail_report::where('status',1)->get();
        $id =  Auth::user()->id;
        //$id_post = $report->pluck('id_post');  
		$account  = User::Where('id',$id)->first();
        $lstFriend = Friend::Where('id_user_target',$id)->where('status',1)->orWhere('id_user_preference',$id)->get();
        $dsreport = '';
        $dsreport.='  <div class="central-meta">
                    <div class="groups">
                        <span> DANH SÁCH TỐ CÁO</span>
                        <button class="nuthuysuabaiviet" id="nuthuysuabaiviet" onclick="huysuabaiviet()"><i class="fa fa-remove"></i></button>
                    </div>
                    <ul class="nearby-contct">';
                    foreach($report as $key => $value){
        $dsreport.='    <li>
                     
                            <div class="nearly-pepls">
                                <div class="pepl-info">';
        $dsreport.='                 <h4><button onclick="tocaobaiviet('.$idpost.' , '.$value->id.')" id="tocaobaiviet" class="tocaobaiviet" title="'.$value->reason.'">'.$value->reason.'</button></h4>';
                                    
        $dsreport.='            </div>
                            </div>
                        </li>';
                    }
       $dsreport.='              </ul>
                </div>';
       // return view('report.dstocao',compact('report','account','lstFriend'));
       return $dsreport;
    }
    public function tocao_baiviet(Request $request){
   
        $idpost = $request->idpost;
        $idreport = $request->idtocao;
        $id = Auth::user()->id;
        // thêm report
        $report = new report();
        $report->id_user = $id;
        $report->id_post = $idpost;
        $report->id_detail_report = $idreport;
        $report->status = 1;
        $report->save();
        return "sửa thành công";

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorereportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorereportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatereportRequest  $request
     * @param  \App\Models\report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatereportRequest $request, report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(report $report)
    {
        //
    }
}
