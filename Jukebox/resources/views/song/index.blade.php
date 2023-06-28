@extends('layouts.master')

@push('title') Song - Overview @endpush

@section('content')
    <h1>Totaaloverzicht Songs</h1>
    <ul>
    @foreach ($songs as $song)
        <li>
            {{$song->name}} - {{$song->author}} | Releasedate:  {{$song->releasedate}} | Duration: {{$song->duration}} | is found in playlist: 
            @foreach($song->playlists as $playlist) 
                {{$playlist->name}}; 
            @endforeach
             | <a href="{{'/song/destroy/' .  $song->id}}">Delete</a>
            </li>
    @endforeach
    </ul>
    <a href="{{route('song.create')}}">Create a song</a>
@endsection