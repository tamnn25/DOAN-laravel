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
    {{-- show message --}}
    @include('errors.error')

    {{-- display form edit order --}}
    @include('admin.orders._form_update_order_status')
@endsection