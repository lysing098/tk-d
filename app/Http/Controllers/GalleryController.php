<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::orderBy('id', 'desc')->get();
        return view('pages.backend.GalleryPage', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        $paths = [];

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $file) {

                $paths[] = $file->store('galleries', 'public');
            }
        }

        Gallery::create([
            'images' => $paths,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gallery created successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        $paths = $request->existing_images ?? [];

        // upload new images
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $file) {

                $paths[] = $file->store('galleries', 'public');
            }
        }

        // delete removed old images
        $oldImages = $gallery->images ?? [];

        foreach ($oldImages as $old) {

            if (!in_array($old, $paths)) {

                Storage::disk('public')->delete($old);
            }
        }

        $gallery->update([
            'images' => $paths,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gallery updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->images) {

            foreach ($gallery->images as $img) {

                Storage::disk('public')->delete($img);
            }
        }

        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery deleted successfully',
        ]);
    }
}
