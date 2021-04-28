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
    public function addCart( Request $request)
    {
        $id = $request->id;
        $sessionAll =  Session::all();
        $carts = empty($sessionAll['carts']) ? [] : $sessionAll['carts'];  
        
        $product = Product::findOrFail($id);

        $newProduct = [
             'id' => $id,
             'name' => $product->name,
             'quantity' => $product->price,
            //  'quantity' =>  $product ->quantity +=1,
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
        $data['products'] = $dataCart;

        // dd( $data);
              return view ('carts.cart', $data);
        //
    }

    public function checkout(){
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
        $data['products'] = $dataCart;
        return view('carts.checkout',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}