<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

// view admin login page if user logged in redirect on dashboard starts
    public function AdminLoginView(){
        if(Auth::check()){
            return redirect('admin/dashboard'); 
        }else{
        return view('admin.admin_login');
        }   
    }
// view admin login page if user logged in redirect on dashboard ends

    
// admin login request function after login redirect on dashboard starts
    public function AdminLogin(LoginRequest $request){
        $request->authenticate();
        $request->session()->regenerate();
        return redirect('admin/dashboard');
    }
// admin login request function after login redirect on dashboard starts

    


}
