<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FAQController extends Controller
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
            'title' => 'required|string|max:255',
            'answer' => 'required|string',
            'order'  => 'required|integer|min:0|unique:tbl_faq,order',
            'page' => 'required|string'
        ]);

        Faq::create($validated);

        return redirect()->back()->with('success', 'FAQ created successfully');
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'answer' => 'required|string',
            'order'  => [
                'required',
                'integer',
                'min:0',
                Rule::unique('tbl_faq', 'order')->ignore($id),
            ],
            'page' => 'required|string'
        ]);


        $faq = Faq::findOrFail($id);
        $faq->update($validated);

        return redirect()->back()->with('success', 'FAQ updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Faq::destroy($id);

        return redirect()->back();
    }
}
