<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\User;
class PasswordController extends Controller
{
    //
    public function getpassword($id){
        $user = User::fine($id);
        
        return view('changepassword.change_password')->with('user', $user);
    }

    // public function updatepassword(request $request){
        
    //    $user = Auth()->user()->id;
       
    //     if(!SESSION::get('id')){
    //         $request->password=bcrypt('password');
    //         DB::beginTransaction();

    //         try{
    //             $password = auth()->user()->id;
                
    //             $password->password = $request->password;

    //             $password->save();
    //             DB::commit();
                
    //             return redirect('home');
    //         }
    //         catch (exception $ex){
    //             echo $ex->getMessage();
    //         }
    //     }
    // }
}
