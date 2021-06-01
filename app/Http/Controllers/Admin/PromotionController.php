<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\ProductPromotion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PromotionController extends Controller
{
    //

    public function promotion(Request $request)
    {   
        $promotions = Promotion::with([ 'product_promotion']);

        $data = [];
        if (!empty($request->name)) {
            $promotions = $promotions->where('discount', 'like', '%' . $request->name . '%');
        }

        if (!empty($request->name)) {
            $promotions = $promotions->where('begin_date', 'like', '%' . $request->name . '%');
        }
        if (!empty($request->name)) {
            $promotions = $promotions->where('end_date', 'like', '%' . $request->name . '%');
        }

        

        // if (!empty($request->category_id)) {
        //     $promotion = $promotion->where('product_id', $request->product_id);
        // }

        $promotions = $promotions->orderBy('id', 'desc');
        $promotions = $promotions->paginate(4);
        // $data['promotion'] = $promotion;
            // dd($promotion->links());
         return view('admin.promotion.index', compact('promotions'));
    }

    public function create(){
        $data = [];
        
        $promotion = Promotion::get();
        $data['promotion'] = $promotion;

        $products = Product::pluck('name','id')->toArray();
        $data['products'] = $products;



        return view('admin.promotion.create',$data);
    }

    public function store(Request $request){
        // dd($request->all());
        $dataInsert = [
            'discount'        => $request->discount,
            'begin_date'      => $request->begin_date,
            'end_date'        => $request->end_date,
            'status'          => $request->status,

        ];
            DB::beginTransaction();
            try{

                $promotion = Promotion::create($dataInsert);
                foreach ($request->products as $key => $productId) {
                    $product = Product::find($productId);
                    $data = [
                        'product_id'    => $product->id,
                        'promotion_id'  => $promotion->id,
                        'discount'      => $product->price*$request->discount/100,
                    ];
                    ProductPromotion::create($data);
                }
                // $promotion->products()->attach($request->products); //https://chungnguyen.xyz/posts/pivot-tables-va-moi-quan-he-nhieu-nhieu-many-to-many-relationship-trong-laravel
                DB::commit();
                return redirect()->route('admin.promotion.list_promotion');
            } catch (\Exception $e){
                info($e);
                DB::rollback();

                return redirect()->back()->with('error', $e->getMessage());
            }
        // $promotion = Promotion::create();
        
    }
    public function edit($id,Request $request)
    {
        // dd(123);
        $data = [];
        $products = Product::pluck('name','id')->toArray();
        $promotion = Promotion::findOrFail($id); // case 2
        $products = $promotion->products()->get(); // case 2
        // dd($promotion);
        $data['products'] = $products;
        $data['promotion'] = $promotion;
        // dd($promotion);
        return view('admin.promotion.edit',$data);
    }
    // public function update($id,Request $request){
    //     DB::beginTransaction();
    //     try{
    //         $promotions = Promotion::find($id)
    //         $discout =>$request->discount;

    //     }
    // }
}
