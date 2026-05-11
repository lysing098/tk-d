<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $company = Company::when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->first();

        return view('pages.backend.CompanyPage', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|string',
            'description'=>"required|string",
            'email'=>'required|email',
            'tel'=>'required|string',
            'location'=>'required|string'
        ]);

        Company::create($validated);

        return redirect()->back()->with('success', 'Company deleted successfully');
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
            'title'=>'required|string',
            'description'=>"required|string",
            'email'=>'required|email',
            'tel'=>'required|string',
            'location'=>'required|string'
        ]);

        $company = Company::findOrFail($id);
        $company->update($validated);

        return redirect()->back()->with('success', 'Company deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Company::destroy($id);

        return redirect()->back()->with('success', 'Company deleted successfully');
    }
}
