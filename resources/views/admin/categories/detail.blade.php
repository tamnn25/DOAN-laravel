@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Detail Category')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Category Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Detail Category')

{{-- import file css (private) --}}
@push('css')

@endpush

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">List Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">detail</li>
    </ol>
</nav>
@endsection