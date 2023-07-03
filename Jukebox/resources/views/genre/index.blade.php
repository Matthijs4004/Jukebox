@extends('layouts.master')

@push('title') Playlist - Create @endpush

@section('content')
<h1>Totaaloverzicht Genres</h1>
<ul>
@foreach ($genres as $genre)
    <li>{{$genre->name}}</li>
@endforeach
</ul> 
<a href="{{route('genre.create')}}">Create a genre</a>
@endsection