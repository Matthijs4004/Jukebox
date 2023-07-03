@extends('layouts.master')

@push('title') Playlist - Details @endpush

@section('content')
<h2>{{ $playlist->name }}</h2>
@if ($playlist->songs->count() == 0)
    <p style="color: red;">Playlist is empty</p>
@else 
    <?php 
        $playlistDuration = 0;
        foreach ($playlist->songs as $song) {
            $playlistDuration += $song['duration'];
        }
        echo "Playlist duration: " . $playlistDuration . " seconds";
    ?>
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
<br><br>
<a href="{{route('playlist.index')}}"><- Back</a>
@endsection