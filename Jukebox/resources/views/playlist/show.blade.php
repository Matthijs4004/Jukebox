@extends('layouts.master')

@push('title') Playlist - Details @endpush

@section('content')
<!-- playlists/show.blade.php -->
<h2>{{ $playlist->name }}</h2>
@if ($playlist->songs->count() == 0)
    <p style="color: red;">Playlist is empty</p>
@else 
    @foreach ($playlist->songs as $song)
        <li>{{ $song->name }} |
            <a href="{{ route('playlist.removeSong', ['playlist' => $playlist->id, 'song' => $song->id]) }}">Remove</a>
        </li>
    @endforeach
@endif
<br><br>
<a href="{{ route('playlist.edit', $playlist->id) }}">Edit Playlist</a>
<br>
<a href="{{ route('playlist.destroy', $playlist->id) }}">Delete</a>
@endsection