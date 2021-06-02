<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    //
    public function password(request $request, $id){
       $user = Auth()->user();
        if(!SESSION::get('id')){

            $request->password=bcrypt('password');
            DB::beginTransaction();
            try{
                $password = User::find($id);
                $password->password = $request->password;

                $password->save();
                dd(123);
                DB::commit();
                
                return redirect('home');
            }
            catch (exception $ex){
                echo $ex->getMessage();
            }
        }
    }
}
