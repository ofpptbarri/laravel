<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: orange;
            margin-bottom: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .container div {
            margin-bottom: 15px;
        }
        .container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .container input[type="text"], .container input[type="number"], .container textarea, .container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .container input[type="file"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .container button {
            width: 100%;
            padding: 10px;
            background-color: orange;
            border: none;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .container button:hover {
            background-color: darkorange;
        }
        .alert {
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .success {
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            margin-bottom: 15px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <h1>Create a New Product</h1>

    <div class="container">
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert">
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
                <label for="categories">Categories:</label>
                <select name="categories" id="categories">
                    <option value="phone">Phone</option>
                    <option value="computer">Computer</option>
                </select>
            </div>
            <div>
                <label for="image1">Image 1:</label>
                <input type="file" name="image1" id="image1" value="{{ old('image1') }}" required>
            </div>
            <div>
                <label for="image2">Image 2:</label>
                <input type="file" name="image2" id="image2" value="{{ old('image2') }}" required>
            </div>
            <div>
                <label for="image3">Image 3:</label>
                <input type="file" name="image3" id="image3" value="{{ old('image3') }}" required>
            </div>
            <button type="submit">Create Product</button>
        </form>
    </div>

</body>
</html>
