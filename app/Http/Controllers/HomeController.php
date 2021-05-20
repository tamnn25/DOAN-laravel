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
    public function shop(){
        //
        // dd(123);
        $data = [];
        $products = Product::all();
        $data['products'] = $products;
        return view('home.shop',$data);
    }


    
}
