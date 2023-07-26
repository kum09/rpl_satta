<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Result;
use Carbon\Carbon;

class ResultController extends Controller
{
    public function index(){
        $today = Carbon::now();
        $results = Result::where('date', $today)->get();
        return view('admin.result.index', compact('results'));
    }

    public function store(Request $request){
        $time = $request->input('time');
        $date = $request->input('date');
        $result = $request->input('result');
        $searchAttributes = [
            'date' => $date,
            'result_time' => $time,
        ];
        $updateAttributes = [
            'date' => $date,
            'result_time' => $time,
            'result' => $result,
            'result_status' => '1',
            'updated_by' => '1'
        ];

      

        $res = Result::updateOrCreate($searchAttributes, $updateAttributes);

        // $res = Result::create([
        //     'date' => $date,
        //     'result_time' => $time,
        //     'result' => $result,
        //     'result_status' => '1',
        //     'updated_by' => '1'
        // ]); 


        if($res){
            return response()->json(['status' => 'success', 'result' => $result]);
        }else{
            return response()->json(['status' => 'fail']);
        }

    }
}
