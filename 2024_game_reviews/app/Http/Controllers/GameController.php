<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class GameController extends Controller
{
    public function index(Request $request)
    {
        //Initialises variables
        $search = $request->input('search');
        $sort = $request->input('sort', 'title_asc');
        $query = Game::query();


        //Filters the list of games
        if ($search) {
            $query->where('title', 'like', "%$search%");
        }

        //Sorts the filtered list of games
        //If there is not filter, than it sorts the entire list of games
        if ($sort == 'title_asc') {
            $query->orderBy('title', 'asc');
        }
        else if ($sort == 'title_desc') {
            $query->orderBy('title', 'desc');
        }
        else if ($sort == 'release_year_asc') {
            $query->orderBy('release_year', 'asc');
        }
        else if ($sort == 'release_year_desc') {
            $query->orderBy('release_year', 'desc');
        }

        $games = $query->get();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('games.index')->with('error', 'Access Denied.');
        }
        return view('games.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //Validates the form
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'genre' => 'required|max:100',
            'release_year' => 'required|integer',
            'image' => 'required|image|max:2048',
            'companies' => 'array',
            'companies.*' => 'exists:companies,id',
        ]);

        //Sets the path for the image
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/games'), $imageName);
        }
        else {
            $imageName = null;
        }

        //Creates the game with the form data
        $game = Game::create([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => $request->genre,
            'release_year' => $request->release_year,
            'image' => $imageName,
        ]);

        $currentTimeStamp = Carbon::now();
        if ($request->has('companies')) {
            $game->companies()->attach($request->input('companies'),  ['created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp]);
        }

        return to_route('games.index')->with('success', 'You just added another game!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //This loads the data to reduce the number of queries needed, increasing proficiency.
        $game->load('reviews.user', 'publishers', 'developers', 'companies');

        //Gets the list of publishers and developers
        $publishersString = $game->publishers->pluck('name')->implode(', ');
        $developersString = $game->developers->pluck('name')->implode(', ');

        return view('games.show', compact('game', 'publishersString', 'developersString'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('games.index')->with('error', 'Access Denied.');
        }
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //Validates the form
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'genre' => 'required|max:100',
            'release_year' => 'required|integer',
            'image' => 'sometimes|image|max:2048',
        ]);


        // Josh helped me out a bunch here. My original code didn't have the unlink() part so if a game was created, 
        // the path would be recorded as images/games. Which is a problem with out unlink() because when I went to re-set the path
        // it would record it as images/games/images/games.
        $data = $request->only(['title', 'description', 'genre', 'release_year']);
        
        //If there's a file
        //  If there's already a path set
        //Set a new path
        if ($request->hasFile('image')) {
            if ($game->image && file_exists(public_path($game->image))) {
                unlink(public_path($game->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->move(public_path('images/games'), $imageName);
            $data['image'] = $imageName;
        } 

        $game->update($data);
        return redirect()->route('games.index')->with('success', 'Game Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game Deleted Successfully');
    }


}
