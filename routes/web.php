<?php

use App\Http\Controllers\SongController;
use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;

// 1. Landing Page
Route::get('/', function () {
    return view('welcome'); 
});

// 2. Dashboard 
Route::get('/dashboard', [SongController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 3. Spotify Search & Add
Route::middleware('auth')->group(function () {
    Route::get('/search', [SpotifyController::class, 'search'])
        ->name('songs.search');

    Route::post('/songs/add', [SpotifyController::class, 'store'])
        ->name('songs.store');
});

// 4. Playlist Routes 
    Route::get('/playlists/create', [App\Http\Controllers\PlaylistController::class, 'create'])->name('playlists.create');
    Route::post('/playlists', [App\Http\Controllers\PlaylistController::class, 'store'])->name('playlists.store');
    
    Route::get('/playlists/{playlist}', [App\Http\Controllers\PlaylistController::class, 'show'])->name('playlists.show');
    
    Route::delete('/playlists/{playlist}', [App\Http\Controllers\PlaylistController::class, 'destroy'])->name('playlists.destroy');
    
    Route::post('/playlists/{playlist}/add-song', [App\Http\Controllers\PlaylistController::class, 'addSong'])->name('playlists.addSong');
    
    Route::delete('/playlists/{playlist}/remove/{song}', [App\Http\Controllers\PlaylistController::class, 'removeSong'])->name('playlists.removeSong');

// 5. Song Management (Show & Destroy)
Route::middleware('auth')->group(function () {
    Route::get('/songs/{song}', [SongController::class, 'show'])
        ->name('songs.show');
        
    Route::delete('/songs/{song}', [SongController::class, 'destroy'])
        ->name('songs.destroy');
});

// 6. Profile Settings (Livewire Version)
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';