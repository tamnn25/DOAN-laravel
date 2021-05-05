<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $qty = $request->quantity;
        $sessionAll =  Session::all();
        $carts = empty($sessionAll['carts']) ? [] : $sessionAll['carts'];  
        
        $product = Product::findOrFail($id);

        $newProduct = [
             'id' => $id,
             'name' => $product->name,
             'image' =>$product->image,
             'price' => $product->price,
             'quantity' => $qty,
        ];
        if ($carts && isset($carts[$id])) {
            $carts[$id]['quantity'] += $qty;
            session()->put('carts', $carts);
            return redirect()->route('cart.cart-info');
        }

        $carts[$id] = $newProduct;
        
        session()->put('carts', $carts);
        if ($carts) {
            return redirect()->route('cart.cart-info');
        }
        return redirect()->back();
        // bị chi đâu cái giảm xuống á
    }

    public function addCartAjax(Request $request)
    {
        $id = $request->id;
        $sessionAll =  Session::all();
        $carts = empty($sessionAll['carts']) ? [] : $sessionAll['carts'];  
        
        $product = Product::findOrFail($id);

        $newProduct = [
             'id' => $id,
             'name' => $product->name,
             'image' =>$product->image,
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
    //   
        $data['carts'] = session()->get('carts');
        // dd($data);
        // session()->forget('carts');

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
        session()->put('carts', $carts);
        $cartNew = session('carts');
        $total = $cartNew[$id]['quantity']*$cartNew[$id]['price'];
        if ($result) {
            info($carts);
            return response()->json([
                'status' => 'ok',
                'carts' => $carts[$id],
                'total' =>number_format($total),
                'message' => 'munis product in to Cart  successfully!'
            ]);
        }
        return response()->json([
            'status' => 'ok',
            'carts' => $result,
            'message' => 'munis product in to Cart  faiel!'
        ]);
    }
    // ngon chưa 
    // ok đó  chừ lam cái list nữa :#
    public function plusCart(Request $request)
    {
        $id = $request->id;
        $carts = session('carts');
        $result = $carts[$id]['quantity']++;
        session()->put('carts', $carts);
        $cartNew = session('carts');
        $total = $cartNew[$id]['quantity']*$cartNew[$id]['price'];
        if ($result) {
            info($carts);
            return response()->json([
                'status' => 'ok',
                'carts' => $carts[$id],
                'total' => number_format($total),
                'message' => 'munis product in to Cart  successfully!'
            ]);
        }
        return response()->json([
            'status' => 'ok',
            'carts' => $result,
            'message' => 'munis product in to Cart  faiel!'
        ]);
    }

    // public function destroy($id)
    // {
    //     // Method: DELETE
    //   Cart::remove($id);
    //   session()->flash('success','product has been removed');
    // }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}