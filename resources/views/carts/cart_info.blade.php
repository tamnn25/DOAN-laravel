
@extends('layouts.master')

{{-- set page title --}}
@section('title', 'Cart Page')
@section('content')
    <section class="list-product">
        {{-- @if ($sessionAll['carts']::count()>=1); --}}
            
            @if(!empty($carts))
                <table class="table table-bordered table-hover" id="tbl-list-product">
                    <thead class="thead-dark">
                        <tr>
                            {{-- <th>#</th> --}}
                            <th>Product Name</th>
                            <th>product</th>

                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Money</th>
                            <th colspan="3">Delete</th>
                        </tr>
                    </thead>
                    @foreach ($carts as $key => $cart)
                    <tbody>
                        <tr>
                            <td class="shoping__cart__item">
                                <img src="{{ $cart['image'] }}" width="150px" alt=" {{  $cart['name'] }}">

                            </td>
                            <td class="shoping__cart__name">
                                <h5> {{ $cart['name'] }}</h5>
                            </td>
                            <td class="shoping__cart__quantity">
                                <div class="quantity">
                                        {{ number_format($cart['quantity']) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="product-price">
                                        {{ number_format( $cart['price']).'.000.VND' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-money">
                                        @php
                                            $money = $cart['quantity'] * $cart['price'];
                                            echo number_format($money) . '.000. VND';
                                        @endphp
                                    </div>
                                </td>
                        <td>
                            <form action="{{ route('cart.destroy',['id' => $cart['id']]) }}" method="post">
                                @csrf
                                <button  value="Delete" style="    border: none;
                                background-color: white;" ><i class="fas fa-calendar-times fa-2x" style="color:rgb(206, 17, 17);"></i></button>
                            </form>
                           
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
                        <a class="btn btn-outline-warning" href="{{ route('index') }}">CONTINUE SHOPPING</a>
                    </div>
                </div>
                <div class="float-right mt-2" style="float:left;">
                   
                </div>
            <br>
            <br>
            </div>
            
        
                @endif
        {{-- @else
            Giỏ hàng rổng
        @endif --}}

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