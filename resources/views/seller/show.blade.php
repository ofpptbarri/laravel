<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>

    <div>
        <strong>Price:</strong> ${{ number_format($product->price, 2) }}
    </div>
    <div>
        <strong>Description:</strong>
        <p>{{ $product->description }}</p>
    </div>
    <div>
        <strong>categories:</strong>
        <p>{{ $product->categories }}</p>
    </div>
    <div>
        <strong>Rating:</strong>
        {{ number_format($product->rating, 1) }}/5
    </div>
    <div>
        <strong>Image:</strong>
        <img src="{{ $product->image1 }}" alt="{{ $product->name }}">
    </div>
    <div>
        <strong>Image:</strong>
        <img src="{{ $product->image2 }}" alt="{{ $product->name }}">
    </div>
    <div>
        <strong>Image:</strong>
        <img src="{{ $product->image3 }}" alt="{{ $product->name }}">
    </div>
    <div>
        <strong>Created At:</strong>
        {{ $product->created_at->format('d M Y, H:i') }}
    </div>
    <div>
        <strong>Updated At:</strong>
        {{ $product->updated_at->format('d M Y, H:i') }}
    </div>

    <a href="{{ route('products.create') }}">Back to Create Product</a>
</body>
</html>
