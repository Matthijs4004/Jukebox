@extends('layouts.master')

@push('title') Playlist - All @endpush

@section('content')
<h1>Totaaloverzicht Playlists</h1>
<ul>
@foreach ($playlists as $playlist)
    <li>{{$playlist->name}} |
        <?php //dd($playlist->id); ?>
        <a href="{{ route('playlist.show', $playlist->id) }}">Manage</a>
        |
        <a href="{{ route('playlist.destroy', $playlist->id) }}">Delete</a>
    </li>
    @if ($playlist->songs->count() > 0)
        <ul>
            @foreach ($playlist->songs as $song)
                <li>{{ $song->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No songs found for this playlist.</p>
    @endif
@endforeach
</ul> 
<a href="{{route('playlist.create')}}">Create a playlist</a><br>
@endsection
