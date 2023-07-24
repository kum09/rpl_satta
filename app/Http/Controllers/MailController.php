<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\LoginMail;
class MailController extends Controller
{
    public function index(){
        $mailData = [
            'title' => 'Mail From RPL SATTA',
            'body' => 'This is testing email for rpl satta'
        ];
        Mail::to('anil.digitaldesign@gmail.com')->send(new LoginMail($mailData));
        dd('Email Send Successfull');
    }
}
