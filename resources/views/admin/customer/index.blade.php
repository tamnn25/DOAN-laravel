@extends('admin.layouts.master')


@section('content')
    @include('admin.customer.search')

        <table id="product-list" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    {{-- <th>password</th> --}}
                    <th>phone_number</th>
                    <th>created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key=> $user)
                    <tr>
                        <th>{{$key+1}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>

                        {{-- <th>{{$user->password}}</th> --}}
                        <th>{{$user->phone_number}}</th>
                        <th>{{$user->created_at}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
@endsection        