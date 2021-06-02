@extends('layouts.master')

{{-- set page title --}}
@section('title', 'List Order')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Changepassword ')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'List Changepassword')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/changepassword/changepassword-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="/backend/js/changepassword/changepassword-list.js"></script>
@endpush

@section('content')

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone_Number</th>
                <th>Address</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>

                @if (!empty($users))
                    
                    @foreach ($users as $item)

                        <td>{{ $item->name }}</td>

                        <td>{{ $item->email }}</td>

                        <td>{{ $item->password}}</td>

                        <td>{{ $item->phone_number }}</td>

                        <td>{{ $item->address }}</td>


                        <td><a href="{{ route('password.detailchange', $item->id) }}" class="btn btn-outline-info">Edit</a></td>
  
                    @endforeach

                @endif

            </tr>
        </tbody>
    </table>    
@endsection