<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>categories</th>
                <th>Rating</th>
                <th>Image1</th>
                <th>Image2</th>
                <th>Image3</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->categories }}</td>
                    <td>{{ number_format($product->rating, 1) }}/5</td>
                    <td><img src="{{ $product->image1 }}" alt="{{ $product->name }}" width="50"></td>
                    <td><img src="{{ $product->image2 }}" alt="{{ $product->name }}" width="50"></td>
                    <td><img src="{{ $product->image3 }}" alt="{{ $product->name }}" width="50"></td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">View</a>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('products.create') }}">Create New Product</a>
</body>
</html>
