@extends('admin.layouts.master')
@section('content')

   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 8 Import Export Excel to database Example - ItSolutionStuff.com
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ImportCustomer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" href="{{ route('admin.ExportCustomer') }}">Export User Data</a>
            </form>
        </div>
    </div>
</div>
   
@endsection
