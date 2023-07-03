@extends('layouts.master')

@push('title') Song - Overview @endpush

@section('content')
<h1>Totaaloverzicht Songs</h1>
<form class="form__song-filter" action="{{ route('song.index') }}" method="GET">
    <label for="genre">Select Genre:</label>
    <select name="genre" id="genre">
        <option value="" {{ old('genre') == "" ? 'selected' : '' }}>All Genres</option>
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}" {{ old('genre') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>
<table class="table__song-overview">
    <thead>
        <tr>
            <th>Song</th>
            <th>Author</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($songs as $song)
            <tr>
                <td><a href="{{ route('song.show', ['id' => $song->id]) }}">{{$song->name}}</a></td>
                <td>{{ $song->author }}</td>
                <td>{{ $song->genre->name }}</td>
                <td><a href="{{ route( 'song.destroy', $song->id )}}">Delete</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<a class="button__song-create" href="{{route('song.create')}}">Create a song</a>
@endsection