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
        // Validate input
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'genre' => 'required',
            'year' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if the image is uploaded and handle it
        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();
            // Not sure if I need this because I don't use the public/images folder I use web urls as links to the image online.
            // $request->image->move(public_path('images/games'), $imageName);
        }

        Game::create([
            'title' => $request->title,
            'description' => $request->description,
            'release_year' => $request->release_year,
            'genre' => $request->genre,
            'image' => $image,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('games.index')->with('success', 'Game created successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
