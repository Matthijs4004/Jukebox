@extends('layouts.master')

@push('title') Playlist - All @endpush

@section('content')
<h1>Totaaloverzicht Playlists</h1>
<ul>
@if (isset($loginMessage))
    <p>{{ $loginMessage }}</p>
    <a href="{{ route('login') }}">Log in</a> to view your playlists.
@else
    @foreach ($playlists as $playlist)
        <li>{{$playlist->name}} -  <a href="{{'/playlist/destroy/' .  $playlist->id}}">Delete</a></li>
    @endforeach
@endif
</ul> 
@endsection
