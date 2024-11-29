<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/games', [GameController::class, 'index'])->name('games.index');
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games', [GameController::class, 'store'])->name('games.store');
    Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

    Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::patch('/games/{game}/update', [GameController::class, 'update'])->name('games.update');
    Route::delete('/games/{game}/destroy', [GameController::class, 'destroy'])->name('games.destroy');

    // The code below creates all routes for reviews
    Route::resource('reviews', ReviewController::class);
    Route::post('games/{game}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // The code below creates all routes for companies
    Route::resource('companies', CompanyController::class)->middleware('auth');
    Route::get('companies/{company}', [CompanyController::class, 'show'])->name('companies.show');


    // This part returns the user to the games.index page if they enter an incorrect URL (that is if they are logged in. Else they get returned to the dashboard).
    // This is to ensure they don't ever see a 404 not found page.
    Route::fallback(function () {
        if (auth()->check()) {
            return redirect()->route('games.index')->with('error', 'Close! But no cigar, Merry Christmas!');
        }
        return redirect('/');
    });

});




require __DIR__.'/auth.php';

