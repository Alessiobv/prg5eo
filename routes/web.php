<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\MusicalsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', [AboutUsController::class, 'index'])->name('about');
Route::get('/contact', [ContactUsController::class, 'index'])->name('contact');
Route::get('/musicals', [MusicalsController::class, 'index'])->name('musicals.index');
Route::get('/songs', [SongsController::class, 'index'])->name('songs.index');
Route::get('/artists', [ArtistsController::class, 'index'])->name('artists.index');
Route::get('/albums', [AlbumsController::class, 'index'])->name('albums.index');

Route::get('/dashboard', function () {
    $songs = auth()->user()
        ->songs()
        ->with(['musical', 'artist', 'album'])
        ->latest()
        ->get();
    return view('dashboard', compact('songs'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/songs/create', [SongsController::class, 'create'])->name('songs.create');
    Route::post('/songs', [SongsController::class, 'store'])->name('songs.store');
    Route::get('/songs/{song}/edit', [SongsController::class, 'edit'])->name('songs.edit');
    Route::put('/songs/{song}', [SongsController::class, 'update'])->name('songs.update');
    Route::delete('/songs/{song}', [SongsController::class, 'destroy'])->name('songs.delete');
    Route::post('/songs/{song}/like', [SongsController::class, 'like'])->name('songs.like');
    Route::post('/songs/{song}/favorite', [SongsController::class, 'favorite'])->name('songs.favorite');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/musicals/create', [MusicalsController::class, 'create'])->name('musicals.create');
    Route::post('/musicals', [MusicalsController::class, 'store'])->name('musicals.store');
    Route::get('/musicals/{musical}/edit', [MusicalsController::class, 'edit'])->name('musicals.edit');
    Route::put('/musicals/{musical}', [MusicalsController::class, 'update'])->name('musicals.update');
    Route::delete('/musicals/{musical}', [MusicalsController::class, 'destroy'])->name('musicals.delete');

    Route::get('/artists/create', [ArtistsController::class, 'create'])->name('artists.create');
    Route::post('/artists', [ArtistsController::class, 'store'])->name('artists.store');
    Route::get('/artists/{artist}/edit', [ArtistsController::class, 'edit'])->name('artists.edit');
    Route::put('/artists/{artist}', [ArtistsController::class, 'update'])->name('artists.update');
    Route::delete('/artists/{artist}', [ArtistsController::class, 'destroy'])->name('artists.delete');

    Route::get('/albums/create', [AlbumsController::class, 'create'])->name('albums.create');
    Route::post('/albums', [AlbumsController::class, 'store'])->name('albums.store');
    Route::get('/albums/{album}/edit', [AlbumsController::class, 'edit'])->name('albums.edit');
    Route::put('/albums/{album}', [AlbumsController::class, 'update'])->name('albums.update');
    Route::delete('/albums/{album}', [AlbumsController::class, 'destroy'])->name('albums.delete');
});

require __DIR__ . '/auth.php';
