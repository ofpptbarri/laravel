<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function allpro()
    {
        $products = Product::all();
        return view('seller.products', compact('products'));
    }

    public function index()
    {
        $userId = Auth::id();
        $products = Product::where('id_user', $userId)->get();
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
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $product = new Product;
        $product->id_user = Auth::id();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->rating = $request->input('rating');
        $product->categories = $request->input('categories');
    
        if ($request->hasFile('image1')) {
            $image1Path = $request->file('image1')->store('public/photos/');
            $product->image1 = basename($image1Path);
        }
    
        if ($request->hasFile('image2')) {
            $image2Path = $request->file('image2')->store('public/photos/');
            $product->image2 = basename($image2Path);
        }
    
        if ($request->hasFile('image3')) {
            $image3Path = $request->file('image3')->store('public/photos/');
            $product->image3 = basename($image3Path);
        }
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(string $id)
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
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->rating = $request->input('rating');
        $product->categories = $request->input('categories');

        if ($request->hasFile('image1')) {
            $this->deleteOldImage('uploads/productImages/', $product->image1);
            $product->image1 = $this->uploadImage($request->file('image1'), '_image1');
        }

        if ($request->hasFile('image2')) {
            $this->deleteOldImage('uploads/productImages/', $product->image2);
            $product->image2 = $this->uploadImage($request->file('image2'), '_image2');
        }

        if ($request->hasFile('image3')) {
            $this->deleteOldImage('uploads/productImages/', $product->image3);
            $product->image3 = $this->uploadImage($request->file('image3'), '_image3');
        }

        $product->save();
        return redirect()->back()->with('success', 'Product updated successfully!');
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
