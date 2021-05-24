




 <div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Featured Product</h2>
            </div>
            <div class="featured__controls">

                {{-- @for($i=1;$i<=4;$i++) --}}
                    <ul>
                        @foreach ($categories as $category)
                            <li class="active" data-filter="*">
                                <a style="color:black" href="javascript:;" onclick="getProductByCategory({{ $category->id }})"> {{ $category->name }}</a>
                               </li>
                        @endforeach
                    </ul>
                {{-- @endfor --}}

            </div>
        </div>
    </div> 
    {{-- <h1>{{ count($products) }}  Sản phẩm mới</h1> --}}
     <div class="row featured__filter" id="loadProduct">
        
    </div>
</div>
@section('scripts')
    <script>

        $(document).ready(function() {
            getProductByCategory(1); //gọi hàm getProductByCategory
        });//chạy sau khi load trang xong
        function getProductByCategory(id) {
            var url = `{{ url('/product/category' ) }}`+'/'+id; //đi đén route
            $.ajax({
                url: url, 
                type: 'GET',
                success: function (response) {
                    $('#loadProduct').html(response.html);//load file _ajax_product.blade.php
                    console.log(response.status);
                }
            });
            
        }
    </script>
@endsection

