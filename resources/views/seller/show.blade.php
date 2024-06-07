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
        
        <img  style="width: 60px"src='{{ asset('uploads/photos/'.$product->image1) }}' alt=""></td>
    </div>
    <div>
        <strong>Image:</strong>
        <img  style="width: 60px"src='{{ asset('uploads/photos/'.$product->image2) }}' alt=""></td>
    </div>
    <div>
        <strong>Image:</strong>
        <img  style="width: 60px"src='{{ asset('uploads/photos/'.$product->image3) }}' alt=""></td>
    </div>
    

    <a href="{{ route('products.index') }}">Back </a>
    
</body>
</html>
