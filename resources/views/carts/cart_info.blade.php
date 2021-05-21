
@extends('layouts.master')

@section('title', 'Cart Page')
@section('content')
    <section class="list-product">
        @if (!empty($products))
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
                        <td class="shoping__cart__price">
                            {{ number_format($product->price) }}
                        </td>
                        <td class="shoping__cart__total">
                            @php
                                $money = $carts[$product->id]['quantity'] * $product->price;
                                echo number_format($money) . ' VND';
                            @endphp
                        </td>
                        {{-- <td class="shoping__cart__carttotal">
                            @php
                                $carttotal = $money  $money;
                                echo number_format($carttotal) . 'VND';
                            @endphp
                        </td > --}}
                        <td class="shoping__cart__item__close">
                          <button >
                            <span class="icon_close"></span>
                          </button>
                        </td>
                    </tr>
                
                </tbody>
            @endforeach
        </table>
        <div>
            <div class="float-left mt-4 " >
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
    @include('carts.part.modal_send_code')
@endsection

{{-- /**
* define CSS use INTERNAL (noi no o tung page)
* (khai bao la css va qua moi page thi` dung @push('css'))
*/ --}}
@push('css')
    <link rel="stylesheet" href="{{ asset('css/carts/cart-info.css') }}">
@endpush

{{-- /**
* define JS use INTERNAL (noi no o tung page)
* (khai bao la css va qua moi page thi` dung @push('js'))
*/ --}}
@push('js')
    <script>
        const URL_CHECKOUT = "{{ route('cart.checkout') }}";
    </script>
    <script src="{{ asset('js/carts/cart-info.js') }}"></script>
@endpush