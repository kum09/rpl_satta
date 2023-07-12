<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{

// view admin dashboard if user is not logged in redirect on admin login page starts
    public function DashboardView(){
        if(Auth::check()){
            return view('admin.admin_dashboard');
        }else{
        return redirect('admin');
        } 
    }
// view admin dashboard if user is not logged in redirect on admin login page ends

}
