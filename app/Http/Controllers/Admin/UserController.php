<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(request $request)
    {
        //
        $data = [];
        //echo "day la manager User (Crud)";

        // $admins = Admin::paginate(8);
        $admins = Admin::orderBy('id', 'desc')->paginate(4);

        if(!empty($request->name)){
            $admins = Admin::where('name' , 'like' , '%' . $request->name . '%')
            ->orderBy('id', 'desc')
            ->paginate(4);
        }
        if(!empty($request->role_id)){
            $admins = Admin::where('role_id' , 'like' , '%' . $request->role_id . '%')
            ->orderBy('id', 'desc')
            ->paginate(4);
        }


        $data['admins'] = $admins;
        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->password = bcrypt('password');
        //
        $userInsert = [
            'name' => $request->name,
            'email'=> $request->email,
            'email_verified_at' => now(),
            'password' => $request->password,

            'role_id' => $request->role_id,
            'remember_token' => Str::random(10),
        ];
        DB::beginTransaction();
        //dd($userInsert);
        try{
            Admin::create($userInsert);
            DB::commit();
            return redirect()->route('admin.user.index')->with('sucess', 'Insert into data to Category Sucessful.');

        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    
    public function edit($id)
    {
        //
        $data = [];
        $users = Admin::find($id);
        
        $data['users'] = $users;
        return view('admin.user.edit',$data);
       
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {   $request->password = bcrypt('password');
        // dd($id);
        DB::beginTransaction();
        
        try{
            $users = Admin::findOrFail($id);
            // $users->name = $request->name;
            // $users->email = $request->email;
            $users->password = $request->password;

            $users->save();
            
            DB::commit();
            return redirect()->route('admin.user.index')->with('success', 'Update User successful!');
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::beginTransaction();

        try {
            $admins = Admin::find($id);
            $admins->delete();
            DB::commit();

            return redirect()->route('admin.user.index')
                ->with('success', 'Delete Category successful!');
        }  catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
