@extends('layouts.master')

@push('title') Playlist - Create @endpush

@section('content')
<h1>Totaaloverzicht Genres</h1>
<ul>
@foreach ($genres as $genre)
    <li>{{$genre->name}} <a href="{{'/genre/destroy/' .  $genre->id}}">X</a></li>
@endforeach
</ul> 
@endsection