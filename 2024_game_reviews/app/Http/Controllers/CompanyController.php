<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all()->unique('name');
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = Game::all();
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('games.index')->with('error', 'Access Denied.');
        }
        return view('companies.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            //Validates the form
            $request->validate([
                'name' => 'required',
                'role' => 'required|in:developer,publisher',
                'image' => 'required|image|max:2048',
                'description' => 'nullable|max:500',
                'games' => 'array',
                'games.*' => 'exists:games,id', //This part checks if there is a game with the given ID in the database. This is to avoid malicious users.
            ]);
    
            //Sets the path for the image
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/companies'), $imageName);
            }
            else {
                $imageName = null;
            }
    
            //Creates the company with the form data
            $company = Company::create([
                'name' => $request->name,
                'role' => $request->role,
                'image' => $imageName,
                'description' => $request->description,
            ]);
    
            $currentTimeStamp = Carbon::now();
            if ($request->has('games')) {
                $company->games()->attach($request->input('games'),  ['created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp]);
            }

            return to_route('companies.index')->with('success', 'You just added another company!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //This loads the data to reduce the number of queries needed, increasing proficiency.
        $company->load('games');
        // $companyRole = $company->role;
        $gamesString = $company->games->pluck('title')->implode(', ');
        return view('companies.show', compact('company', 'gamesString'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
