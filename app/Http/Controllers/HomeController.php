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
    public function shop( Request $request){
        //
        // dd(123);
        $data = [];
        
        $products = Category::get();
        $products = Product::get();
        //$products = Product::with(['category']);
        // if(!empty($request->category_id)){
        //     $products->$products->where('category_id', '%' . $request->category_id . '%');
        // }
        
        $data['products'] = $products;
        return view('home.shop',$data);
    }


    
}
