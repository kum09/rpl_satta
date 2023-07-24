<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Result;
use App\Models\admin\ResultTime;
use App\Models\admin\Advertisement;
use Carbon\Carbon;
 
class HomeController extends Controller
{
    public function HomePage(){
        $currentTime = Carbon::now('Asia/Kolkata')->format('H:i:s');
        $currentDate = Carbon::now()->format('Y-m-d');
        $yesterdayDate = Carbon::yesterday()->format('Y-m-d');
      
        $time_list = ResultTime::get();
        $advertisement_list = Advertisement::where('id', 1)->first();
        $last_result_time = Resulttime::select('result_declare_time')->where('result_declare_time', '<=', $currentTime)->orderBy('result_declare_time', 'desc')->first();
         if(empty($last_result_time) || $last_result_time == ''){
            $last_result_time = Resulttime::select('result_declare_time')->where('result_declare_time', '22:00:00')->orderBy('result_declare_time', 'desc')->first();
         }

        // $today_results_list = Result::whereDate('date', $currentDate)->get();
        // $yesterday_results_list = Result::whereDate('date', $yesterdayDate)->get();
        // $yesterday_result = Result::whereDate('date', $yesterdayDate)->where('result_time', '<=', $currentTime)->orderBy('result_time', 'desc')->first();
        // $today_result = Result::whereDate('date', $currentDate)->where('result_time', '<=', $currentTime)->orderBy('result_time', 'desc')->first();
        
        return view('frontend.home', compact('time_list', 'last_result_time', 'advertisement_list'));
    }


    public function MonthlyResult(Request $request){
        $result_date = $request->input('result_date'); 
        // $monthly_result_list = Result::whereMonth('date', Carbon::now()->month)->get();  
        $all_result_time = ResultTime::get();  
        $advertisement_list = Advertisement::where('id', 1)->first();
        return view('frontend.monthly_result', Compact('all_result_time', 'advertisement_list'));
    }

    
}
