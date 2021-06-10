@extends('admin.layouts.master')



{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/css/categories/category-list.css">
@endpush

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">List Comment</li>
        </ol>
   </nav>
    

    {{-- show message --}}
    {{-- @if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
    @endif --}}

    {{-- show error message --}}
    @if(Session::has('error'))
        <p class="text-danger">{{ Session::get('error') }}</p>
    @endif

    {{-- display list category table --}}
    <table id="category-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Discription</th>
                <th>rate</th>
                <th>product_images</th>
                <th>user_name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($comment))
                @foreach ($comment as $key => $comment)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $comment->description }}</td>
                        <td>@include('admin.comment.alert')</td>                    
                        <td><img src="\{{$comment->product->image}}" alt="" style="width: 110px "></td>
                        {{-- <td>{{$comment->product->name}}</td> --}}
                        <td>{{$comment->product->name}}</td>
                        {{-- <td><a class="btn btn-outline-info" href="#"> updates status</a></td> --}}
                        <td>
                            <form action="{{ route('admin.comment.destroy', $comment->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="Delete" class="btn btn-outline-danger" onclick="return confirm('Are you sure DELETE PRODUCT?')" class="btn btn-danger" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection