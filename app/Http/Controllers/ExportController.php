<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Export;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = $request->file('image')->store('exports', 'public');

        Export::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $path,
        ]);

        return response()->json([
            'message' => 'Export created successfully!'
        ], 201);
    }

    // update
    public function update(Request $request, $id)
    {
        $export = Export::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            // delete old image 
            if ($export->image && Storage::disk('public')->exists($export->image)) {
                Storage::disk('public')->delete($export->image);
            }

            $export->image = $request->file('image')->store('exports', 'public');
        }

        $export->update([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $export->image,
        ]);

        return response()->json([
            'message' => 'Export updated successfully!'
        ]);
    }

    // delete
    public function destroy($id)
    {
        $export = Export::findOrFail($id);

        if ($export->image && Storage::disk('public')->exists($export->image)) {
            Storage::disk('public')->delete($export->image);
        }

        $export->delete();

        return response()->json([
            'message' => 'Export deleted successfully!'
        ]);
    }

    // download pdf
    public function download($id)
    {
        $export = Export::findOrFail($id);

        $imageData = null;

        if ($export->image && Storage::disk('public')->exists($export->image)) {

            $imagePath = Storage::disk('public')->path($export->image);
            $extension  = pathinfo($imagePath, PATHINFO_EXTENSION);

            $imageData = 'data:image/' . $extension . ';base64,' .
                base64_encode(file_get_contents($imagePath));
        }

        $pdf = Pdf::loadView('export.pdf', [
            'export'    => $export,
            'imageData' => $imageData,
        ]);

        $fileName = \Illuminate\Support\Str::slug($export->title) . '.pdf';

        return $pdf->download($fileName);
    }
}