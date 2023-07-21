<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Advertisement;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    public function index(){
        $advertisement_list = Advertisement::first();
        return view('admin.advertisement.index', compact('advertisement_list'));
    }

    public function update(Request $request){
        $mobile_number = $request->input('mobile_number');
        $email_id = $request->input('email_id');

       $ads_resutl = Advertisement::where('id', 1)->update([
            'user_id' => Auth::user()->id,
            'mobile_number' => $mobile_number,
            'email' => $email_id,
            'advertisement_title' => 'Advertisement Title',
            'advertisement_desc' => 'Advertisement Description',
            'advertisement_status' => 1
        ]);

        if($ads_resutl){
            return redirect()->back()->with('ads_updated', 'Advertisement details has been updated !');
        }else{
            return redirect()->back()->with('ads_not_updated', 'Advertisement details not updated !');

        }

    }
}
