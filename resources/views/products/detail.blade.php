@extends('layouts.master')
{{-- set page title --}}
@section('title', $product->name)

@section('content')
<hr>
    <section class="product-detail">
        <div class="row">

            <div class="col-6">
                <div class="product-thumbnail">
                    <img src="{{ asset($product->image)}}" alt="{{ $product->image }}">
                </div>
                <hr>
                <ul class="row list-product-image">
                    @foreach ($product->product_images as $url)
                        <li class="col-4">
                            <div class="product-image-group">
                                <img src="{{ asset($url->url) }}" alt="image" class="img-fluid">
                                    
                            </div>
                        </li>
                    @endforeach
                </ul>
                <hr>
            </div>


            <div class="col-6">
                
                <hr>
                <div class="col-6">
                    <div class="product-description">
                        <form action="{{ route('cart.add-cart', $product->id) }}" method="POST">
                            @csrf
                            <h3><strong>{{ $product->name }}</strong></h3>
                            <hr>
                            <p class="product-comment">
                                <span>{{ $product->description }}</span>
                            </p>
                            <hr>
                            <p class="product-price">{{ number_format($product->price) }} VND</p>
                            <hr>

                            <p class="product-quantity">
                                {{-- <label>Quantity</label>
                                <span><input type="number" name="quantity" required></span> --}}
                                <div class="product__details__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="quantity" required value="1">
                                        </div>
                                    </div>
                                </div>
                            </p>
                            <p>
                                <button type="submit"class="primary-btn">  ADD TO CARD</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    
@endpush

@push('js')
    
@endpush
{{-- @section('scripts')
    <script>
        function addCart(paramIid) {
            $.ajax({
                type: "POST",
                url: `{{ route('cart.add-cart') }}`,
                data: {id: paramIid},
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (response) {
                    console.log(response);
                }
            });
        }
    </script>
@endsection  --}}