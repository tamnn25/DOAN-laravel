<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data = [];
        
        $orders = Order::with('order_detail')
        ->with('user')
        ->get();
        
        $data['orders'] = $orders;
        // dd($orders);
        return view('admin.orders.index', $data);
    }
    public function show($id){
        $data = [];
        $order = Order::with('order_detail')->first();
        //dd($order);
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
        // dd($id);
        \DB::beginTransaction();
        try{
            $orders = Order::with('order_detail')
            ->find($id);
            
            //delete order_detail
            foreach ($orders->order_detail as $orderDetail) {
                $orderDetail->delete();
            }
            
            $orders->delete();

            \DB::commit();
            
            return redirect()->route('admin.order.index')->with('sucess', 'delete Sucessful.');

        }catch(Exception $ex){
            \DB::rollback();

            echo $ex->getMessage();
        }
    }
}
