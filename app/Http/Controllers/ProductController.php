<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display a listing of the products.
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    // Show the form for creating a new product.
    public function create()
    {
        return view('products_create');
    }

    // Store a newly created product in storage.
    public function store(Request $request)
{
    
    $product = new Product;
    $product->product_name = $request->product_name;
    $product->product_image = $request->product_image;
    $product->category_id = $request->category_id;


    $avatar = $request->file('product_image');
    // if (Auth::user()->type == 'Agent') {
    if($avatar != null) {
        $imgAvatar = pathinfo($avatar->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $avatar->getClientOriginalExtension();
        $avatar->move(public_path('/uploads/products/'), $imgAvatar);
        $product->product_image = $imgAvatar;
        
    }
    $product->save();

    
    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}


    // Display the specified product.
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Show the form for editing the specified product.
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product in storage.
    public function update(Request $request, Product $product)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Update the product
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from storage.
    public function destroy(Product $product)
    {
        // Delete the product
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
