<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\Price;

class ProductController extends Controller
{
    //
    public function detail($id, Request $request){
        $data = [];

        $product = Product::whereId($id)
        ->with('product_images')
        ->with('product_detail')
        ->first();
        
        $data['product'] = $product;

        // display create sucess
        return view('products.detail', $data);
    }
    public function searchProduct(Request $request)
    {
        $key = $request->key;
        $products = Product::where('name', 'like', '%'. $key . '%')
        ->paginate(3);
        return view('home.shop', compact('products'));
        // đổ dữ liêu jra thôi 
    }

    
}
