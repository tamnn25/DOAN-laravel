@if ($products)
    @foreach ($products as $product)
    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">

        <div class="featured__item">
            <div class="featured__item__pic set-bg"  data-setbg="/{{ $product->image }}" alt="">
                
                <img src="{{ asset($product->image)}}" alt="{{ $product->name }}" style="width:270px; height:230px" class="img-fluid">
                <ul class="featured__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="{{ route('cart.cart-info') }}"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="featured__item__text">
                  
                <h6><a href="#">{{ $product->name }}</a></h6>

                <h5>{{!empty($product->product_promotion) ? $product->product_promotion->discount : $product->price.'.000.VND' }}</h5>
                <div class="product-buy">
                    <a href="{{ route('product.detail', $product['id']) }}" class="btn btn-outline-success">View More</a>
                </div>

            </div>
        </div>
    </div>
    @endforeach
@endif