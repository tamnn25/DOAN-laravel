@extends('layouts.master')

{{-- set page title --}}
@section('title', 'List Order')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Order ')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'List Order')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/orders/order-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="/backend/js/orders/order-list.js"></script>
@endpush

@section('content')

    @include('errors.error')
    <hr>
    <br><br>
    <h4>My Order</h4>
    <br>
    @include('order_user._search')
    <br>
    @include('order_user._table')

    {{-- modal update order status  --}}

    @include('order_user.parts.modal_update_order_status')

<hr>
@endsection