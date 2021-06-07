@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Update Order Status')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/css/orders/order-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="/js/orders/order-list.js"></script>
@endpush

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">List Orders</li>
        <li class="breadcrumb-item active" aria-current="page">Edit Orders</li>
    </ol>
</nav>
    {{-- show message --}}
    @include('errors.error')

    {{-- display form edit order --}}
    @include('admin.orders._form_update_order_status')
@endsection