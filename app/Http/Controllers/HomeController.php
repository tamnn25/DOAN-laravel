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
        //$data = [];
        
        $categories = Category::all();
        //$products = Product::get();
        $products   = ($id !=0) ? Product::where('category_id', $id)->paginate(4) : Product::paginate(4);
        //$productLimit  = Product::orderBy('created_at', 'desc')->limit(9)->get();
        //$products = Product::with(['category']);
        // if(!empty($request->category_id)){
        //     $products->$products->where('category_id', '%' . $request->category_id . '%');
        // }
        
        //$data['products'] = $products;
        return view('home.shop')->with([
            
            'products'      => $products,
            'categories'    => $categories,

        ]);
    }
}


    

