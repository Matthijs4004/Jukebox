@extends('layouts.master')

@push('title') Playlist - All @endpush

@section('content')
<h1>Totaaloverzicht Playlists</h1>
<ul>
@foreach ($playlists as $playlist)
    <li>{{$playlist->name}} |
        <a href="{{ route('playlist.destroy', $playlist->id) }}">Delete</a>
    </li>
    @if ($playlist->songs->count() > 0)
        <ul>
            @foreach ($playlist->songs as $song)
                <li>{{ $song->name }} |
                    <a href="{{ route('playlist.removeSong', ['playlist' => $playlist->id, 'song' => $song->id]) }}">Remove</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No songs found for this playlist.</p>
    @endif
@endforeach
</ul> 
<a href="{{route('playlist.create')}}">Create a playlist</a>

<form action="{{ route('playlist.addSongs') }}" method="POST">
    @csrf

    <label for="playlist">Select Playlist:</label>
    <select name="playlist" id="playlist">
        @foreach($playlists as $playlist)
            <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
        @endforeach
    </select>

    <label for="songs">Select Songs:</label>
    <select name="songs[]" id="songs" multiple>
        @foreach($songs as $song)
            <option value="{{ $song->id }}">{{ $song->name }}</option>
        @endforeach
    </select>

    <button type="submit">Add Songs</button>
</form>

@endsection
