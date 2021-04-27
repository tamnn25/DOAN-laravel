<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request)
    {
        $id = $request->id;
        $sessionAll =  Session::all();
        $carts = empty($sessionAll['carts']) ? [] : $sessionAll['carts'];  
        
        $product = Product::findOrFail($id);

        $newProduct = [
             'id' => $id,
             'name' => $product->name,
             'quantity' => $product->price,
             'quantity' => 1,
        ];
        $carts[$id] = $newProduct;
        
        session(['carts'=> $carts]);
        if ($carts) {
            return response()->json([
                'status' => 'ok',
                'carts' => $carts,
                'message' => 'add product   in to Cart  success fully!'
            ]);
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCartInfor()
    {
        // $data['carts'] = session()->get('carts');
        // dd($data);


        $sessionAll = Session::all();
        $carts = empty($sessionAll['carts']) ? [] : $sessionAll['carts'];
        $data['carts'] = $carts;

        $dataCart = [];
        if (!empty($carts)) {
            // create list product id
            $listProductId = [];
            foreach ($carts as $cart) {
                $listProductId[] = $cart['id'];
            }

            // get data product from list product id
            $dataCart = Product::whereIn('id', $listProductId)
                ->get();
        }
        dd( $data);
        $data['products'] = $dataCart;
        return view('carts.cart', $data);
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
    public function show($id)
    {
        //
    }

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
}
