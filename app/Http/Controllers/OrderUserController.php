<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrderUserController extends Controller
{
    //
    public function order_user(Request $request){  // ngày tháng mua hàng
        $user = auth()->user();
        if(!Session::get('user_id')){
            $orders = Order::where('user_id', $user->id)
                    ->orderBy('id', 'desc')
                    ->paginate(4);

            if (!empty($request->date)){
            $orders = Order::where('created_at' , 'like' , '%' . $request->date . '%')
                        ->orderBy('created_at', 'desc')
                        ->paginate(4);
            }   
            return view('order_user.index')->with([
                'user'          =>  $user,
                'orders'        =>  $orders,
            ]);    
        }else{
            
        }
    }
    
    public function detailOrder($id){ // chi tiết đơn hàng vừa mua
        $data = [];
        $order = Order::whereId($id)
            ->with('order_detail')
            ->first();

        $total = $this->calculateTotalCart($order);

        $data['order'] = $order;
        $data['total'] = $total;

        return view('order_user.detail',$data);
    }

    public function calculateTotalCart($order)  // tổng tiền 
    {
        $total = 0;
        if (!is_null($order)) {
            foreach ($order->order_detail as $key => $order) {
                $total += $order['quantity'] * $order['price_id'];
            }
        }
        return $total;
    }


    public function profile(){ // thông tin khách hàng
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
 
}
