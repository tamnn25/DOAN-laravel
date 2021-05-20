
<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook">facebook</i></a>
                            <a href="#"><i class="fa fa-twitter">twitter</i></a>
                            {{-- <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a> --}}
                        </div>
                        <div class="header__top__right__language">
                            <img src="https://flagcdn.com/h20/vn.png"
                                    srcset="https://flagcdn.com/h40/vn.png 2x,
                                        https://flagcdn.com/h60/vn.png 3x"
                                    height="20"
                                    alt="Vietnam">
                            {{-- <img src="shop/img/language.png" alt=""> --}}
                            <div>VietName</div>
                            
                        </div>
                       
                        <div class="flex-container" style="display: inline-block;">
                            <div class="flex-item">
                                @auth
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fa fa-user"></span><span class="text"> </span><span>{{ Auth::user()->name }}</span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item active" href="#">Thông tin tài khoản</a></li>
                                        <li>
                                           <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Lịch sử mua hàng</a></li>
                                        <li>
                                           <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                                        <li>
                                           <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                           <form action="{{ route('logout') }}" method="POST">
                                              @csrf
                                              <button type="submit"><i class="fas fa-sign-out-alt"></i><span class="text">Logout</span></button>
                                           </form>
                                        </li>
                                    </ul>
                                 </div>
                                @endauth
                                
                                @guest
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fa fa-user"> &nbsp; </span><span class="text">   REGISTER </span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                       <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                                       <li>
                                          <hr class="dropdown-divider">
                                       </li>
                                       <li><a class="dropdown-item" href="{{ route('register') }}">Tạo tài khoản</a></li>
                                    </ul>
                                 </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('index')}}"><img src="{{ asset('shop/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('index')  }}">Home</a></li>
                        <li><a href="{{ route('home.shop') }}">Shop</a></li>
                        <li><a href="#">Wine</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Red Wine</a></li>
                                <li><a href="./shoping-cart.html">White Wine</a></li>
                                <li><a href="./checkout.html">Rose Wine</a></li>
                                <li><a href="./blog-details.html">Brandy</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    {{-- <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                    </ul> --}}
                    <div class="flex-item">
                        @include('layouts.parts.cart_number')
                     </div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>

        <!-- Hero Section Begin -->
     <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        @foreach ($categories as $category)
                            <ul style=" border: 1px solid #7fad39;">
                                <li class="active" data-filter="*">{{ $category->name }}</li>
                            </ul>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                    
                            <div class="hero__search__form">
                                <form action="http://127.0.0.1:8000/home/search" id="formSearch" method="GET">
                                    
                                    <input type="text" name="key" placeholder="What do yo u need?">
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
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
                    <div class="hero__item set-bg" data-setbg="{{ asset('shop/img/hero/banner.jpg') }}">
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
    <!-- Hero Section End -->
</header>
<!-- Header Section End -->