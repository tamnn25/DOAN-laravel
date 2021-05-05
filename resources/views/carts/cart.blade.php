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
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach ($carts as $key => $product)
                    <tbody>
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="product-name">
                                    {{ $product['name'] }}
                                </div>
                            </td>
                            <td>
                                <div class="product-thumbnail">
                                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="img-fluid" style="width: 240px; height: auto;">
                                </div>
                            </td>
                            <td>
                                <div class="product-quantity">
                                    <input type="button" value="-" onclick="minus({{ $product['id'] }})">
                                    <input type="button" value="+" onclick="plus({{ $product['id'] }})">
                                      <span id="quantityProduct{{ $product['id'] }}">
                                           {{ $product['quantity'] }}
                                     </span>
                                     <span id="quantityProduct{{ $product['id'] }}">
                                           {{ $product['quantity'] }}
                                     </span>
                                    
                                </div>
                            </td>
                            <td>
                                <div class="product-price">
                                        {{ number_format($product['price']) }}
                                </div>
                            </td>
                            <td>
                                <div class="cart-money">
                                  
                                    <span id="totalCart{{ $product['id'] }}">
                                        {{ number_format($product['quantity'] * $product['price']) . ' VND' }}
                                    </span>
                                    {{-- <span id="totalCart{{ $product['id'] }}">
                                        {{ number_format($product['quantity'] * $product['price']) . ' VND' }}
                                    </span> --}}
                                </div>
                            </td>
                            <td>
                                <div class="delete" >
                                    <a href="" wire:click.prevent="destroy({{ $product['id'] }})" class="btn btn-danger">
                                      
                                      <i class="fas fa-trash-alt fa-2x"></i>                                    </a>
                                </div>
                            </td>
                            {{-- <td><a name="" id="" class="btn btn-primary" href="#" role="button"><i class="fas fa-trash">Delete</i></a></td> --}}
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
@section('scripts')
    <script>
            function minus(paramIid) {
                $.ajax({
                    type: "POST",
                    url: `{{ route('cart.minus') }}`,
                    data: {id: paramIid},
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if(response.status === 'ok'){
                            $(`#quantityProduct${response.carts.id}`).text(response.carts.quantity)
                            console.log(123123);
                            console.log(response.total);
                            $(`#totalCart${response.carts.id}`).text(response.total + " VND ")
                            
                        }
                        console.log(response.carts.quantity);
                    }
                });
            }
            function plus(paramIid) {
                $.ajax({
                    type: "POST",
                    url: `{{ route('cart.plus') }}`,
                    data: {id: paramIid},
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if(response.status === 'ok'){
                            $(`#quantityProduct${response.carts.id}`).text(response.carts.quantity)
                            console.log('ok');
                            console.log(response.total);
                            $(`#totalCart${response.carts.id}`).text(response.total + " VND")
                        }
                        console.log(response.carts.quantity);
                    }
                });
            }
        
        
    </script>
@endsection   