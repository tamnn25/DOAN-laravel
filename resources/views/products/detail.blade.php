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
                            <p class="product-comment">
                                <span>Số lượng còn: </span>
                                @if ($product->quantity <= 0)
                                <span class="text-danger">Hết Hàng</span>
                                @else
                                <span>{{ $product->quantity }}</span>
                                @endif
                            </p>
                            <hr>
                            <p class="product-price">{{ number_format($product->price). '.000.VND' }}</p>
                            <hr>
                            <p>
                                <div class="product__details__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="number" name="quantity" required value="1" max="{{ $product->quantity }}">
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
                                {{-- <p>{{ $product->product_detail->content }}</p> --}}
                                <form action="{{ route('product.detail',$product->id) }}" method="get" enctype="multipart/form-data" >
                                    <input type="radio" id="vehicle1" name="status" value="0">
                                    &nbsp;<label for="vehicle1">chưa hài lòng</label>
                                    <br>
                                    <input type="radio" id="vehicle1" name="status" value="1">
                                     &nbsp;<label for="vehicle1">hài lòng</label>
                                    <br>
                                    
                                    <label for="comment">Comment:</label>
                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                    <br>
                                    <label for="comment">đính kèm ảnh:</label>
                                    <input id="my-input" class="form-control" type="file" name="" >     
                                    <br>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                                <br>
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <th>Bài đánh giá</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>coment ádkashdkashdkashkdhaskdhaskhdjasjdhjashdkjashdjksahdjksahdjkhjk
                                                ádasdas
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            <td>coment ádkashdkashdkashkdhaskdhaskhdjasjdhjashdkjashdjksahdjksahdjkhjk
                                                ádasdas
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
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
