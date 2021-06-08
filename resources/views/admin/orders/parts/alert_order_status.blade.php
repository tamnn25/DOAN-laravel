@if ($order->status == \App\Models\Order::STATUS[1])
    <div class="btn btn-outline-primary" role="alert">chưa thanh toán</div>
@elseif ($order->status == \App\Models\Order::STATUS[2])
    <div class="btn btn-outline-secondary" role="alert">đã thanh toán online</div>
@elseif ($order->status == \App\Models\Order::STATUS[3])
    <div class="btn btn-outline-warning" role="alert">shipper đang đi giao hàng</div>
@elseif ($order->status == \App\Models\Order::STATUS[4])
    <div class="btn btn-outline-danger" role="alert">cancel đơn hàng</div>
@else
    <div class="btn btn-outline-success" role="alert">hoàn thành</div>
@endif