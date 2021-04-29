@extends('layouts_homepage.master')
{{-- @section('title', 'Cart Page') --}}

@section('content')

    <section class="list-product">
        @if (!empty($products))
        <br>
    <hr>
    <h1>Card</h1>
            <table class="table table-bordered table-hover" id="tbl-list-product">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Thumbanil</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                @foreach ($products as $key => $product)
                    <tbody>
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="product-name">
                                    {{ $product->name }}
                                </div>
                            </td>
                            <td>
                                <div class="product-thumbnail">
                                    <img src="{{asset('storage/products/'.$product->images) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 240px; height: auto;">
                                </div>
                            </td>
                            <td>
                                <div class="product-quantity">
                                    {{ number_format($carts[$product->id]['quantity']) }}
                                </div>
                            </td>
                            <td>
                                <div class="product-price">
                                    {{ number_format($product->price) }}
                                </div>
                            </td>
                            <td>
                                <div class="cart-money">
                                    @php
                                        $money = $carts[$product->id]['quantity'] * $product->price;
                                        echo number_format($money) . ' VND';
                                    @endphp
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <a name="pay" id="" class="btn btn-primary" href="{{ route('cart.checkout') }}" role="button">Checkout</a>
        @endif
    </section>
@endsection

{{-- @push('css')
    <link rel="stylesheet" href="{{ asset('css/cart-info.css') }}">
@endpush --}}

{{-- @push('js') --}}
    
{{-- @endpush --}}