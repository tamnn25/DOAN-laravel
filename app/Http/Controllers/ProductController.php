<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::all();


        $product = Product::whereId($id)
        ->with('product_images')
        ->with('product_detail')
        ->first();
        
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
        // dd(22);
        $productLimit   = Product::orderBy('created_at', 'desc')->limit(9)
        ->get();
        $products = Product::where('name', 'like', '%'. $key . '%')->paginate(10);

        $lasterProduct  = $this->formatDataProduct($productLimit);
        // dd($lasterProduct);
        // return view('home.listproductsearch', compact('products','categories'));
        return view('home.listproductsearch', with([
            'products'=>$products,
            'categories' => $categories,
            'lasterProduct' => $lasterProduct,

        ]));

        // đổ dữ liêu jra thôi 
    }
  
    /**
     * formatDataProduct
     *
     *  @param Product $products
     *
     * @return mixed
     */
    public function formatDataProduct($products)
    {
        $productFormat = [];
        for ($i=1; $i <= 3; $i++) { 
            foreach ($products as $key => $value) {
                if ($key+1 <= $i*3 && $key >= ($i-1)*3) {
                    $productFormat[$i][$key] = $value;
                }
            }
        }
        return $productFormat;
    }
}
