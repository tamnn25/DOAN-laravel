@if (!empty($products))
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Thumbanil</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $key => $product)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->images  }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->price *$product->quantity }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
@endif