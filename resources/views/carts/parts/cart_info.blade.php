<h4>Thông Tin Đơn Hàng</h4>
 <br>
<div class="border p-2">
    <table class="table table-bordered table-hover table-striped ">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price Product</th>
                <th>Quantity</th>
                <th>Total</th>
                <th colspan="3">Delete</th>
            </tr>
           
        </thead>
        <tbody>
            
        @if (!empty($products))
        @foreach ($products as $product)
           <tr>
            <div class="list-product">
                <div class="product-detail">
                    <td><p><img src="/{{ $product->image }}" alt="{{ $product->name }}" width="150px" class="img-fluid"></p></td>
                    <td><p>{{ $product->name }}</p></td>
                    <td><p>{{ number_format($product->price).'.000 VND' }}</p></td>
                    <td><p>{{ $carts[$product->id]['quantity']}}</p></td>
                   <td><p>   
                        @php
                        $money = $carts[$product->id]['quantity'] * $product->price;
                        @endphp
                    <p>{{ number_format($money) . '.000 VND' }}</p>
                    </p></td>

                    <td><a href=""><i class="fas fa-calendar-times fa-2x" ></i></a></td>
                </div>
            </div>
           </tr>
        @endforeach
    @endif
        </tbody>
    </table>
</div>