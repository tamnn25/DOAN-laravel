@extends('layouts.master')
@section('breadcrumbName', 'Promotion ')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'List Promotion')

{{-- import file css (private) --}}

@section('content')

     <table class="table table-light">
         <thead>
             <tr>
                 <th>STT</th>
                 <th>discount</th>
                 <th>product_id</th>
                 <th>begin_date</th>
                 <th>end_date</th>
                 <th>status</th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
             </tr>
         </tbody>

     </table>

@endsection