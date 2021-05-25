@extends('layouts.master')

@section('content')
    <h1>Phat triển</h1>
    {{-- <table class="table">
        <thead>
            <tr>
                <th>stt</th>
                <th>user_id</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($orders))
                @foreach ($orders as $key => $order)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$order->user_id}}</td>
                    <td>{{$order->status}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table> --}}
@endsection