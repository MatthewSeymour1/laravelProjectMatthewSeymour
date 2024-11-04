<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'genre' => 'required|max:100',
            'release_year' => 'required|integer',
            'image' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/games'), $imageName);
        }
        else {
            $imageName = null;
        }

        game::create([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => $request->genre,
            'release_year' => $request->release_year,
            'image' => $imageName,
        ]);

        return to_route('games.index')->with('success', 'You just added another game!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show')->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'genre' => 'required|max:100',
            'release_year' => 'required|integer',
            'image' => 'sometimes|image|max:2048',
        ]);


        // Josh helped me out a bunch here. My original code didn't have the unlink() part so if a game was created, the path would be recorded as images/games. Which is a problem with out unlink() because when I went to re-set the path it would record it as images/games/images/games.
        $data = $request->only(['title', 'description', 'genre', 'release_year']);
        
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
