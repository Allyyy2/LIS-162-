<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\Session;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;


class SpotifyController extends Controller
{
    // 1. Search Function
    public function search(Request $request)
    {
        $query = $request->input('q');
        $tracks = [];


        if ($query) {
            $session = new Session(
                env('SPOTIFY_CLIENT_ID'),
                env('SPOTIFY_CLIENT_SECRET')
            );
           
            $session->requestCredentialsToken();
            $accessToken = $session->getAccessToken();

            $api = new SpotifyWebAPI();
            $api->setAccessToken($accessToken);

            $results = $api->search($query, 'track', ['limit' => 20]);
            $tracks = $results->tracks->items;
        }

        return view('songs.search', compact('tracks', 'query'));
    }

    // 2. Store Function
    public function store(Request $request)
    {
        $request->validate([
            'spotify_id' => 'required',
            'title' => 'required',
            'artist' => 'required',
            'image' => 'nullable',
        ]);


        // Create the song in the database connected to the User
        Song::create([
            'user_id' => Auth::id(),
            'spotify_id' => $request->spotify_id,
            'title' => $request->title,
            'artist' => $request->artist,
            'image' => $request->image,
        ]);


        return redirect()->route('dashboard');
    }
}