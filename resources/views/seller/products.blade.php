<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('cssfile/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/niceselect.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/flex-slider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/style.css') }}">
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Header -->
    <header class="header shop bg-white shadow mb-8">
        <div class="middle-inner">
            <div class="container mx-auto p-4">
                <div class="flex justify-between items-center">
                    <div class="w-1/6">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="images/logo.png" alt="logo" class="w-full"></a>
                        </div>
                        
                        
                    </div>
                    <div class="w-4/6">
                        
                    </div>
                    <div class="w-1/6">
                        <div class="right-bar text-right">
                            @auth
                            <div class="sinlge-bar">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-orange-600 hover:text-orange-900">Logout</button>
                                </form>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-inner bg-gray-100 py-4">
            <div class="container mx-auto">
                <div class="cat-nav-head">
                    <div class="flex justify-center">
                        <div class="w-5/6">
                            <div class="menu-area">
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav flex justify-center space-x-4">
                                                <li class="active"><a href="{{route('dashboard')}}" class="text-orange-600 hover:text-orange-800">Home</a></li>
                                                <li><a href="{{ route('products.index') }}" class="text-orange-600 hover:text-orange-800">Ajouter Produit</a></li>
                                                <li><a href="contact.html" class="text-orange-600 hover:text-orange-800">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center text-orange-600 mb-8">Product List</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300 mb-8">
            <thead class="bg-orange-500 text-white">
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Price</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Categories</th>
                    <th class="py-2 px-4 border-b">Rating</th>
                    <th class="py-2 px-4 border-b">Image1</th>
                    <th class="py-2 px-4 border-b">Image2</th>
                    <th class="py-2 px-4 border-b">Image3</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="bg-gray-100 border-b">
                        <td class="py-2 px-4">{{ $product->id }}</td>
                        <td class="py-2 px-4">{{ $product->name }}</td>
                        <td class="py-2 px-4">${{ number_format($product->price, 2) }}</td>
                        <td class="py-2 px-4">{{ $product->description }}</td>
                        <td class="py-2 px-4">{{ $product->categories }}</td>
                        <td class="py-2 px-4">{{ number_format($product->rating, 1) }}/5</td>
                        <td class="py-2 px-4"><img class="w-16" src="{{ asset('uploads/photos/'.$product->image1) }}" alt=""></td>
                        <td class="py-2 px-4"><img class="w-16" src="{{ asset('uploads/photos/'.$product->image2) }}" alt=""></td>
                        <td class="py-2 px-4"><img class="w-16" src="{{ asset('uploads/photos/'.$product->image3) }}" alt=""></td>
                        <td class="py-2 px-4 space-y-2">
                            <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:underline">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('products.index') }}" method="GET" class="mb-8">
            <div class="flex items-center space-x-2">
                <input type="text" name="search" placeholder="Search by name" class="p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                <select name="category" class="p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                    <option value="">All Categories</option>
                    <option value="phone">Phone</option>
                    <option value="computer">Computer</option>
                </select>
                <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Search</button>
            </div>
        </form>

        <a href="{{ route('products.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Create New Product</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('jsfile/bootstrap.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('jsfile/popper.min.js') }}"></script>
    <!-- Ajax -->
    <script src="{{ asset('jsfile/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Slicknav JS -->
    <script src="{{ asset('jsfile/jquery.slicknav.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('jsfile/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('jsfile/jquery.magnific-popup.min.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('jsfile/waypoints.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('jsfile/jquery.nice-select.min.js') }}"></script>
</body>
</html>
