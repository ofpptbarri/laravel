<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Manage Products</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-200">Name</th>
                <th class="py-2 px-4 border-b border-gray-200">Description</th>
                <th class="py-2 px-4 border-b border-gray-200">Price</th>
                <th class="py-2 px-4 border-b border-gray-200">Seller</th>
                <th class="py-2 px-4 border-b border-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $product->name }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $product->description }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">${{ $product->price }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $product->user->name }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                            Update
                        </a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>