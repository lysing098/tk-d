<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Herosection;
use App\Models\Team;
use Illuminate\Http\Request;

class AdminAboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $hero = Herosection::where('page', 'about')->first(); // keep single hero

        $teams = Team::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%");
        })->get();

        $certificates = Certificate::when($search, function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%");
        })->get();

        return view('pages.backend.AboutUsPage', compact('teams', 'certificates', 'hero'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
