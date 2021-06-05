@extends('admin.layouts.master')


@section('content')
    @include('admin.customer.search')
    <button class="btn btn-warning" ><a  href="{{route('admin.customerExcel')}}">Export File Customer</a></button>
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
                        <td>
                            <form action="{{ route('admin.customer.destroy', $user->id) }}" method="post" onclick="return confirm('Are you sure DELETE ?')>
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="submit" value="Delete" class="btn btn-outline-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
@endsection        