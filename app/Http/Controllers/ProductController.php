<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\ProductDetail;
use App\Models\ProductImage;

class ProductController extends Controller
{
    //
    public function detail($id, Request $request){
        $data = [];
        $categories = Category::all();

        $product = Product::whereId($id)->with('product_images')->with('product_detail')->first();
        
        $data['product'] = $product;
        $data['categories'] = $categories;

        // dd($product);

        // display create sucess
        return view('products.detail', $data);
    }

    public function searchProduct(Request $request)
    {
        $key = $request->key;
        $categories = Category::all();

        $products = Product::where('name', 'like', '%'. $key . '%')->paginate(10);
        return view('home.listproductsearch', compact('products','categories'));
        // đổ dữ liêu jra thôi 
    }
}
