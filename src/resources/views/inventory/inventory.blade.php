@extends("layout.basedLayout")

@section("main-content")

    <div >
        <div>
            {{ $inventory->links() }}
        </div>
        <table class="table-auto border-separate border-green-800 bg-gray-100" >
            <thead>
            <tr>
                <th>Product Name</th>
                <th>SKUs</th>
                <th>Quantity</th>
                <th>Colors</th>
                <th>Sizes</th>
                <th>Prices</th>
                <th>Costs</th>
            </tr>
            </thead>
            <tbody>
            @foreach($inventory as $product)
                <tr>
                    <td><a href="{{ url("inventory/product/{$product->product_id}") }}"> {{ $product->name }}</a></td>
                    <td>
                        @foreach(explode(",",$product->skus) as $sku)
                            <a href="{{ url("inventory/sku/{$sku}") }}"> {{ $sku }}</a><br>
                        @endforeach
                    </td>
                    <td>{{ $product->totalQuantity }}</td>
                    <td>{{ $product->colors }}</td>
                    <td>{{ $product->sizes }}</td>
                    <td>{{ $product->prices}}</td>
                    <td>{{ $product->costs }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
