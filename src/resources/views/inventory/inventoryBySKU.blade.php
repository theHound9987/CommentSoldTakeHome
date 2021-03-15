@extends("layout.basedLayout")

@section("main-content")

    <div >
        @if(!isset($error))
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
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->color }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->price_cents}}</td>
                        <td>{{ $product->cost_cents }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="bg-gray-100"> {{ $error }}</div>
        @endif
    </div>

@endsection
