<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    //
    public function message(){
        $data=[];
        $message = Message::get();

        return view('admin.messages.index')
            ->with([ 'message'=>$message ]);
    }
}
