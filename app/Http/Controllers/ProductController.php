<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $products = Product::when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->get();
        return view('pages.backend.ProductPage', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'size' => 'required|string',
            'color' => 'required|string',
            'order' => 'required|unique:tbl_product,order',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $paths = [];

        foreach ($request->file('images') as $file) {
            $paths[] = $file->store('products', 'public');
        }

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'size' => $request->size,
            'order' => $request->order,
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

        $request->validate([
            'title' => 'required|string|max:255',
            'size' => 'required|string',
            'color' => 'required|string',
            'order' => 'required|unique:tbl_product,order,' .$product->order,
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // keep old images first
        $paths = json_decode($product->images, true) ?? [];

        // upload new images and append
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $file) {

                $paths[] = $file->store('products', 'public');
            }
        }

        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'size' => $request->size,
            'order' => $request->order,
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

        if ($product->images) {
            foreach ($product->images as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        $product->delete();

        return back()->with('success', 'Deleted');
    }
}
