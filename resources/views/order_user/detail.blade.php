@extends('layouts.master')

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

    <hr><br> <br>
    <h4>Order details</h4>
    <br>
    {{-- show message --}}
    @include('errors.error')

    {{-- display form orderDetail --}}
    
    <table id="category-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>product Name</th>
                <th>Image</th>
                <th>quantity</th>
                <th>price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->order_detail as $key => $order)
                <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="/{{$order->product->image}}" width="150px" alt=""></td>
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price_id}} VND</td>
                    <td>{{$order->total}} VND</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <h4 class="table-striped" style="float: right;"><b>TOTAL BILL:</b> {{ number_format($total) . ' VND' }}</h4>
    <hr>
    <br>

    <button class="btn btn-info"><a href="{{route('order_user.list_order')}}">BACK</a></button>
@endsection