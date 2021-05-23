<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Products</span>
                    </div>
                    @foreach ($categories as $category)
                        <ul>

                            <li style="font-family: Arial, sans-serif;" class="active" data-filter="*">
                                <a href="{{url('home/shop/' . $category->id)}}"><i>{{ $category->name }}</i></a>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{ route('product.search') }}" id="formSearch" method="GET">
                            {{-- <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div> --}}

                            <input type="text" name="key" placeholder="What Would You Like To Buy ?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        {{-- <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div> --}}
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                
                <div  class="hero__item set-bg" data-setbg="shop/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="{{route('home.shop',0)}}" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
