<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // private const RECORD_LIMIT = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [];
        $orders = Order::with(['user','order_detail'])
        ->paginate(Order::RECORD_LIMIT);

        //dd($orders);
        $data['orders'] = $orders;

    return view('admin.orders.index', $data);
    }
    public function show($id){
        $data = [];
        $order = Order::findOrFail($id);
        $data['order'] = $order;

        return view('admin.orders.detail',$data);
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
        $data = [];
        $order = Order::find($id);

        $data['order'] = $order;

        return view('admin.orders.parts.edit',$data);

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
        DB::beginTransaction();
        try{
            $order = Order::find($id);
            $order->status = $request->status;
            $order->save();
            DB::commit();
            return redirect()->route('admin.order.index')->with('success', 'update status successfully');
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
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
        DB::beginTransaction();
        try{
            $orders = Order::find($id);
            $orders -> delete();

            DB::commit();
            
            return redirect()->route('admin.order.index')->with('sucess', 'delete Sucessful.');

        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }
}
