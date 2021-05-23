

<div class="container mt-3">
  <h2>Toggleable Tabs</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>


 <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Featured Product</h2>
            </div>
            <div class="featured__controls">
                <ul>
                    @foreach ($categories as $category)
                        <li class="active" data-filter="*">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div> 
    <h1>{{ count($products) }}  Sản phẩm mới</h1>
     <div class="row featured__filter">
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
    
             <div class="featured__item">
                <div class="featured__item__pic set-bg"  data-setbg="/{{ $product->images }}" alt="">
                    
                    <img src="{{ asset($product->image)}}" alt="{{ $product->name }}" class="img-fluid">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="{{ route('product.detail', $product['id']) }}"><i class="fa fa-shopping-cart"></i></a></li>
                  
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="{{ route('product.detail', $product['id']) }}">{{ $product->name }}</a></h6>
                    <h5>{{ $product->price }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{ $products->links() }}

ủa ren lại foraeach 2 lần  2 lần cái mô á ah cái file ni mà  cái list mi đang làm paginate ni á
còn cái trên là  dang chạy slide