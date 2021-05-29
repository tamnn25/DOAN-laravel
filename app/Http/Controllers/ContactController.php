<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Message;

class ContactController extends Controller
{
    //
    public function contact(){
        return view('contact.address');
    }

    public function postmessage(request $request){
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
