
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
                                    {{ number_format($product->price).'.000.VND' }}
                                </div>
                            </td>
                            <td>
                                <div class="cart-money">
                                    @php
                                        $money = $carts[$product->id]['quantity'] * $product->price;
                                        echo number_format($money) . '.000. VND';
                                    @endphp
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>

            <div class="mt-2" style="float:right; margin-left:10px;">
                {{-- tiến hành thanh toán --}}
               <button  type="button" class="btn btn-outline-success" data-bs-toggle="modal"
               data-bs-target="#modal-send-code">PROCEED TO CHECKOUT</button>
           </div>
      
           <div class="float-right mt-2" style="float:left;">
               <div class="shoping__cart__btns">
                   <a class="btn btn-outline-warning" href="{{ route('index') }}"   >CONTINUE SHOPPING</a>
                
               </div>
           </div>
           <br>
           <br>
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