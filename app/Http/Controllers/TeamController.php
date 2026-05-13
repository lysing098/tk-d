<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
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
            'name'=>'required|string',
            'role'=>'required|string',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'order'=>'required|integer|unique:tbl_team,order'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('team', 'public');
            $validated['image'] = $path;
        }

        Team::create($validated);

        return back()->with('success', 'Team created successfully!');
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
        $team = Team::findOrFail($id);

        $validated = $request->validate([
            'name'=>'required|string',
            'role'=>'required|string',
            'image'=>'nullable|image|mimes:png,jpg,jpeg',
            'order'=>'required|integer|unique:tbl_team,order,' .$team->id
        ]);

        // update image if new uploaded
        if ($request->hasFile('image')) {

            // delete old image
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }

            $path = $request->file('image')
                ->store('team', 'public');

            $validated['image'] = $path;
        }

        $team->update($validated);

        return back()->with('success', 'Team updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $team = Team::findOrFail($id);

        // delete image file
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }

        $team->delete();

        return back()->with('success', 'Team deleted');
    }
}
