<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    //
    public function index(){
            $products       =   Product::with('productPromotion')->get();
            $promotion      =   Promotion::get();
            $categories     =   Category::get();
            $comment        =  Comment::with('product')->get();
            $countcomment   = new Comment();

            $productLimit   =   Product::orderBy('created_at', 'desc')->limit(12)->get();

            $lasterProduct  = $this->formatDataProduct($productLimit);

            $commentFormat  = $this->formatDataProduct($comment);

            return view('home.homepage')->with([
                'promotion'      =>$promotion,
                'lasterProduct'  => $lasterProduct,
                'products'       => $products,
                'categories'     => $categories,
                'commentFormat'  => $commentFormat,
                'countcomment' => $countcomment,

            ]);
    }
    public function shop($id){
        $categories = Category::all();

        $products   = ($id == 0) ? Product::paginate(9) : Product::where('category_id', $id)->paginate(9);

        $productLimit   = Product::orderBy('created_at', 'desc')->limit(9)
        ->get();

        $lasterProduct  = $this->formatDataProduct($productLimit);

        $promotion      =   Promotion::with(['product_promotion'])->get();

        return view('home.shop')->with([
            'lasterProduct' => $lasterProduct,
            'products'      => $products,
            'categories'    => $categories,
            'promotion'     => $promotion,
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

    public function formatcommentProduct($comment)
    {
        $commentFormat = [];
        for ($i=1; $i <= 3; $i++) { 
            foreach ($comment as $key => $value) {
                if ($key+1 <= $i*3 && $key >= ($i-1)*3) {
                    $commentFormat[$i][$key] = $value;
                }
            }
        }
        return $commentFormat;
    }


    
    /**
     * formatDataProduct
     *
     *  @param Product $products
     *
     * @return mixed
     */
   

    
}
    

