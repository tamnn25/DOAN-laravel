@extends('admin.layouts.master')

@section('content')
<table class="table">
    <thead class="thead-inverse">
        <tr>
            <th>stt</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($message as $key => $value)
                <tr>
                    <td scope="row">{{$key+1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <th>{{$value->messages}}</th>
                </tr>
            @endforeach
        </tbody>
</table>
@endsection