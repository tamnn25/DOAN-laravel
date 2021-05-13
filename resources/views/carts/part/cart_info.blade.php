<h4>thong tin don hang</h4>
<div class="border p-2">
    @if (!empty($products))
        @foreach ($products as $product)
            <div class="list-product">
                <div class="product-detail">
                    <h6>{{ $product->name }}</h6>
                    <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}" class="img-fluid">
                    <p>{{ number_format($product->latestPrice()->price) }}</p>
                    @php
                        $money = $carts[$product->id]['quantity'] * $product->latestPrice()->price;
                    @endphp
                    <p>{{ number_format($money) . ' VND' }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>