@php
$cartNumber = 0;
if (Session::has('carts')) {
    foreach (Session::get('carts') as $key => $value) {
        $cartNumber += intval($value['quantity']);
    }
}
@endphp
<ul>
    <li>
        <button style="background-color:rgb(233, 233, 233)" >
        <a href="{{ route('cart.cart-info') }}"><i class="fas fa-cart-plus"></i><strong  style="color: #dd2222">Giỏ hàng:   </strong>  {{ $cartNumber }}</a>

        </button>
    </li>
</ul>
