<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $products = Product::all();
        $categories = Category::all();
        $product_images = ProductImage::all();
        // $categories = Category::where('parent_id', 0)->get();

        // dd($products);

        return view('home.homepage')->with([
            'products' => $products,
            'categories' => $categories,
            'product_images' =>$product_images,
        ]);

        // return view('home.homepage');
    }


    
}
