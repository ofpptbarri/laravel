
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Manage Users</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-200">Name</th>
                <th class="py-2 px-4 border-b border-gray-200">Email</th>
                <th class="py-2 px-4 border-b border-gray-200">Role</th>
                <th class="py-2 px-4 border-b border-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $user->type_user }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <select name="type_user" onchange="this.form.submit()">
                                <option value="client" {{ $user->type_user == 'client' ? 'selected' : '' }}>Client</option>
                                <option value="seller" {{ $user->type_user == 'seller' ? 'selected' : '' }}>Seller</option>
                                <option value="admin" {{ $user->type_user == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </form>

                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
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

