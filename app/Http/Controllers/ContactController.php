<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Message;
use Exception;

class ContactController extends Controller
{
    //
    public function contact(){
        return view('contact.address');
    }

    public function postmessage( Request $request){
        $message = [
            'name' => $request->name,
            'email' =>$request->email,
            'messages' => $request->message,
        ];

        DB::beginTransaction();
        try{
            Message::create($message);

            DB::commit();
            return redirect('/');
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        
    }
}
