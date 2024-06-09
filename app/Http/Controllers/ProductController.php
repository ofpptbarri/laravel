<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function clientd(){
        $data=Product::all();
        return view('client',compact('data'));
    }
    public function allpro(Request $request)
{
    $products = Product::all(); 

    if ($request->has('search')) {
        $products->where('name', 'like', '%' . $request->input('search') . '%');
    }

    if ($request->has('category') && $request->input('category') != '') {
        $products->where('categories', $request->input('category'));
    }

    
    return view('allProducts', compact('products'));
}
    public function index(Request $request)
{
    $userId = Auth::id();
    $query = Product::where('id_user', $userId);

    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->input('search') . '%');
    }

    if ($request->has('category') && $request->input('category') != '') {
        $query->where('categories', $request->input('category'));
    }

    $products = $query->get();
    return view('seller.products', compact('products'));
}

    public function create()
    {
        return view('/seller.c');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'rating' => 'required|numeric',
            'categories' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
        $product = new Product;
        $product->id_user = Auth::id();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->rating = $request->input('rating');
        $product->categories = $request->input('categories');
    
        if($request->hasfile('image1'))
{
    $file = $request->file('image1');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . '-' . uniqid() . '.' . $extension; // Append unique identifier
    $file->move('uploads/photos/', $filename);
    $product->image1 = $filename;
}
if($request->hasfile('image2'))
{
    $file = $request->file('image2');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . '-' . uniqid() . '.' . $extension; // Append unique identifier
    $file->move('uploads/photos/', $filename);
    $product->image2 = $filename;
}
if($request->hasfile('image3'))
{
    $file = $request->file('image3');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . '-' . uniqid() . '.' . $extension; // Append unique identifier
    $file->move('uploads/photos/', $filename);
    $product->image3 = $filename;
}
    
        
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('seller.show', compact('product'));
    }
    public function showcase(string $id)
    {
        $product = Product::findOrFail($id);
        return view('seller.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->id_user === Auth::id()) {
            return view('seller.edit', compact('product'));
        } else {
            return redirect()->route('products.allpro');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:5',
            'categories' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->rating = $request->input('rating');
        $product->categories = $request->input('categories');

        if($request->hasfile('image1'))
{
    $des = 'uploads/photos/'.$product->image1;
    if(File::exists($des)){
        File::delete($des);
    }
    $file = $request->file('image1');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . '-' . uniqid() . '.' . $extension; // Append unique identifier
    $file->move('uploads/photos/', $filename);
    $product->image1 = $filename;
}
if($request->hasfile('image2'))
{
    $des = 'uploads/photos/'.$product->image2;
    if(File::exists($des)){
        File::delete($des);
    }
    $file = $request->file('image2');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . '-' . uniqid() . '.' . $extension; // Append unique identifier
    $file->move('uploads/photos/', $filename);
    $product->image2 = $filename;
}
if($request->hasfile('image3'))
{
    $des = 'uploads/photos/'.$product->image3;
    if(File::exists($des)){
        File::delete($des);
    }
    $file = $request->file('image3');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . '-' . uniqid() . '.' . $extension; // Append unique identifier
    $file->move('uploads/photos/', $filename);
    $product->image3 = $filename;
}

        

        $product->save();
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    protected function deleteOldImage($path, $filename)
    {
        $fullPath = $path . $filename;
        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }

    protected function uploadImage($file, $suffix)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = time() . $suffix . '.' . $extension;
        $file->move('uploads/productImages/', $filename);
        return $filename;
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->id_user === Auth::id()) {
            $this->deleteOldImage('uploads/productImages/', $product->image1);
            $this->deleteOldImage('uploads/productImages/', $product->image2);
            $this->deleteOldImage('uploads/productImages/', $product->image3);
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        } else {
            return redirect()->route('products.allpro');
        }
    }
}
