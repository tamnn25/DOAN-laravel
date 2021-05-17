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
        $users = User::orderBy('id', 'desc')->paginate(4);
        // add new param to search
        // search post name
        if (!empty($request->name)) {
            $users = User::whereDate('created_at', $request->created_at)
                    ->orWhere('name', 'like', '%' . $request->name . '%')
                    ->orderBy('id', 'desc')
                    ->paginate(4);
            // dd($users);
        }

        $data['users'] = $users;
        
        return view('admin.customer.index',$data);
    }

}
