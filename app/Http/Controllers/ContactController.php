<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->search;


        $contact = Contact::when($search, function ($query) use ($search) {
            $query->where('fullname', 'like', "%{$search}%")
                ->orWhere('company', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('country', 'like', "%{$search}%");
        })->get();

        return view('pages.backend.ContactPage',compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname'=>'required|string',
            'company'=>'required|string',
            'country'=>"required|string",
            'email'=>'required|email',
            'whatsapp'=>'nullable|string',
            'product'=>'required|string',
            'qty'=>'required|integer',
            'message'=>'nullable|string'
        ]);

        Contact::create($validated);

        return back()->with('success','Contact create success');
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
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'fullname' => 'required|string',
            'company' => 'required|string',
            'country' => 'required|string',
            'email' => 'required|email',
            'whatsapp' => 'nullable|string',
            'product'=>'required|string',
            'qty' => 'required|integer',
            'message' => 'nullable|string'
        ]);

        $contact = Contact::findOrFail($id);

        $contact->update($validated);

        return back()->with('success', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return back()->with('success', 'Contact deleted successfully');
    }
}
