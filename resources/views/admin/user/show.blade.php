@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Show User')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Show user')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/admin/css/product/product-create.css">
@endpush

@section('content')
    <h4>Show detail User</h4>
    
    @include('errors.error')

   <h1> {{$users->name}}</h1>
   <h1>{{$users->email }}</h1>
    
@endsection