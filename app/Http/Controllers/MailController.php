<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Util\Test;

class MailController extends Controller
{
    //
    public function sendEmail(){
        $details = [
            'title'  =>'Mail from sufside media',
            'body' =>'This is for testing mail using gmail',
        ];
        Mail::to('trankimhung799@gmail.com')->send(new TestMail($details));
        return "Email sendt";
    }
}
