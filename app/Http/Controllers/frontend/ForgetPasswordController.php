<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Mail; 
use App\Mail\ForgetPassword;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    public function index(){
        return view('frontend.forget_password.index');
    }

    public function CheckEmail(Request $request){
        $email = $request->input('email');
        $email_exist_or_not = User::where('email', $email)->first();
         if(empty($email_exist_or_not->email)){
            return response()->json(['email_status'=> 'email_not_exist']);
         }else{
            $otp = random_int(100000, 999999); // Generates a cryptographically secure random number between 100000 and 999999
            $update_otp = User::where('email', $email)->update(['otp' => $otp]);
            $mailData = [
                'title' => 'Forget password OTP from RPL SATTA',
                'body' => 'This is you OTP to forget password '. $otp,
            ];
            Mail::to($email_exist_or_not->email)->send(new ForgetPassword($mailData));
            return response()->json(['email_status'=> 'otp_sent']);
         }
    }


    public function CheckOtp(Request $request){
        $email = $request->input('email');
        $otp = User::where('email', $email)->first();
        return response()->json(['otp' => $otp->otp]);
    }

    public function UpdatePassword(Request $request){
      $email = $request->input('email');
      $pass = $request->input('password');
      $update_otp = User::where('email', $email)->update(['password' => Hash::make($pass)]);

      if($update_otp){
        return response()->json(['password_status' => 'updated']);
      }else{
        return response()->json(['password_status' => 'not_updated']);
      }

        
    }
}
