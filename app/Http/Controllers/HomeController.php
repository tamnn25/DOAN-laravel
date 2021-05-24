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
        $products   = Product::paginate(5);
        $categories = Category::get();
        $productLimit   = Product::orderBy('created_at', 'desc')->limit(9)->get();
        $lasterProduct  = $this->formatDataProduct($productLimit);
        return view('home.homepage')->with([
            'lasterProduct' => $lasterProduct,
            'products'      => $products,
            'categories'    => $categories,
        ]);
        
    }
    public function shop($id){
        $categories = Category::all();

        $products   = ($id == 0) ? Product::paginate(9) : Product::where('category_id', $id)->paginate(9);
        $productLimit   = Product::orderBy('created_at', 'desc')->limit(9)
        ->get();
        $lasterProduct  = $this->formatDataProduct($productLimit);
        return view('home.shop')->with([
            'lasterProduct' => $lasterProduct,
            'products'      => $products,
            'categories'    => $categories,
        ]);
    }

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

    //  public function searchProduct(Request $request)
    // {
        
    //     $key = $request->key;
    //     $products = Product::where('name', 'like', '%'. $key . '%')->paginate(10);
    //     return view('home.shop', compact('products'));
    // }
    /**
     * formatDataProduct
     *
     *  @param Product $products
     *
     * @return mixed
     */
   

    
}
    

