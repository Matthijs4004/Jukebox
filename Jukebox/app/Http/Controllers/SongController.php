<?php

namespace App\Http\Controllers;


use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Auth::user());
        $songs = Song::all();
        return view('song.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('song.create', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'name' => 'required',
            'author' => 'required',
            'releasedate' => 'required|date',
            'duration' => 'required|integer',
            'genre_id' => 'required'
        ]);

        Song::create([
            "name" => $request['name'],
            "author" => $request['author'],
            "releasedate" => $request['releasedate'],
            "duration" => $request['duration'],
            "genre_id" => $request['genre_id']
        ]);
        return redirect(route('song.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $song = Song::findOrFail($id);
        //dd($song);
        return view('song.show', ['song' => $song]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        Song::destroy($song->id);
        return redirect(route('song.index'));
    }
}
