@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Detail Order')

{{-- set breadcrumbName --}}

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/css/orders/order-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="/js/orders/order-list.js"></script>
@endpush

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">List Orders</li>
        <li class="breadcrumb-item active" aria-current="page">Detail Orders</li>
    </ol>
</nav>
    {{-- show message --}}
    @include('errors.error')

    {{-- display form orderDetail --}}
    
    <table id="category-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>product Name</th>
                <th>Image</th>
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
                    <td><img src="\{{$order->product->image}}" alt="{{$order->product->name}}" style="width: 150px; height: auto;"></td>
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