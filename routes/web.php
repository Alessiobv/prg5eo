<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\MusicalsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Songscontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', [AboutUsController::class, 'index'])->name('about');
Route::get('/contact', [ContactUsController::class, 'index'])->name('contact');
Route::get('/musicals', [MusicalsController::class, 'index'])->name('musicals.index');
Route::get('/songs', [SongsController::class, 'index'])->name('songs');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/musicals/create', [MusicalsController::class, 'create'])->name('musicals.create');
    Route::post('/musicals', [MusicalsController::class, 'store'])->name('musicals.store');
    Route::get('/musicals/{musical}/edit', [MusicalsController::class, 'edit'])->name('musicals.edit');
    Route::put('/musicals/{musical}', [MusicalsController::class, 'update'])->name('musicals.update');
    Route::delete('/musicals/{musical}', [MusicalsController::class, 'destroy'])->name('musicals.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
