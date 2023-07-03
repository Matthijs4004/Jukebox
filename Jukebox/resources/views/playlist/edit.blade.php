@extends('layouts.master')

@push('title') Playlist - Edit @endpush

@section('content')
<form action="{{ route('playlist.update', $playlist->id) }}" method="POST">
    @csrf
    <label for="name">Playlist Name:</label>
    <input type="text" id="name" name="name" value="{{ $playlist->name }}">
    <button type="submit">Update Playlist</button>
</form>

<h2>Add a song to your playlist</h2>
<form action="{{ route('playlist.addSongs', $playlist->id) }}" method="POST">
    @csrf
    <label for="song">Select Songs:</label>
    <select name="song" id="song">
        @foreach($songs as $song)
            <option value="{{ $song->id }}">{{ $song->name }}</option>
        @endforeach
    </select>

    <button type="submit">Add song</button>
</form><br>

<a href="{{route('playlist.show', $playlist->id)}}"><- Back</a>


@endsection