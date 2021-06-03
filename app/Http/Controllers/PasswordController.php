<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;

class PasswordController extends Controller
{
    
    public function change(){
        $data = [];

        $user = Auth::user();

        if(!session::get('id')){
            $users = User::where('id', $user->id)
                ->orderBy('id', 'desc')
                ->get();

            $data['users'] = $users;

            return view('password.changepass',$data);

        }else{
            
            echo 'try again';
        }
        }
  
     public function detailpassword($id){
        $data = [];
       
        
        $data = [];
        
        $user = User::findOrFail($id);

        $data['user'] = $user;

        return view('password.edit',$data);
    }
   
    public function update(Request $request, $id)
    {
        // Method: PUT
        $request->password = bcrypt('password');

        DB::beginTransaction();

        try {
            // create $category
            $user = User::find($id);
            // set value for field name
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;

            $user->save();
            
            DB::commit();

            return redirect()->route('password.password')
                ->with('success', 'Update My Account successful!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}