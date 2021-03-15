@extends("layout.basedLayout")

@section("main-content")

    <div class="bg-gray-100">
        <div>
            {{ $products->onEachSide(5)->links() }}
        </div>
        <table class="table-auto border-separate border-green-800" >
            <thead>
            <tr>
                <th>Name</th>
                <th>Style</th>
                <th>Brand</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->style }}</td>
                <td>{{ $product->brand }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
