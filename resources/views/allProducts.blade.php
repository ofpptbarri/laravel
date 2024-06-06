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
                <th>Rating</th>
                <th>Image</th>
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
                    <td>{{ number_format($product->rating, 1) }}/5</td>
                    <td><img src="{{ $product->image }}" alt="{{ $product->name }}" width="50"></td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">View</a>
                        
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
    <form action="{{ route('products.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search by name">
        <select name="category">
            <option value="">All Categories</option>
            <option value="phone">Phone</option>
            <option value="computer">Computer</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <a href="{{ route('products.create') }}">Create New Product</a>
</body>
</html>
