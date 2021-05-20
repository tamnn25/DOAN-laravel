<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $products = Product::all();
        $categories = Category::all();
        // $categories = Category::where('parent_id', 0)->get();

        // dd($products);
// dd($categories);
        return view('home.homepage')->with([
            'products' => $products,
            'categories' => $categories,
        ]);

        // return view('home.homepage');
    }
    public function shop(){
        //
        // dd(123);
        $data = [];
        $products = Product::all();
        $data['products'] = $products;
        return view('home.shop',$data);
    }
    public function listshopcategory()
    {
        $products = Product::all();

        $categories = Category::all();
        
        return view('home.shop_list_category')->with([
            'products' => $products,
            'categories' => $categories,
            ]);
    }
    
}
