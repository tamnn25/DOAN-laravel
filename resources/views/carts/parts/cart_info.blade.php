    @php 
        $totalMoney = 0;
        $totalQuantity = 0;
        $newTotal = 0;
        $newQuantity = 0;
    @endphp
<h4 class="btn btn-info">Order Information</h4>
{{-- Thông Tin Đơn Hàng --}}
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
            </tr>
           
        </thead>
        <tbody>
            
        @if (!empty($carts))
            @foreach ($carts as $cart)
            @php
                // $quantity = $cart[$products->id]['quantity'];
                $totalQuantity = $cart['quantity'];
                $totalMoney = $cart['quantity'] * $cart ['price'];
            @endphp
            <tr>
                <div class="list-product">
                    <div class="product-detail">
                        <td><p><img src="/{{ $cart['image'] }}" alt="{{ $cart['name'] }}" width="120px" class="img-fluid"></p></td>
                        <td><p>{{ $cart['name'] }}</p></td>
                        <td><p>{{ number_format($cart['price'])}} VND</p></td>
                        <td><p>{{ $cart['quantity']}}</p></td>
                        <td><p>   
                        <p>{{ number_format($totalMoney)}} VND</p>
                        </p></td>
                    </div>
                </div>
            </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
            @php 
                $totalMoney += $totalMoney;
                // $totalQuantity += $totalQuantity;
            @endphp
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>