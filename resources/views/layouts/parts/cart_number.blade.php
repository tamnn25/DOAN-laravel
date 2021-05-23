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
        {{-- <button style="background-color:rgb(233, 233, 233)" > --}}
        <a href="{{ route('cart.cart-info') }}"><i class="fas fa-cart-plus">Giỏ hàng:{{ $cartNumber }}</i></a>
    </li>
</ul>
  