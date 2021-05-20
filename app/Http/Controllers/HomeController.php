<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $products   = Product::all();
        $categories = Category::all();
        $orders     = OrderDetail::select(\DB::raw('count(product_id) as count'),'product_id')
                            ->with('product')
                            ->orderBy('count', 'desc')
                            ->groupBy('product_id')
                            ->limit(9)
                            ->get();
        $productLimit   = Product::orderBy('created_at', 'desc')->limit(9)->get();
        
        $lasterProduct  = $this->formatDataProduct($productLimit);

        return view('home.homepage')->with([
            'lasterProduct' => $lasterProduct,
            // 'radeOrder'     => $radeOrder,
            'products'      => $products,
            'categories'    => $categories,
        ]);
        
    }
    public function shop(){
        //
        // dd(123);
        $categories = Category::all();
        $products = Product::all();
        $productLimit   = Product::orderBy('created_at', 'desc')->limit(9)->get();
        $lasterProduct  = $this->formatDataProduct($productLimit);
        return view('home.shop')->with([
            'lasterProduct' => $lasterProduct,
            'products'      => $products,
            'categories'    => $categories,

        ]);
    }

     public function searchProduct(Request $request)
    {
        
        $key = $request->key;
        $products = Product::where('name', 'like', '%'. $key . '%')->paginate(10);
        return view('home.shop', compact('products'));
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
