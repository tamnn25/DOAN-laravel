@extends('layouts.master')

{{-- set page title --}}
@section('title', 'Edit PASSWORD')

{{-- set breadcrumbName --}}
@section('breadcrumbName', ' MY PASSWORD')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Edit PASWORD')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/changepassword/changepassword-list.css">
@endpush


@section('content')
    <br><br><br><hr>
            <h3><strong>Edit My  Accout</strong>  </h4>
    <br><br><br>
    
    <form  method="post"action="{{ route('password.store',$user->id ) }}"  enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group mb-5">
            <label for="">My Name</label>

            <input type="text" name="name" placeholder="post name" value="{{ old('name', $user->name) }}" class="form-control">
          
        </div>

            <div class="form-group mb-5">
            <label for="">Email</label>

            <input type="text" name="email" placeholder="post name" value="{{ old('email', $user->email) }}" class="form-control">
          
        </div>

            <div class="form-group mb-5">
            <label for="">Password</label>

            <input type="text" name="password" placeholder="password" value="{{ old('password', $user->password) }}" class="form-control">
          
        </div>

        <div class="form-group mb-5">
            <label for="">Phone_number</label>

            <input type="text" name="phone_number" placeholder="phone_number" value="{{ old('name', $user->phone_number) }}" class="form-control">
          
        </div>


        <div class="form-group mb-5">
            <label for="">Address</label>

            <input type="text" name="address" placeholder="address" value="{{ old('address', $user->address) }}" class="form-control">
          
        </div>
       

        <div class="form-group">
            <a href="{{ route('password.password') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>


    </form>
@endsection