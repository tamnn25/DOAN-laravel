@extends('admin.layouts.master')

    @section('content')
        <h1>Update Status</h1>
        <form action="{{ route('admin.order.update', $order->id) }}" method="post">
                @csrf
                @method('PUT')
            <label for="vehicle1">Đã thanh toán online</label>
            <input type="checkbox" id="vehicle1" name="status" value="1">
            <br>
            <label for="vehicle1"> shipper đang đi giao hàng</label>
            <input type="checkbox" id="vehicle2" name="status" value="2"><br>
            <label for="vehicle2"> cancel đơn hàng</label>
            <input type="checkbox" id="vehicle3" name="status" value="3"><br>
            <label for="vehicle3"> hoàn thành</label>
            <input type="checkbox" id="vehicle3" name="status" value="4"> <br><br>
            <input type="submit" value="Submit">
        </form>
    @endsection  
