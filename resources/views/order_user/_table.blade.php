<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead>
        <tr>

            <th>STT</th>
            <th>Fullname</th>
            <th>Order day</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($orders))
            @foreach ($orders as $key => $order)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $order['name'] }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        @include('order_user.parts.alert_order_status')
                    </td>
                     <td>
                        <a href="{{ route('order_user.detail_order', ['id' => $order->id]) }}" class="btn btn-secondary">Order Detail</a>                        
                    </td>
                  
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

{{ $orders->links() }}
