@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Edit Post')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Post Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Edit Post')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/admin/css/posts/post-edit.css">
@endpush

@section('content')
    <h4>Update Products</h4>
    
    @include('errors.error')
    
    <form action="{{ route('admin.product.update', request()->route('id')) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-5">
            <label for="">Post Name</label>
            <input type="text" name="name" placeholder="post name" value="{{ old('name', $product->name) }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Post images</label>
            <img src="{{ asset($product->images) }}" alt="{{ $product->name }}" class="img-fluid">
            <input type="file" name="images" placeholder="product images" class="form-control">
            @error('images')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">product price</label>
            <input type="text" name="price" placeholder="product price" value="{{ old('price', $product->price) }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">product status</label>
            <input type="text" name="status" placeholder="product status" value="{{ old('status', $product->status) }}" class="form-control">
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">product Content</label>
            <textarea name="content" rows="10" class="form-control">{{ old('content', $product->product_detail ? $product->product_detail->content : null) }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Category</label>
            <select name="category_id" class="form-control">
                <option value=""></option>
                @if(!empty($categories))
                    @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}" {{ old('category_id', $product->category_id) == $categoryId ? 'selected' : ''  }}>{{ $categoryName }}</option>
                    @endforeach
                @endif
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">List Post</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection