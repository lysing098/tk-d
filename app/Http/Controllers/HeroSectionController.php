<?php

namespace App\Http\Controllers;

use App\Models\Herosection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:500',
            'page' => 'required|string|unique:tbl_hero_section,page',
            'btn_primary_text' => 'required|string|max:100',
            'btn_primary_link' => 'required|string|max:255',
            'btn_secondary_text' => 'nullable|string|max:100',
            'btn_secondary_link' => 'nullable|string|max:255',
            'background_image' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('background_image')) {
            $path = $request->file('background_image')->store('hero', 'public');
            $validated['background_image'] = $path;
        }

        Herosection::create($validated);

        return redirect()->back()->with('success', 'Hero created successfully');
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
        $hero = Herosection::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'background_image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'btn_primary_text' => 'required|string',
            'btn_primary_link' => 'required|string',
            'btn_secondary_text' => 'nullable|string',
            'btn_secondary_link' => 'nullable|string',
            'page' => 'required|string|unique:tbl_hero_section,page,' . $hero->id,
        ]);

        if ($request->hasFile('background_image')) {

            if ($hero->background_image) {
                Storage::disk('public')->delete($hero->background_image);
            }

            $path = $request->file('background_image')->store('hero', 'public');
            $validated['background_image'] = $path;
        }

        $hero->update($validated);

        return redirect()->back()->with('success', 'Hero updated successfully');
    }

    /**
     * DELETE
     */
    public function destroy(string $id)
    {
        $hero = Herosection::findOrFail($id);

        // delete image file
        if ($hero->background_image) {
            Storage::disk('public')->delete($hero->background_image);
        }

        $hero->delete();

        return back()->with('success', 'Hero deleted');
    }
}
