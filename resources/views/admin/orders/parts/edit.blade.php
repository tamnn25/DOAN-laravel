@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Update Order Status')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/css/orders/order-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="/js/orders/order-list.js"></script>
@endpush
    @section('content')
        <h1>Update Status</h1>
        <form action="{{ route('admin.order.update', $order->id) }}" method="post">
                @csrf
                @method('PUT')

            <input type="radio" id="vehicle1" name="status" value="1">
            <h5><label for="vehicle1">chưa thanh toán</label></h5>
            <br>
            <input type="radio" id="vehicle1" name="status" value="2">
            <h5><label for="vehicle1">Đã thanh toán online</label></h5>
            <br>
            
            <input type="radio" id="vehicle2" name="status" value="3">
            <h5><label for="vehicle1"> shipper đang đi giao hàng</label></h5>
            <br>
            
            <input type="radio" id="vehicle3" name="status" value="4">
            <h5><label for="vehicle2"> cancel đơn hàng</label></h5>
            <br>
            
            <input type="radio" id="vehicle3" name="status" value="5">
            <h5><label for="vehicle3"> hoàn thành</label></h5>
            <br><br>
            <input type="submit" value="Submit">
        </form>
    @endsection  
