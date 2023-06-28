<?php

namespace App\Http\Controllers;

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
        if (Auth::check()) {
            $user = Auth::user(); // Retrieve the authenticated user
            $playlists = $user->playlists;
            return view('playlist.index', ['playlists' => $playlists]);
        }
        
        $loginMessage = 'You need to be logged in to view your playlists.';
        return view('playlist.index', compact($loginMessage));
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

        $validatedData = $request ->validate([
            'name' => 'required',
        ]);

        /*playlist::create([
            "name" => $request['name']
        ]);
        */
        $playlist = new Playlist($validatedData);
        $playlist->user_id = $user->id;
        $playlist->save();
        //$playlist = $user->playlists()->create($validatedData);
        return redirect(route('playlist.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(playlist $playlist)
    {
        playlist::destroy($playlist->id);
        //return redirect(route('playlist.index'));
    }

    public function addSongToPlaylist(playlist $playlist) {
        
    }
}
