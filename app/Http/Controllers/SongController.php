<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    // Show the Dashboard with the user's songs
    public function index()
    {
        $user = Auth::user();
        
        // Get Songs and Playlists
        $songs = $user->songs()->latest()->get();
        $playlists = $user->playlists()->latest()->get();
        
        return view('dashboard', compact('songs', 'playlists'));
    }

    // Show details of one specific song
    public function show(Song $song)
    {
        if ($song->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('songs.show', compact('song'));
    }

    // Delete a song
    public function destroy(Song $song)
    {
        if ($song->user_id !== Auth::id()) {
            abort(403);
        }

        $song->delete();

        return redirect()->route('dashboard');
    }
}