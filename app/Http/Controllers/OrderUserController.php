<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderUserController extends Controller
{
    //
    public function order_user(){
        if(!Session::get('user_id')){
            $orders = Order::where('user_id',Session::get('user_id'))
                    ->orderBy('id', 'desc')
                    ->paginate(4);
                $user = Auth::user();
                $id = Auth::id();
                dd($orders);

            // dd($orders->all());
                    return view('order_user.index')->with([
                        'user'          =>  $user,
                        'orders'        =>  $orders,
                    ]);    
            // return redirect('dang nhap')->with('error','vui lòng đăng nhập  để xem lịch sử mua hàng');
        }else{
            
        }
        // return view('order_user.index');
    }
}
