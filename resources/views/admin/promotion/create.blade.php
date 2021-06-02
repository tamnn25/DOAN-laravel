@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'List Promotion')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Promotion Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'List Promotion')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/admin/css/promotion/promotion-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="/admin/js/promotion/promotion-create.js"></script>
@endpush
@section('content')
    <h4>Create Promotion</h4>
{{-- {{ admin.promotion.store }} --}}
    <form action="{{ route('admin.promotion.store') }}" method="post" >
               @csrf
                <div class="form-group mb-5">
                    <label for="">Discount</label>
                    <input type="text" name="discount" class="form-control" required>    
                </div> 
                
              
                <div class="form-group mb-5">
                    <label for="">Product_id</label>
                    <select class="js-example-basic-multiple form-control" name="products[]" multiple="multiple">
                        @if (!empty($products))
                            @foreach ($products as $productId=> $productName )
                                <option value="{{ $productId }}" {{ old('product_id') == $productId ? 'selected' : ''  }}>{{ $productName }}</option>
                            @endforeach
                        @endif
                    </select>
                </div> 
                
                <div class="form-group mb-5">
                    <label for="">Begin_date</label>
                    <input type="datetime-local" name="begin_date" class="form-control" required>    
                </div>

                <div class="form-group mb-5">
                    <label for="">End_date</label>
                    <input type="datetime-local" name="end_date" class="form-control" required>    
           
                </div>

                <div class="form-group mb-5">
                    <label for="">Status</label>
                    <input name="status" class="form-control" rows="5" id="comment">
             
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
    </form>
@endsection
@section('scripts')
<script>
    $(function() {
        $('.js-example-basic-multiple').select2();
    }) 
</script>
@endsection