@extends('layouts.master')

@section('content')
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-th"></span>
                        Change password   
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="{{route('password.changepassword', auth()->user()->id)}}" method="post">
                        @csrf
                        @method('PUT')
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 separator social-login-box"> <br>
                           <img alt="" class="img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar1.png">                        
                        </div>
                        {{-- <div style="margin-top:80px;" class="col-xs-6 col-sm-6 col-md-6 login-box">
                         <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                              <input class="form-control" name="password" type="password" placeholder="Current Password">
                            </div>
                          </div> --}}
                          @foreach ($user as $key => $value)
                          <h3>{{$value->name}}</h3>
                          <div class="form-group">
                            <label>new password:</label>
                            <div class="input-group">
                                
                              <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                              <input class="form-control" name="password" type="text" placeholder="New Password">
                            </div>
                            <button type="submit"> Save </button>
                          </div> 
                            @endforeach                   
                        </div>
                        
                    </div>
                    
                </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection