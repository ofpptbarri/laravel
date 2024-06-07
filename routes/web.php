<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'seller'])->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('products.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
}); 

$router->group(['middleware' => ['auth', 'admin']], function () use ($router) {
    $router->get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    $router->patch('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    $router->delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    
    $router->get('/admin/products', [AdminController::class, 'manageProducts'])->name('admin.products');
    $router->get('/admin/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    $router->patch('/admin/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    $router->delete('/admin/products/{id}', [AdminController::class, 'destroyProduct'])->name('admin.products.destroy');
});

Route::get('/check', function () {return view('check');})->name('check');
Route::get('/allproducts', [ProductController::class, 'allpro'])->name('products.allpro');
Route::get('/products/{id}', [ProductController::class, 'showcase'])->name('products.show');