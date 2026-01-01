<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    // 1. Create Playlist Page
    public function create()
    {
        return view('playlists.create');
    }

    // 2. Save New Playlist
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        Playlist::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard');
    }

    // 3. View a Single Playlist (See songs inside)
    public function show(Playlist $playlist)
    {
        // Get songs only inside this playlist
        $songs = $playlist->songs; 
        return view('playlists.show', compact('playlist', 'songs'));
    }

    // 4. Delete a Playlist
    public function destroy(Playlist $playlist)
    {
        // Security check: Make sure the user owns this playlist
        if ($playlist->user_id !== Auth::id()) {
            abort(403);
        }

        $playlist->delete();
        return redirect()->route('dashboard');
    }

    // 5. Add a Song to a Playlist
    public function addSong(Request $request, $playlistId)
    {
        $playlist = Playlist::findOrFail($playlistId);
        $songId = $request->input('song_id');

        // Check if song is already in the playlist to avoid duplicates
        if (!$playlist->songs()->where('song_id', $songId)->exists()) {
            $playlist->songs()->attach($songId);
        }

        return redirect()->back()->with('status', 'Song added to playlist!');
    }
    
    // 6. Remove Song from Playlist
    public function removeSong(Playlist $playlist, Song $song)
    {
        $playlist->songs()->detach($song->id);
        return redirect()->back();
    }
}