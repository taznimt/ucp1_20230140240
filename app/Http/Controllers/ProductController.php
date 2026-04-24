<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // ambil semua product beserta user dan category
        $products = Product::with(['user', 'category'])->latest()->get();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        // ambil semua category untuk dropdown
        $categories = Category::orderBy('name')->get();

        return view('product.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        Product::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
        ]);

        return redirect()->route('product.index')->with('success', 'Product berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $product = Product::with(['user', 'category'])->findOrFail($id);

        return view('product.view', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);

        // ambil semua category untuk dropdown
        $categories = Category::orderBy('name')->get();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
        ]);

        return redirect()->route('product.index')->with('success', 'Product berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }
}