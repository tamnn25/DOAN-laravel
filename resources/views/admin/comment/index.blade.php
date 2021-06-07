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
                <th>User_id</th>
                <th>Product_id</th>
                {{-- <th colspan="3">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @if(!empty($comment))
                @foreach ($comment as $key => $comment)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $comment->description }}</td>
                        <td>{{ $comment->rate }}</td>
                        
                        <td>{{$comment->user_id}}</td>
                        <td>{{$comment->product_id}}</td>
                        {{-- <td>
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="post" onclick="return confirm('Are you sure DELETE ?')>
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="submit" value="Delete" class="btn btn-outline-danger">
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection