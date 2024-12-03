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
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'name_asc');
        $query = Company::query();

        //Filters the list of games
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        //Sorts the filtered list of games
        //If there is no filter, than it sorts the entire list of games
        if ($sort == 'name_asc') {
            $query->orderBy('name', 'asc');
        }
        else if ($sort == 'name_desc') {
            $query->orderBy('name', 'desc');
        }

        $companies = $query->get()->unique('name');
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
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('companies.index')->with('error', 'Access Denied.');
        }
        $games = Game::all();
        $relatedGames = $company->games->pluck('id')->toArray();
        return view('companies.edit', compact('games', 'company', 'relatedGames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //Validates the form
        $validated = $request->validate([
            'name' => 'required',
            'role' => 'required|in:developer,publisher',
            'image' => 'sometimes|image|max:2048',
            'description' => 'nullable|max:500',
            'games' => 'array',
            'games.*' => 'exists:games,id',
        ]);
        $data = $request->only(['name', 'role', 'image', 'description']);

        if ($request->hasFile('image')) {
            if ($company->image && file_exists(public_path($company->image))) {
                unlink(public_path($company->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->move(public_path('images/companies'), $imageName);
            $data['image'] = $imageName;
        } 

        $company->update($data);

        if ($request->has('games')) {
            $company->games()->sync($validated['games']);
            $currentTimeStamp = Carbon::now();

            //Updates the timestamps for the added pivot table entries.
            //However this also updates the timestamps for the rows that haven't changed. Still working on a fix.
            foreach ($validated['games'] as $gameId) {
                $company->games()->updateExistingPivot($gameId, [
                    'updated_at' => $currentTimeStamp,
                    'created_at' => $currentTimeStamp,
                ]);
            }
        }
        return redirect()->route('companies.index')->with('success', 'Company Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //Note: Laravel automatically uses the detach function to remove the relevant entry from the pivot table due to the belongsToMany()
        //function in the model.
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company Deleted Successfully');
    }
}
