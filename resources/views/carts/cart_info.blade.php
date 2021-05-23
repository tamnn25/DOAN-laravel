
@extends('layouts.master')

{{-- set page title --}}
@section('title', 'Cart Page')
@section('content')
    <section class="list-product">
        @if(!empty($products))
            <table class="table table-bordered table-hover" id="tbl-list-product">
                <thead>
                    <tr>
                        {{-- <th>#</th> --}}
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
                        <td class="shoping__cart__item">
                            <img src="{{ $product->image }}" width="150px" alt=" {{ $product->name }}">

                        </td>
                        <td class="shoping__cart__name">
                            <h5> {{ $product->name }}</h5>
                        </td>
                        <td class="shoping__cart__quantity">
                            <div class="quantity">
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
               <button  type="button" class="btn btn-warning" data-bs-toggle="modal"
               data-bs-target="#modal-send-code">PROCEED TO CHECKOUT</button>
           
           </div>
           <div class="float-right mt-4" style="">
               <div class="shoping__cart__btns">
                   <a href="{{ route('index') }}"  class="btn btn-dark" >CONTINUE SHOPPING</a>
                   {{-- <a href="#" class="btn btn-danger cart-btn cart-btn-right"><span class="icon_loading"></span>
                       Upadate Cart</a> --}}
               </div>
           </div>
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