<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request){

        $products = Product::all();
        // $product = Product::with('category');

        $categories = Category::get();
        $product_images = ProductImage::all();
        // if (!empty($request->name)) {
        //     $products = $product->where('name', 'like', '%' . $request->name . '%');
        // }

        // if (!empty($request->category_id)) {
        //     $products = $products->where('category_id', $request->category_id);
        // }

        // $product = $product->orderBy('id', 'desc');
        // $categories = Category::pluck('name');

        // $products = $products->orderBy('id', 'desc');

        // $categories = Category::where('parent_id', 0)->get();

        // dd($products);
        // $data['categories'] = $categories;
        // $data['products'] = $product;

        return view('home.homepage')->with([
            'products' => $products,
            'categories' => $categories,
            'product_images' =>$product_images,
        ]);

        // return view('home.homepage');
    }


    
}
