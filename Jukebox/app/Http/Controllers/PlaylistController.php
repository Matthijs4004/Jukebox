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
        $user = Auth::user(); // Retrieve the authenticated user
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

        $validatedData = $request->validate([
            'name' => 'required',
        ]);

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
        //dd($id);
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
        $id = $playlist->id;
        $playlist = Playlist::findOrFail($id);
        $playlist->name = $request->input('name');
        // Perform other updates as needed
        $playlist->save();

        return redirect()->route('playlist.show', $playlist->id)
            ->with('success', 'Playlist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        $playlistId = $playlist->id;
        $playlist = Playlist::findOrFail($playlistId);
        $playlist->songs()->detach(); // Remove all associated songs from the relationship table
        $playlist->delete(); // Delete the playlist

        return redirect(route('playlist.index'));
    }

    public function addSongs(Request $request) {
        $playlist = Playlist::find($request->input('playlist'));
        $song = $request->input('song');
        $playlist->songs()->attach($song);

        return redirect(route('playlist.index'));
    }

    public function removeSong($playlistId, $songId) {
        $playlist = Playlist::findOrFail($playlistId);
        $playlist->songs()->detach($songId);

        return redirect(route('playlist.index'));
    }

}
