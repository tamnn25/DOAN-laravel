@extends('admin.layouts.master')


{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/admin/css/product/product-create.css">
@endpush
 s
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">List User</li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
        </ol>
    </nav>
    @include('errors.error')
    <form style="padding:100px" action="{{ route('admin.user.update', $users->id) }}" method="post">
        @csrf
        @method('PUT')
        {{-- <input name="_method" type="hidden" value="PUT"> --}}
     

        <div class="row">
            <div class="col-3">
                <label class="">User Name</label>
                <h5>{{$users->name}}</h5>
                
            </div>
            <div class="col-3">
                <label class=""> User Email</label>
                <h5>{{$users->email}}</h5>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>    
        <div class="row">
            <div class="col-3">
                <label class="">Old Password</label>
                <input type="password" value="{{ old('password', $users->password) }}" placeholder=" Enter password" class="form-control">
            </div>
            <div class="col-3">
                <label class="">New Password</label>
                <input type="password" name="password" placeholder=" Enter new password" class="form-control">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <br>
        <div class="col-3">
            <label class="">Role_id</label>
            <input type="role_id" name="role_id" value="{{ old('password', $users->role_id) }}" placeholder=" Enter role_id" class="form-control">
           
            @error('role_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <hr>
    
@endsection