<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    //
    /**
     * function index() nay de lam j nhi ?
     * cai nay em dung de search custom
     */


    public function index(Request $request){
        
        $data = [];
        // get list data of table products
        $users = User::all();

        // -----
        $key = $request->key;
        $users = User::where('name', 'like', '%' . $key . '%' );
            $request->name ? $users->where('name', $request->name)->get() :  $users->get();
        // ----

        // add new param to search
        // search post name
        // if (!empty($request->name)) {
        //     $users = $users->where('name', 'like', '%' . $request->name . '%');
        // }
        
        // search created_at
        // if (!empty($request->date)) {
        //     $users = $users->where('created_at', 'like', '%' . $request->date . '%');
        // }
        // dd($users);
        // order ID desc
        $users = $users->orderBy('name', 'desc')->get();
        
        // pagination
        $users = User::paginate(User::PAGE_LIMIT);

        // $users = $users->paginate(8);

        $data['users'] = $users;
        
        return view('admin.customer.index',$data);
    }

}
