@extends('layouts.master')
{{-- set page title --}}
@section('title', $product->name)

@section('content')
    <hr>
    <section class="product-detail">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic__item">
                    <img class="product__details__pic__item--large" src="{{ asset($product->image) }}" width=" 350px" height="400px"
                        alt="{{ $product->image }}">
                </div>
                <hr>
                <div class="product__details__pic__slider owl-carousel">

                    @foreach ($product->product_images as $url)

                        <img data-imgbigurl="{{ asset($url->url) }}" src="{{ asset($url->url) }}" alt="" width="250px"
                            height="120px">

                    @endforeach
                </div>
                <hr>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <form action="{{ route('cart.add-cart', $product->id) }}" method="POST">
                        @csrf
                        <h3><strong>{{ $product->name }}</strong></h3>
                        <div class="product__details__rating">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="{{ ($countcomment->startReview($product->id) > $i) ? 'fa fa-star' : 'fa fa-star-half-o' }}"></i> 
                                {{-- $countcomment -> startReview  chỉ đến id sản phẩm   nếu lớn  hơn $id nó sẽ show ra ngược lại ẩn --}}
                                {{-- startReview     là ham khai báo biến từ App/Models/Comment   hàm for    đếm giá tri--}}
                            @endfor
                            <span>({{ count($comment) }} reviews)</span>
                        </div>
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
                        @if (!empty($product->discount))
                            <p class="product-price text-muted"><del>{{ number_format($product->price) . '.000.VND' }}</del></p>
                            <p class="product-price">{{ number_format($product->discount) . '.000.VND' }}</p>
                        @else
                            <p class="product-price">{{ number_format($product->price) . '.000.VND' }}</p>
                        @endif
                        <hr>
                        <p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" name="quantity" required value="1"
                                        max="{{ $product->quantity }}">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-success" type="submit">Add Cart</button>
                        </p>
                    </form>
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
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews
                                <span>(1)</span></a>
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
                                <form action="{{ route('product.review') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                 
                                    <div class="rate">
                                        <span>Đánh Giá : </span>
                                        <br>
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label><br>
                                    </div><br><br><br>
                                    <label for="comment">Comment:</label>
                                    <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                                    <br>
                                    {{-- <label for="comment">đính kèm ảnh:</label>
                                    <input id="my-input" class="form-control" type="file" name="image"> --}}
                                        <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                                <br>
                                <h4>Bài Đánh Giá</h4>
                                <table class="table table-bordered table-hover table-striped">
                                    {{-- <thead>
                                        <th></th>
                                    </thead> --}}
                                    <tbody>
                                        @foreach ($comment as $item)

                                            <tr>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>
                                                    <div class="product__details__text">
                                                        <div class="product__details__rating">
                                                            @for ($i = 0; $i < 5; $i++)
                                                                <i
                                                                    class="{{ $item->rate > $i ? 'fa fa-star' : 'fa fa-star-half-o' }}"></i> 
                                                                    {{-- $countcomment -> startReview  chỉ đến id sản phẩm   nếu lớn  hơn $id nó sẽ show ra ngược lại ẩn --}}
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->created_at->diffForHumans($now) }}</td>
                                                <td>
                                                    <a href="{{ route('product.delete-comment', $item->id) }}">Delete</a> 
                                                    {{--  viêt  function bên productcontroller  --}}
                                                </td>
                                            </tr>
                                        @endforeach

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
                                <div class="categories__item set-bg" data-setbg="{{ asset($item->image) }}">

                                    <h5><a href="{{ route('product.detail', $item->id) }}">{{ $item->category->name }}</a>
                                    </h5>

                                </div>
                            </div>

                        @endforeach

                    @endif
                </div>
            </div>
        </div>
    </section>
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
@endsection

@push('css')
    <link rel="stylesheet" href="{{ '/shop/css/rating.css' }}">
@endpush

@push('js')

@endpush
