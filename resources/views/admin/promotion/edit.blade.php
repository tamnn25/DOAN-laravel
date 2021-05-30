@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Edit Promotion')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Promotion Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Edit Promotion')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datetimepicker/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="/admin/css/promotion/promotion-edit.css">
@endpush

@section('content')
    <h4>Update Promotion</h4>
    
    @include('errors.error')
    {{-- request()->route('id')) }} --}}
    {{-- {{ route('admin.promotion.update')}} --}}
    <form action="" method="post" enctype="multipart/form-data">
        @csrf

        @method('put')

        
        <div class="form-group mb-5">
            <label for="">Discount</label>
            <input type="text" name="discount" class="form-control" value="{{ old('discount', $promotion->discount) }}" required>    
        </div> 
        
      
        <div class="form-group mb-5">
            <label for="">Product_id</label>
            <select class="js-example-basic-multiple form-control" name="products[]"  multiple="multiple">
                @if (!empty($products))
                    @foreach ($products as $productId => $product )
                        <option value="{{ $productId }}" selected>{{ $product->name }}</option>
                    @endforeach
                @endif
            </select>
        </div> 
        
        <div class="form-group mb-5">
            <label for="">Begin_date</label>
            <input type="text" name="begin_date" value="{{ old('begin_date', $promotion->begin_date) }}" class="form-control datepicker" required>    
        </div>
        

        <div class="form-group mb-5">
            <label for="">End_date</label>
            <input type="text" name="end_date" value="{{ old('end_date', $promotion->end_date) }}"   class="form-control datepicker" required>    
        </div>

        <div class="form-group mb-5">
            <label for="">Status</label>
            <input name="status" value="{{ old('status', $promotion->status) }}"  class="form-control" rows="5" id="comment">
     
        </div>
        <div class="form-group">
            {{-- <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">List Post</a> --}}
            <button type="submit" class="btn btn-primary">Update</button>
        </div>


    </form>
@endsection

@push('js')
<script src="{{ asset('plugins/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>   

@endpush

@section('scripts')
<script>
    $(function() {
        // select2
        $('.js-example-basic-multiple').select2();

        jQuery.datetimepicker.setLocale('en');

        $('.datepicker').datetimepicker();
    });
</script>
@endsection