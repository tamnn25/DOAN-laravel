<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Price;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $data = [];
        $products = Product::all();
        $categories = Category::all();
        // $prices = Price::all();
        //$products = Product::with(['Category','latestPrice']);

        // dd($products);

        $data['categories'] = $categories;
        $data ['products'] = $products;
        return view('home.homepage', $data);
        

        // return view('home.homepage');
    }
    public function shop($id){
        //
        // dd(123);
        
        
        $categories = Category::all();
        $products   = ($id != 0) ? Product::where('category_id', $id)->paginate(4) : Product::paginate(4);
        
        return view('home.shop')->with([
            'lasterProduct' => $lasterProduct,
            'products'      => $products,
            'categories'    => $categories,
        ]);
    }

        // $categories = Category::all();
        
        // return view('home.shop_list_category')->with([
        //     'products' => $products,
        //     'categories' => $categories,
        //     ]);
}
    

