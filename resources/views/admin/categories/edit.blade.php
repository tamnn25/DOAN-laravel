@extends('admin.layouts.master')



{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/css/categories/category-edit.css">
@endpush

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">List Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <h4>Edit Category</h4>
    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="">Category Name</label>
            <input type="text" name="category_name" value="{{ $category->name }}">
            @error('category_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="">Parent_id</label>
            <input type="text" name="parent_id" value="{{ $category->parent_id }}">
            @error('parent_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">List Category</a>
            <input type="submit" name="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
@endsection