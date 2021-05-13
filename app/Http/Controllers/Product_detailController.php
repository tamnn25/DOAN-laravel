<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class Product_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data= [];
        $product = Product::get();
        
        $data['product'] = $product;
        return view('shop-list.shop-product',$data);
    }
    
    public function show($id)
    {
        $data = [];
        $product = Product::whereId($id)->with('product_images')->with('product_detail')->first();
        
        $data['products'] = $product ;
        return view('shop-list.shop_detail',$data);

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function searchProductByCategory(Request $request)
    // {
    //     $key = $request->key;
    //     $product = Product::where('name', 'like', '%' . $key . '%');
    //     $request->category_id ? $product->where('category_id', $request->category_id)->get() :  $product->get();
    //     return redirect('shop-list.shop-product', compact('product'));
    // }
}
