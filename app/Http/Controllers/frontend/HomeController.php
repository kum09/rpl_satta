<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Result;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function HomePage(){
        $currentTime = Carbon::now('Asia/Kolkata')->format('H:i:s');
        $currentDate = Carbon::now()->format('Y-m-d');
        $yesterdayDate = Carbon::yesterday()->format('Y-m-d');
      
        $today_results_list = Result::whereDate('date', $currentDate)->get();

        $yesterday_results_list = Result::whereDate('date', $yesterdayDate)->get();
 
        $yesterday_result = Result::whereDate('date', $yesterdayDate)->where('result_time', '<=', $currentTime)->orderBy('result_time', 'desc')->first();
        $today_result = Result::whereDate('date', $currentDate)->where('result_time', '<=', $currentTime)->orderBy('result_time', 'desc')->first();
        // return $yesterday_result;


        // $yesterday_results_list = Result::where('date', $yesterdayDate)->get();
        // return $results_list;
        return view('frontend.home', compact('today_results_list', 'yesterday_results_list', 'yesterday_result', 'today_result'));
    }
}
