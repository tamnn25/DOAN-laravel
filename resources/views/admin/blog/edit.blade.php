@extends('admin.layouts.master')
@section('title', ' BLog')

<h4>Detail Blog</h4>
    
@include('errors.error')
<h1>{{ $blog->name }}</h1>
    <hr>
    {{-- <img src="{{ asset($product->images) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 40px; height: auto;"> --}}
    <img src="/{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid" style="width: 200px; height: auto;">
    <hr>
@endsection