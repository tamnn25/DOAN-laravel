<table id="product-list" class="   table table-bordered table-hover table-striped">
    <thead class="table-primary">
        <tr>

            <th>STT</th>
            <th>Order day</th>
            <th>Status</th>
            <th>Detail</th>
            {{-- <th colspan="3">Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @if(!empty($orders))
            @foreach ($orders as $key => $order)
                <tr>
                    {{-- <td>{{ $order->id }}</td> --}}
                    <td>{{ $key+1 }}</td>

                    <td>{{ $order->created_at }}</td>
                    <td>
                        @include('order_user.parts.alert_order_status')
                    </td>
                     <td>
                        <a href="{{ route('order_user.detail_order', ['id' => $order->id]) }}" class="btn btn-outline-primary" > Detail</a>                        
                    </td>
                  
                </tr>
            @endforeach
        @endif
    </tbody>

</table>
<br>
<a href="{{ route('index') }}" type="button" class="btn btn-info float-left" >Back</a>

<br>
<br>

<div style="margin-left:40%">{{ $orders->links() }}</div>