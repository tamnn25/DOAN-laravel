@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Detail Order')

{{-- set breadcrumbName --}}

@section('breadcrumbName', 'Order Detail')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Detail Order')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/orders/order-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="/backend/js/orders/order-list.js"></script>
@endpush

@section('content')
    {{-- show message --}}
    @include('errors.error')

    {{-- display form orderDetail --}}
    
    <table id="category-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>product Name</th>
                <th>Product_id</th>
                <th>order_id</th>
                <th>quantity</th>
                <th>price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->order_detail as $key => $order)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->product_id}}</td>
                    <td>{{$order->order_id}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price_id}}</td>
                    <td>{{$order->total}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection