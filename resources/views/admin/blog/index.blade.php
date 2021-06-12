@extends('admin.layouts.master')
@section('title', ' BLog')

@section('content')
    <a href="{{ route('admin.create') }}">Create</a>
    <table class="table table-hover">
        <thead>
            <th>STT</th>
            <th>Name</th>
            <th>Image</th>
            <th>content</th>
            <th>description</th>

        </thead>
        <tbody>
            @foreach ($blog as $key => $item)
            <tr>
                <td> {{ $key+1 }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <img src="/{{ $item->image }}" alt="{{ $item->name }}" width="200px" height="150px">
                </td>
                <td>{{ $item->content }}</td>
                <td>{{ $item->description }}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

@endsection