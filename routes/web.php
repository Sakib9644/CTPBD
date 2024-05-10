<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');

Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
// Route::get('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');

Route::post('/upload', [ProfileController::class, 'store'])->name('store.image');


// Show all categories
Route::get('/category', [CategoryController::class, 'index'])->name('categories.index');

// Show the form for creating a new category
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Store a newly created category
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Show the specified category
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Show the form for editing the specified category
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// Update the specified category
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

// Remove the specified category
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


// Show all products
Route::get('/product', [ProductController::class, 'index'])->name('products.index');

// Show the form for creating a new product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Store a newly created product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Show the specified product
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Show the form for editing the specified product
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Update the specified product
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Remove the specified product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::resource('customers', CustomerController::class);

Route::post('/profile/image-url', [ProfileController::class, 'getImageUrl'])->name('profile.image-url');



