
<!-- Header Section Begin -->
<header class="header">
    <div class="header__top" >
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <marquee behavior="" direction="">
                            <li><i class="fa fa-envelope"></i> contact@iviettech.vn</li>
                            <li>Free Shipping for all Order of $99</li>
                            </marquee>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="https://www.facebook.com/"><i class="fa fa-facebook">facebook</i></a>
                            <a href="https://twitter.com/"><i class="fa fa-twitter">twitter</i></a>
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
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fa fa-user"></span><span class="text"> </span><span>{{ Auth::user()->name }}</span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background-color: #ceecdf;">
                                        <li><a class="dropdown-item " href="#">Thông tin tài khoản</a></li>
                                        <li>
                                           <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{route('profile.cart')}}">Lịch sử mua hàng</a></li>
                                        <li>
                                           <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="">Đổi mật khẩu</a></li>
                                        <li>
                                           <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                           <form action="{{ route('logout') }}" method="POST">
                                              @csrf
                                              <button type="submit" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i><span class="text" >&nbsp; Logout</span></button>
                                           </form>
                                        </li>
                                    </ul>
                                 </div>
                                @endauth
                                
                                @guest
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #25a6d700">
                                    <span class="fa fa-user"> &nbsp; </span><span class="text">   REGISTER </span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2" style="background-color: #49c569f7;">
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
    <div class="container ">
        <div class="row" >
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('index')}}"><img src="{{ asset('shop/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('index')  }}">Home</a></li>

                        <li><a href="{{ route('home.shop', 0) }}">Shop</a></li>
                        <li><a href="#">Wine</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Red Wine</a></li>
                                <li><a href="./shoping-cart.html">White Wine</a></li>
                                <li><a href="./checkout.html">Rose Wine</a></li>
                                <li><a href="./blog-details.html">Brandy</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
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


</header>
<!-- Header Section End -->