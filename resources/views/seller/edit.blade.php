<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
        </div>
        <div>
            <label for="categories">categories:</label>
            <textarea id="categories" name="categories" required>{{ old('categories', $product->categories) }}</textarea>
        </div>
        <div>
            <label for="rating">Rating:</label>
            <input type="number"  id="rating" name="rating" value="{{ old('rating', $product->rating) }}" required>
        </div>
        <div>
            <label for="image1">Image 1:</label>
        <input type="file" name="image1" id="image1" value="{{ old('image1', $product->image1) }}" >
        <br>
        <label for="image2">Image 2:</label>
        <input type="file" name="image2" id="image2" value="{{ old('image2', $product->image2) }}" >
        <br>
        <label for="image3">Image 3:</label>
        <input type="file" name="image3" id="image3" value="{{ old('image3', $product->image3) }}" >
        <br>
            
        </div>
        <button type="submit">Update Product</button>
    </form>

    <a href="{{ route('products.index') }}">Back to Product List</a>
</body>
</html>
