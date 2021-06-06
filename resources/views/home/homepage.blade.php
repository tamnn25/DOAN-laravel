@section('content')
@extends('layouts.master')
@include('layouts.menu_left')



    <section class="categories">

        <div class="container">
            <div class="row">

                <div class="categories__slider owl-carousel">
                   @if (!empty($products))

                        @foreach ($products as $product)

                            <div class="col-lg-3">
                                <div class="categories__item set-bg"  data-setbg="{{$product->image}}">

                                    <h5><a href="{{ route('product.detail', $product->id) }}">{{ $product->category->name }}</a></h5>
                            
                                </div>
                            </div> 

                        @endforeach

                    @endif    
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section Begin -->

    <section class="featured spad">

       @include('home.listproduct')

    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6">

                    <div class="banner__pic">

                        <div class="banner__pic">

                       
                            <div id="m1" class="carousel slide" data-ride="carousel">
    
                                <!-- Indicators -->
                                <ul class="carousel-indicators">
    
                                    <li data-target="#m1" data-slide-to="0" class="active"></li>
    
                                    <li data-target="#m1" data-slide-to="1"></li>
                                    
                                    <li data-target="#m1" data-slide-to="2"></li>
    
                                </ul>
                              
                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="shop/img/banner/1.jpg" alt="Los Angeles">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="shop/img/banner/2.jpg" alt="Chicago">
                                    </div>
                                    <div class="shop/img/banner/3.jpg">
                                        <img src="ny.jpg" alt="New York">
                                    </div>
                                </div>
                              
                             
                              
                            </div>
    
                        </div>
                    </div>
                    {{-- slide chạy trái --}}
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-6">

                    <div class="banner__pic">

                       
                        <div id="demo" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <ul class="carousel-indicators">

                                <li data-target="#demo" data-slide-to="0" class="active"></li>

                                <li data-target="#demo" data-slide-to="1"></li>
                                
                                <li data-target="#demo" data-slide-to="2"></li>

                            </ul>
                          
                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="shop/img/banner/4.jpg" width="100%" height="275px" alt="Los Angeles">
                                </div>
                                <div class="carousel-item">
                                    <img src="shop/img/banner/5.jpg" width="100%" height="275px" alt="Chicago">
                                </div>
                                <div class="shop/img/banner/7.jpg">
                                    <img src="ny.jpg" width="100%"  height="275px" alt="New York">
                                </div>
                            </div>
                          
                       
                          
                        </div>

                    </div>
                        {{-- slide chạy phải --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">

        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                       <div class="latest-product__slider owl-carousel">
                            @for ($i = 1; $i <= 3; $i++)

                                <div  class="latest-prdouct__slider__item">

                                    @if(isset($lasterProduct[$i]))

                                        @foreach ($lasterProduct[$i] as $key => $item)

                                            <a href="{{ route('product.detail',$item['id']) }}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ $item->image }}" alt="" style="width: 110px">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $item->name }}</h6>
                                                    <span>{{ number_format($item->price).  '   VND'  }}</span>
                                                </div>
                                            </a>

                                        @endforeach

                                    @endif

                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @for ($i = 1; $i <= 3; $i++)
                                <div class="latest-prdouct__slider__item">
                                    @if(isset($commentFormat[$i]))

                                        @foreach ($commentFormat[$i] as $key => $item)

                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ $item->product->image }}" style="width: 110px;" alt="">
                                                </div>
                                                 
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $item->product->name }}</h6>
                                                    <span>{{ number_format($item->product->price). '   VND'  }}</span>

                                                   {{-- <div class="product__details__rating" >
                                                            @for ($i = 0; $i < 5; $i++)
                                                                <i
                                                                    class="{{ $item->rate > $i ? 'fa fa-star' : 'fa fa-star-half-o' }}">
                                                                </i>  --}}
                                                                     {{-- $countcomment -> startReview  chỉ đến id sản phẩm   nếu lớn  hơn $id nó sẽ show ra ngược lại ẩn --}}
                                                            {{-- @endfor
                                                    </div> --}}
                                                    {{-- <span>{{ $item->product->price.'.000.VND' }}</span> --}}
                                                </div>
                                                   
                                            </a>
                                        @endforeach
                                    @endif
                                
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @for ($i = 1; $i <= 3; $i++)
                                <div class=" latest-prdouct__slider__item ">
                                    @if(isset($commentFormat[$i]))

                                        @foreach ($commentFormat[$i] as $key => $item)

                                            <a href="{{ route('product.detail',$item->product->id) }}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ $item->product->image }}" style="width: 110px" alt="">
                                                </div>
                                                <div class=" latest-product__item__text  " >
                                                    <h6>{{ $item->product->name }}</h6>
                                                    <span>{{ number_format($item->product->price ) . '   VND'  }}</span>

                                                    {{-- <div class="product__details__text">
                                                     <span>({{ count($item->product->comments) }} Reviews)</span>
                                                 
                                                    </div> --}}
                                                </div>
                                            </a>
                                        @endforeach
                                    @endif
                                  
                                     
                                </div>
                            @endfor
                         
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="shop/img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="shop/img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="shop/img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- Blog Section End -->
@endsection
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */

</style>

@push('css')

    <link rel="stylesheet" href="{{'shop/css/rating.css' }}">

@endpush
@push('js')

@endpush
   





