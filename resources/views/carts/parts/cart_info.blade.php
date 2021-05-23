<h4>Thông Tin Đơn Hàng</h4>
<div class="border p-2">
    @if (!empty($products))
        @foreach ($products as $product)
            <div class="list-product">
                <div class="product-detail">
                    <h6>{{ $product->name }}</h6>
                    <img src="/{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
                    <p>{{ number_format($product->price).'.000 VND' }}</p>
                    @php
                        $money = $carts[$product->id]['quantity'] * $product->price;
                    @endphp
                    <p>{{ number_format($money) . '.000 VND' }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>