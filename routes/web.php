<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\MusicalsController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/about', [AboutUsController::class, 'index'])->name('about');
Route::get('/contact', [ContactUsController::class, 'index'])->name('contact');
Route::get('/musicals', [MusicalsController::class, 'index'])->name('musicals');
Route::get('/songs', [SongsController::class, 'index'])->name('songs');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
