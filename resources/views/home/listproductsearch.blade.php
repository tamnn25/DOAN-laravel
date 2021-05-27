
@extends('layouts.master')


@section('content')
<body>
     <div class="hero__search">
        <div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="hero__categories">
                <div class="hero__categories__all">
                    <i class="fa fa-bars"></i>
                    <span>All departments</span>
                </div>
                @foreach ($categories as $category)
                    <ul style=" display:none; " >
                            <li class="active" data-filter="*">
                                <i >
                                    <a href="{{ url('home/shop/'. $category->id)}}"><i>{{ $category->name }}</i></a>
                                </i>
                                
                            </li>
                    </ul>
                @endforeach
            </div>
        </div>
        <div class="col-lg-9">
            <div class="hero__search">
                <div class="hero__search__form">
            
                    <div class="hero__search__form">
                        <form action="http://127.0.0.1:8000/product/search" id="formSearch" method="GET">
                            
                            <input type="text" name="key" placeholder="What Would You Like To Buy ?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                </div>
                <div class="hero__search__phone">
                    <div class="hero__search__phone__icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="hero__search__phone__text">
                        <h5>+84 263 888 279</h5>
                        <span>support 24/7 time</span>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 " >
                    <div class="sidebar" >
                        
                        {{-- <div class="sidebar__item" >
                            <h4>Department</h4>
                            <ul >
                                @foreach ($categories as $item)
                                    
                                <li ><a href="{{ url('home/shop/'. $item->id)}}">{{ $item->name }}</a></li>
                                @endforeach
                               
                            </ul>
                        </div> --}}
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                 <div class="latest-product__slider owl-carousel">
                                    @for ($i = 1; $i <= 3; $i++) 
                                        <div class="latest-prdouct__slider__item">
                                            @if(isset($lasterProduct[$i]))
                                            @foreach ($lasterProduct[$i] as $key => $item)

                                                    <a href="{{ route('product.detail', $item['id']) }}" class="latest-product__item">
                                                        <div class="latest-product__item__pic">
                                                            
                                                            <img src="{{asset('/'.$item->image ) }}" alt="" style="width: 110px">
                                                        </div>
                                                        
                                                        <div class="latest-product__item__text">
                                                            
                                                            <h6 >  {{ $item->name }}</h6>
                                                            <span>{{ $item->price }}</span>
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
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                
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
                                    
                                    <h6><strong>You're Fround</strong><span> 
                                    @php
                                        $soluong = count($products);
                                        echo $soluong;
                                    @endphp
                                    </span> <strong>Products</strong></h6>
                                
                                </div>
                            </div>
                            {{-- <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div> --}}
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
                                                {{-- {{ route('shop.show',$product->id) }} --}}
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="{{ route('product.detail', $product['id']) }}">{{ $product->name }}</a></h6>
                                            <h5>{{ $product->price }}.000.vnd</h5>
                                            <div class="product-buy">
                                                <a href="{{ route('product.detail', $product['id']) }}" class="btn btn-outline-success">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                            
                    </div>
                          <div style="margin-left: 45%; ">  {{ $products->links() }} </div>
                </div>
            </div>
        </div>
    </section>
</body>
</section>  

@endsection