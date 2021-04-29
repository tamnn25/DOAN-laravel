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
             'images' =>$product->images,
             'price' => $product->price,
             'quantity' => 1,
        ];
        if ($carts && isset($carts[$id])) {
            $carts[$id]['quantity']++;
            info($carts[$id]);
            session()->put('carts', $carts);
            return response()->json([
                'status' => 'ok',
                'carts' => $carts,
                'message' => 'add product   in to Cart  success fully!'
            ]);
        }

        $carts[$id] = $newProduct;
        
        session()->put('carts', $carts);
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
    //     $cart = Session::get('cart');

    // foreach ($cartdata->all() as $id => $val) 
    // {
    //     if ($val > 0) {
    //         $cart[$id]['qty'] += $val;
    //     } else {
    //         unset($cart[$id]);
    //     }
    // }
    // Session::put('cart', $cart);
        $data['carts'] = session()->get('carts');
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

    public function minusCart(Request $request)
    {
        $id = $request->id;
        $carts = session('carts');
        $result = $carts[$id]['quantity']--;
            
        
        // $qty = $carts[$id]['quantity'];
        session()->put('carts', $carts);
        if ($result) {
            info($carts);
            return response()->json([
                'status' => 'ok',
                'carts' => $carts[$id],
                'message' => 'munis product in to Cart  successfully!'
            ]);
        }
        return response()->json([
            'status' => 'ok',
            'carts' => $result,
            'message' => 'munis product in to Cart  faiel!'
        ]);
    }

    public function plusCart(Request $request)
    {
        $id = $request->id;
        $carts = session('carts');
        $result = $carts[$id]['quantity']++;
        session()->put('carts', $carts);
        if ($result) {
            info($carts);
            return response()->json([
                'status' => 'ok',
                'carts' => $carts[$id],
                'message' => 'munis product in to Cart  successfully!'
            ]);
        }
        return response()->json([
            'status' => 'ok',
            'carts' => $result,
            'message' => 'munis product in to Cart  faiel!'
        ]);
    }


    public  function updateCart(){
        if ()
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}