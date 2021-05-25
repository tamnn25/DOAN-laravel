<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;

class ProfileController extends Controller
{
    //
    public function profile($id){
        //echo 'profile';
        $data = [];

        $orders = Product::all();
        $orders = Order::where($id);
        $data['orders'] = $orders;       
        return view('profile.cartpayment', $data);
    }
}
