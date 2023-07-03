<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Selecting logged in user and selecting the connecting playlists from that user
        $user = Auth::user(); 
        $playlists = $user->playlists;

        $songs = Song::all();
        return view('playlist.index', ['playlists' => $playlists], ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('playlist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validating input from form
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        // Storing the playlist with validated name and adding the user id to the playlist.
        $playlist = new Playlist($validatedData);
        $playlist->user_id = $user->id;
        $playlist->save();
        
        return redirect(route('playlist.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $playlist = Playlist::findOrFail($id);
        return view('playlist.show', ['playlist' => $playlist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        $id = $playlist->id;
        $playlist = Playlist::findOrFail($id);
        $songs = Song::all();

        return view('playlist.edit', ['playlist' => $playlist], ['songs' => $songs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        // Updating the name of the playlist and storing it
        $id = $playlist->id;
        $playlist = Playlist::findOrFail($id);
        $playlist->name = $request->input('name');
        $playlist->save();

        return redirect()->route('playlist.edit', $playlist->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        // Search for playlist and detaching all songs in the relationship table and then delete the playlist.
        $playlistId = $playlist->id;
        $playlist = Playlist::findOrFail($playlistId);
        $playlist->songs()->detach();
        $playlist->delete();

        return redirect(route('playlist.index'));
    }

    public function addSongs(Request $request, $id) 
    {
        // Attaching the song to the playlist.
        $playlist = Playlist::find($id);
        $song = $request->input('song');
        $playlist->songs()->attach($song);

        return redirect(route('playlist.edit', ['playlist' => $playlist]));
    }

    public function removeSong($playlistId, $songId) 
    {
        // Detaching the song from the playlist.
        $playlist = Playlist::findOrFail($playlistId);
        $playlist->songs()->detach($songId);

        return redirect(route('playlist.show', ['playlist' => $playlist]));
    }

}
