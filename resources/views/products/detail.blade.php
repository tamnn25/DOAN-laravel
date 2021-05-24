@extends('layouts.master')
{{-- set page title --}}
@section('title', $product->name)

@section('content')
<hr>
    <section class="product-detail">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <div class="product-thumbnail">
                    <img src="{{ asset($product->image)}}" alt="{{ $product->image }}">
                </div>
                <hr>
                <div class="product__details__pic__slider owl-carousel">
                        @foreach ($product->product_images as $url)
                            <img src="{{ asset($url->url) }}" alt="image" class="img-fluid" style="width:290px; height:150px;">
                        @endforeach
                </div>
                
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
                            <p class="product-price">{{ number_format($product->price). '.000.VND' }}</p>
                            <hr>
                            <p>
                                <div class="product__details__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="quantity" required value="1">
                                        </div>
                                    </div>
                                </div>
                                
                                <button class="btn btn-outline-success" type="submit">Add Cart</button>
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