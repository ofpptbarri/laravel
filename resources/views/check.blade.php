@if(Auth::user()->type_user === 'admin')
    <a href="{{ route('admin.users') }}">users</a>
    <a href="{{ route('admin.products') }}">Products</a>
@elseif(Auth::user()->type_user === 'seller')
    <a href="{{ route('products.index') }}">Products</a>
    
    @else <p> <a href="{{ route('products.allpro') }}">nta gha cliyan</a></p>
@endif