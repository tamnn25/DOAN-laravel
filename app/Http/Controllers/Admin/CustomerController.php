<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    //
    public function index(Request $request){
        //echo "day la manager Customer";
        $data = [];
        // get list data of table products
        $users = User::get();
        
        // add new param to search
        // search post name
        if (!empty($request->name)) {
            $users = $users->where('name', 'like', '%' . $request->name . '%');
        }

        // search created_at
        // if (!empty($request->created_at)) {
        //     $users = $users->where('created_at', 'like', '%' . $request->created_at . '%');
        // }
        
        // order ID desc
        $users = User::orderBy('id', 'desc')->get();
        
        // pagination
        // $users = $users->paginate(User::PAGE_LIMIT);

        $users = User::paginate('4');

        $data['users'] = $users;
        
        return view('admin.customer.index',$data);
    }
}
