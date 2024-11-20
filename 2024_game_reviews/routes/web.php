<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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
    Route::post('/games', [GameController::class, 'store'])->name('games.store'); //I think this one get's overwritten by the one on line 31 // Update: It works without overwriting.
    Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

    Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::patch('/games/{game}/update', [GameController::class, 'update'])->name('games.update');
    Route::delete('/games/{game}/destroy', [GameController::class, 'destroy'])->name('games.destroy');

    // The code below creates all routes for reviews
    Route::resource('reviews', ReviewController::class);
    Route::post('games/{game}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // The code below creates all routes for companies
    Route::resource('companies', CompanyController::class)->middleware('auth');


});




require __DIR__.'/auth.php';

