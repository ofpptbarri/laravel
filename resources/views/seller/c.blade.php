<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create a New Product</h1>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="rating">Rating:</label>
            <input type="number" step="0.01" id="rating" name="rating" value="{{ old('rating') }}" required>
        </div>
        <div>
            <select name="categories" id="categories">
                <option value="phone">phone</option>
                <option value="computer">computer</option>
                
            </select>
        </div>
        
        <label for="image1">Image 1:</label>
        <input type="file" name="image1" id="image1" value="{{ old('image1') }}" required>
        <br>
        <label for="image2">Image 2:</label>
        <input type="file" name="image2" id="image2" value="{{ old('image2') }}" required>
        <br>
        <label for="image3">Image 3:</label>
        <input type="file" name="image3" id="image3" value="{{ old('image3') }}" required>
        <br>
        <button type="submit">Create Product</button>
    </form>
</body>
</html>
