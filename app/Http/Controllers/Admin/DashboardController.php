<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Message;
use App\Models\Order;
use App\Models\Comment;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        // dd(111);
    }
    
    public function index()
    {
        $CountCategory = Category::count();
        $CountProduct = Product::count();
        $CountMessage = Message::count();
        $CountOrder = Order::count();
        $CountUser = User::count();
        $CountAdmin = Admin::count();
        $CountComment = Comment::count();

        return view('admin.dashboard')->with([
            'CountCategory' => $CountCategory,
            'CountProduct' => $CountProduct,
            'CountMessage' => $CountMessage,
            'CountOrder' => $CountOrder,
            'CountUser' => $CountUser,
            'CountAdmin' => $CountAdmin,
            'CountComment' => $CountComment,
            ]);
    }
    
}
