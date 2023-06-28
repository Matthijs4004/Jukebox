@extends('layouts.master')

@push('title') Playlist - All @endpush

@section('content')
<h1>Totaaloverzicht Playlists</h1>
<ul>
@foreach ($playlists as $playlist)
    <li>{{$playlist->name}} -  <a href="{{'/playlist/destroy/' .  $playlist->id}}">Delete</a></li>
@endforeach
</ul> 
@endsection
