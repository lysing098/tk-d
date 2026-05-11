<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|string',
            'order'=>'required|integer|unique:tbl_certificate,order',
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('certificate', 'public');
            $validated['image'] = $path;
        }

        Certificate::create($validated);

        return back()->with('success', 'Certificate created successfully!');
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
        $certificate = Certificate::findOrFail($id);

        $validated = $request->validate([
            'title'=>'required|string',
            'order'=>'required|integer|unique:tbl_certificate,order,' . $certificate->id,
            'image'=>'nullable|image|mimes:png,jpg,jpeg'
        ]);

        // update image if new uploaded
        if ($request->hasFile('image')) {

            // delete old image
            if ($certificate->image) {
                Storage::disk('public')->delete($certificate->image);
            }

            $path = $request->file('image')
                ->store('certificate', 'public');

            $validated['image'] = $path;
        }

        $certificate->update($validated);

        return back()->with('success', 'Certificate updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $certificate = Certificate::findOrFail($id);

        // delete image file
        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }

        $certificate->delete();

        return back()->with('success', 'Certificate deleted');
    }
}
