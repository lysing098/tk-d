<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::when($search, function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('color', 'like', "%{$search}%")
                  ->orWhere('size', 'like', "%{$search}%");
        })->latest()->get();

        return view('pages.backend.ProductPage', compact('products'));
    }

    public function store(Request $request)
    {
            // CHECK DUPLICATE FIRST
        $exists = Product::where('title', $request->title)
            ->where('size', $request->size)
            ->whereJsonContains('color', $request->color)
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'This product already exists with same title, size and color.'
            ], 409);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            // 'description' => 'nullable|string',
            'size' => 'required|string',
            'color' => 'required|string',
            // 'order' => 'required|integer|unique:tbl_product,order',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        $paths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $paths[] = $file->store('products', 'public');
            }
        }

        Product::create([
            'title' => $request->title,
            // 'description' => $request->description,
            'size' => $request->size,
            // 'order' => $request->order,
            'color' => json_encode([$request->color]),
            'images' => json_encode($paths),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully'
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // CHECK DUPLICATE EXCEPT CURRENT PRODUCT
        $exists = Product::where('title', $request->title)
            ->where('size', $request->size)
            ->whereJsonContains('color', $request->color)
            ->where('id', '!=', $product->id)
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'This product already exists with same title, size and color.'
            ], 409);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'size' => 'required|string',
            'color' => 'required|string',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        // KEEP EXISTING IMAGES
        $paths = $request->existing_images ?? [];

        // ADD NEW IMAGES
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $paths[] = $file->store('products', 'public');
            }
        }

        // DELETE REMOVED IMAGES
        $oldImages = json_decode($product->images, true) ?? [];

        foreach ($oldImages as $oldImg) {
            if (!in_array($oldImg, $paths)) {
                Storage::disk('public')->delete($oldImg);
            }
        }

        $product->update([
            'title' => $request->title,
            'size' => $request->size,
            'color' => json_encode([$request->color]),
            'images' => json_encode($paths),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $images = json_decode($product->images, true) ?? [];

        foreach ($images as $img) {
            Storage::disk('public')->delete($img);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ]);
    }
}
