<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Export;
use App\Models\Faq;
use App\Models\Herosection;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $hero = Herosection::where('page', 'export')->first(); // keep single hero

        $export = Export::first();

        $faqs = Faq::where('page','export')->
        when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('answer', 'like', "%{$search}%");
            })
            ->orderBy('id', 'asc')
            ->get();


        return view('pages.backend.ExportPage',compact('hero','faqs','export'));
    }
    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|mimes:pdf',
        ]);

        $path = $request->file('file')->store('exports', 'public');

        Export::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $path,
        ]);

        return back()->with('success', 'Export created successfully!');
    }

    // update
    public function update(Request $request, $id)
    {
        $export = Export::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|mimes:pdf',
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

        return back()->with('success', 'Export updated successfully!');
    }

    // delete
    public function destroy($id)
    {
        $export = Export::findOrFail($id);

        if ($export->image && Storage::disk('public')->exists($export->image)) {
            Storage::disk('public')->delete($export->image);
        }

        $export->delete();

        return back()->with('success', 'Export deleted successfully!');
    }

    // download pdf
    public function download($id)
    {
        $export = Export::findOrFail($id);

        if (!$export->image || !Storage::disk('public')->exists($export->image)) {
            abort(404, 'File not found');
        }

        return Storage::disk('public')->download($export->image);
    }
}
