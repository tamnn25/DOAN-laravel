<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrderUserController extends Controller
{
    //
    public function order_user(){
        $user = auth()->user();
        if(!Session::get('user_id')){
            $orders = Order::where('user_id', $user->id)
                    ->orderBy('id', 'desc')
                    ->paginate(4);
                
            return view('order_user.index')->with([
                'user'          =>  $user,
                'orders'        =>  $orders,
            ]);    
        }else{
            
        }
    }
    
    public function detailOrder($id){
        $data = [];
        $order = Order::whereId($id)
            ->with('order_detail')
            ->first();
        // dd($order);
        $data['order'] = $order;

        return view('order_user.detail',$data);
    }
    public function profile(){
        $data = [];
        $user = Auth::user();

        if(!session::get('id')){
            $users = User::where('id', $user->id)
                    ->orderBy('id', 'desc')
                    ->get();

            $data['users'] = $users;

            // dd($users);
        return view('profile.index',$data);
        }else{
            
            echo 'try again';
        }
        
    }
    public function edit(){
        return view('profile.update');
    }

    public function update($id){
        dd(123);
    }
}
