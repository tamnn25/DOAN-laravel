<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        @foreach ($categories as $cate)
                             <li><a href="{{ route('shop.list',$cate->id) }}">{{ $cate->name }}</a></li>
                        @endforeach

                        {{-- dfgfdg --}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <form action="#">
                                <select class="form-select" aria-label="Default select example">    
                                <div class="hero__search__categories">
                                      <option selected>All Categories</option>
                                      @foreach ($categories as $cate)
                                      <option value="{{ $cate->id }}">
                                        {{ $cate->name }}
                                        @endforeach
                                      </option>
                                   
                                    {{-- <span class="arrow_carrot-down"></span> --}}
                                </div>
                            </select>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="shop/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>