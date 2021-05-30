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
    <script src="/admin/js/posts/post-list.js"></script>
@endpush

@section('content')
<br>
<p ><a  class="btn btn-outline-success" href="{{ route('admin.promotion.create') }}">Create</a></p>

     <table class="table table-light">
         <thead>
             <tr>
                 <th>STT</th>
                 <th>Discount</th>
                 <th>Begin_date</th>
                 <th>End_date</th>
                 <th>Status</th>
                 <th>Edit</th>
             </tr>
         </thead>
         <tbody>
             <tr>

                @if(!empty($promotions))
                    @foreach ($promotions as $key => $promotion)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $promotion->discount }}</td>
                            <td>{{ $promotion->begin_date }}</td>
                            <td>{{ $promotion->end_date }}</td>
                            <td>{{ $promotion->status }}</td>
    
                            <td><a class="btn btn-outline-info" href="{{ route('admin.promotion.edit',$promotion->id) }}">Edit</a></td>
                         {{--   <td>
                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" name="submit" value="Delete" class="btn btn-outline-danger">
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
            @endif
            {{-- {{ $promotion->links() }} --}}
            
        </tr>
    </tbody>
    
</table>
    {!! $promotions->links() !!}

@endsection