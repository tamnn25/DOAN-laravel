
@extends('layouts.master')

{{-- set page title --}}
@section('title', 'Cart Page')

@section('content')
    <section class="list-product">
        @if(!empty($products))
            <table class="table table-bordered table-hover" id="tbl-list-product">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>product</th>

                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Money</th>
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
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
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

            <div class="mt-2">
                {{-- tiến hành thanh toán --}}
                <button  type="button" class="btn btn-primary" data-bs-toggle="modal"
                 data-bs-target="#modal-send-code">thanh toán</button>
            </div>
        @endif
    </section>
    {{-- import modal --}}
    @include('carts.parts.modal_send_code')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/carts/cart-info.css') }}">
@endpush

@push('js')
    <script>
        const URL_CHECKOUT = "{{ route('cart.checkout') }}";
    </script>
    <script src="{{ asset('js/carts/cart-info.js') }}"></script>
@endpush