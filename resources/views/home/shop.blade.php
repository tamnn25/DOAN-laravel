
@extends('layouts.master')s

    @section('content')
    <body>
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="sidebar">
                            

                            <div class="sidebar__item">
                                <div class="latest-product__text">
                                    <h4>Latest Products</h4>
                                    <div class="latest-product__slider owl-carousel">
                                        @for ($i = 1; $i <= 3; $i++) 
                                            <div class="latest-prdouct__slider__item">
                                                @foreach ($lasterProduct[$i] as $key => $item)

                                                        <a href="#" class="latest-product__item">
                                                            <div class="latest-product__item__pic">
                                                                <img src="{{asset('/'.$item->image ) }}" alt="" style="width: 110px">
                                                            </div>
                                                            <div class="latest-product__item__text">
                                                                <h6>{{ $item->name }}</h6>
                                                                <span>{{ $item->price }}</span>
                                                            </div>
                                                        </a>
                                                @endforeach
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7">
                        <div class="product__discount">
                            <div class="section-title product__discount__title">
                                <h2>Sale Off</h2>
                            </div>
                            <div class="row">
                                <div class="product__discount__slider owl-carousel">
                                    @if ($products)
                                        @foreach ($products as $product)
                                    <div class="col-lg-4">
                                                
                                        
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ asset('/'.$product->image) }}">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                                </div>
                                            <div class="product__discount__item__text">
                                                <span>Dried Fruit</span>
                                                <h5><a href="" style="color: blue">{{ $product->name }}</a></h5>
                                                <div class="product__item__price">{{ $product->price }} <span>$36.00</span></div>
                                            </div>
                                        </div>
                                    </div>      
                                    
                            
                                    @endforeach
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="filter__item">
                            <div class="row">
                                <div class="col-lg-4 col-md-5">
                                    <div class="filter__sort">
                                        <span>Sort By</span>
                                        <select>
                                            <option value="0">Default</option>
                                            <option value="0">Default</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="filter__found">
                                        <h6><span>16</span> Products found</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3">
                                    <div class="filter__option">
                                        <span class="icon_grid-2x2"></span>
                                        <span class="icon_ul"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                    
                            @if($products)
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ asset('/'.$product->image) }}">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="{{ route('product.detail', $product['id']) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                                
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="">{{ $product->name }}</a></h6>
                                            <h5>{{ $product->price }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif 

        
                        
                        </div>
        
                    </div>
                </div>
            </div>
        
        </section>

    </body>
    </section>  

@endsection