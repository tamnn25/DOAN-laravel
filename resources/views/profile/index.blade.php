@extends('layouts.master')
{{-- @section('content')
        <table id="product-list" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone_number</th>
                    <th>created_at</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($users))
                    @foreach ($users as $key=> $user)
                        <tr>
                            <th>{{$key+1}}</th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->email}}</th>
                            <th>{{$user->phone_number}}</th>
                            <th>{{$user->created_at}}</th>
                        </tr>
                    @endforeach
                @endif    
            </tbody>
        </table>
@endsection --}}
@section('content')
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
        .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 400px;
        margin: auto;
        
        /* margin-left: 20px; */
        text-align: center;
        font-family: arial;
        }

        .title {
        color: grey;
        font-size: 18px;
        }

        button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
        }

        a {
        text-decoration: none;
        font-size: 22px;
        color: black;
        }

        button:hover, a:hover {
        opacity: 0.7;
        }
        .right{
            float: right;
        }
</style>
</head>
<body>

    @if(!empty($users))
        @foreach($users as $user)
        <div class="card">
        <img src="https://www.w3schools.com/w3images/team2.jpg" alt="John" style="width:100%">
        <h4>{{$user->name }}</h4>
        <p class="title">CEO & Founder, Apple.Com</p>
        <p>Your Email: {{$user->email}}</p>
        <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-dribbble"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="#"><i class="fa fa-linkedin"></i></a>  
            <a href="#"><i class="fa fa-facebook"></i></a> 
        </div>

        <p><label for="">phone_number</label>
            <h3>{{$user->phone_number}}</h3>
            <a href="{{route('password.password')}}"><button>Update Your Profile</button></a></p>
        </div>
        @endforeach
    @endif    
    
</body>
</html>
@endsection