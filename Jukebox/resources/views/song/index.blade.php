@extends('layouts.master')

@push('title') Song - Overview @endpush

@section('content')
<h1>Totaaloverzicht Songs</h1>
<form action="{{ route('song.index') }}" method="GET">
    <label for="genre">Select Genre:</label>
    <select name="genre" id="genre">
        <option value="">All Genres</option>
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>

<ul>
@foreach ($songs as $song)
    <li>
        <a href="{{ route('song.show', ['id' => $song->id]) }}">{{$song->name}}</a> - {{$song->author}} | {{$song->genre->name}}
        | <a href="{{'/song/destroy/' .  $song->id}}">Delete</a>
        </li>
@endforeach
</ul>
<a href="{{route('song.create')}}">Create a song</a>
@endsection