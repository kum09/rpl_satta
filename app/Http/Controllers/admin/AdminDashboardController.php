<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\ResultTime;
use App\Models\admin\Result;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{

// view admin dashboard if user is not logged in redirect on admin login page starts
    public function DashboardView(){
        if(Auth::check()){
            $current_date =  Carbon::now('Asia/Kolkata');
            $result_list = Result::whereDate('date', $current_date)->orderBy('result_time', 'asc')->get();
            
            $time_list = ResultTime::get();
            return view('admin.admin_dashboard', compact('time_list', 'result_list'));
        }else{
        return redirect('admin');
        } 
    }
// view admin dashboard if user is not logged in redirect on admin login page ends

public function DashboardFilterRequest(Request $request){
    $filter_date = $request->input('date_value');
    $result_list = Result::whereDate('date', $filter_date)->orderBy('result_time', 'asc')->get();
    return $result_list;
}

}
