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
                {{-- @if (!empty($product->product_images)) --}}
                    <ul class="row list-product-image">
                        @foreach ($product->product_images as $url)
                            <li class="col-4">
                                <div class="product-image-group">
                                    <img src="{{ asset($url->url) }}" alt="image" class="img-fluid">
                                    {{-- <input type="hidden" name="url[]" value="{{ $url->url }}"> --}}
                                    {{-- <button type="button" class="btn btn-danger form-control mt-1" onclick="$(this).closest('li').remove()">Remove Image</button> --}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                {{-- @endif --}}
                <hr>
            </div>

            <div class="col-6">
                
                <hr>
                <div class="col-6">
                    <div class="product-description">
                        <form action="{{ route('cart.add-cart', $product->id) }}" method="POST">
                            @csrf
                            <h4>{{ $product->name }}</h4>
                            <hr>
                            <p class="product-comment">
                                <span>{{ $product->description }}</span>
                            </p>
                            <hr>
                            <p class="product-price">{{ number_format($product->price) }} VND</p>
                            <hr>
                            <p class="product-quantity">
                                <label>Quantity</label>
                                <span><input type="number" name="quantity" required></span>
                            </p>
                            <p>
                                <button type="submit">Add Cart</button>
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