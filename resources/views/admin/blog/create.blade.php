@extends('admin.layouts.master')
@section('title', ' BLog')

@section('content')

    <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text"   name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file"  name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Conntent</label>
            <input type="text"  name="content" class="form-control">
        </div> 

        <div class="form-group">
            <label for="">Description</label>
            <input type="text"  name="description" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Image_detail</label>
            <input type="file" name="image_detail[]" multiple placeholder=" Enter BLog img" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>

    </form>

@endsection