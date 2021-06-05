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
            $products       =   Product::leftjoin('product_promotion', 'product_promotion.product_id', '=', 'products.id')
                            ->select('products.*', \DB::raw('product_promotion.id as product_promotion_id'), 'product_promotion.discount')    
                            ->get();
            $promotions      =   Promotion::with('products')->orderBy('id', 'desc')->get();
            $categories     =   Category::get();
            // $product = Product::find();
            //     dd(count($product->comments));
            // -----------------------------------------
                $comment        =  Comment::with('product')->get();
                // $countcomment   = new Comment();
                // dd($comment);
            // formatcommentProduct
            // -----------------    get  dữ liệu khách hàng  đánh giá ra ngoài home-----------------------

            // -------------------------
                   $productLimit   =   Product::orderBy('created_at', 'desc')->limit(12)->get();
            // sản phẩm  mới cập nhập   

            $lasterProduct  = $this->formatDataProduct($productLimit);
            // lasterProduct sản phẩm được  xếp hạng cao nhất

            $commentFormat  = $this->formatDataProduct($comment);
            // commentFor sản phẩm được review nhiều nhất



            return view('home.homepage')->with([
                'promotions'      => $promotions,
                'lasterProduct'  => $lasterProduct,
                'products'       => $products,
                'categories'     => $categories,
                'commentFormat'  => $commentFormat,
                // 'countcomment'   => $countcomment,

            ]);
    }

    // public function getProductByCategory($id)
    // {
    //     $products   = Product::where('category_id', $id)->limit(8)->get();
    //     $view = view("home._ajax_product", compact('products'))->render();//gán lại $product với category_id đã chọn
    //     return response()->json(['status' => 'success','html' => $view]);
    // }

    public function shop($id){
        $categories = Category::all();

        $select = [
            'products.*', 
            'product_promotion.discount',
            \DB::raw('product_promotion.id as product_promotion_id')
        ];
        $product = Product::where('products.id', $id)
                        ->leftjoin('product_promotion', 'product_promotion.product_id', '=', 'products.id')
                        // leftjoin lấy all dữ liệu left product j
                        ->with('product_images')
                        ->with('product_detail')
                        ->select($select)   
                        ->first();


        $products   = ($id == 0) ? Product::paginate(9) : Product::where('category_id', $id)->paginate(9);
        //  nếu  sản phẩm   tìm kiếm  ko có sản phẩm  thì show ra ko có và ngược lại

        // ------------------------------------------------
        $productLimit   = Product::orderBy('created_at', 'desc')->limit(12)
        ->get();
        $lasterProduct  = $this->formatDataProduct($productLimit);
        // show thoong tin sản phẩm mới được thêm vào


        // -------------------------------------
        $promotion      =   Promotion::with(['product_promotion'])->get();
        //  promotion giảm giá sản phẩm theo %

        return view('home.shop')->with([
            'lasterProduct' => $lasterProduct,
            'products'      => $products,
            'categories'    => $categories,
            'promotion'     => $promotion,
        ]);
    }

    public function formatDataProduct($products)
    {
        // hàm for  chạy id sản phẩm mới thêm id từ 1 ->3  và lắp lại 

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
        // hàm for  chạy  sản phẩm dc đánh giá cao nhất id từ 1 ->3  và lắp lại 

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
    

