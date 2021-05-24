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
        <a href="{{ route('cart.cart-info') }}"><i class="fas fa-cart-plus">Giỏ hàng: <span class="number">{{ $cartNumber }}</span></i></a>
    </li>
</ul>
  