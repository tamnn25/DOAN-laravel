@extends('layouts.master')
{{-- set page title --}}
@section('title', $product->name)

@section('content')
<hr>
    <section class="product-detail">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic__item">
                    <img class="product__details__pic__item--large"
                    src="{{ asset($product->image)}}" alt="{{ $product->image }}">
                </div>
                <hr>
                <div class="product__details__pic__slider owl-carousel">

                        @foreach ($product->product_images as $url)

                            <img data-imgbigurl="{{ asset($url->url) }}"
                            src="{{ asset($url->url) }}" alt="" width="250px" height="120px">

                        @endforeach
                </div>
               
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
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">Reviews <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>{{ $product->product_detail->content }}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>{{ $product->product_detail->content }}</p>
                               
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>{{ $product->product_detail->content }}</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<br><br><br> <br><br>

    <section class="categories">

        <div class="container">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
            <div class="row">

                <div class="categories__slider owl-carousel">
                   @if (!empty($related))

                        @foreach ($related as $item)

                            <div class="col-lg-3">
                                <div class="categories__item set-bg"  data-setbg="{{asset( $item->image) }}">

                                    <h5><a href="{{ route('product.detail', $product['id']) }}">{{ $item->name }}</a></h5>
                            
                                </div>
                            </div> 

                        @endforeach

                    @endif    
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    
@endpush

@push('js')
    
@endpush
