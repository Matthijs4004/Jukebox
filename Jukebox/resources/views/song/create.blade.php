@extends('layouts.master')

@push('title') Song - Create @endpush

@section('content')
<h1>Create a song</h1>
<form method="POST" action="{{route('song.store')}}">
    @csrf
    <label for="name">Fill in the name of the song: </label>
    <input type="text" name="name" id="name" value="{{old('name')}}">
    @error('name')
        <span style="color: red; font-weight: 500;">{{$message}}</span>
    @enderror
    <br>
    <label for="author">Fill in the name of the author: </label>
    <input type="text" name="author" id="author" value="{{old('author')}}">
    @error('author')
        <span style="color: red; font-weight: 500;">{{$message}}</span>
    @enderror
    <br>
    <label for="releasedate">Fill in the releasedate: </label>
    <input type="date" name="releasedate" id="releasedate" value="{{old('releasedate')}}">
    @error('releasedate')
        <span style="color: red; font-weight: 500;">{{$message}}</span>
    @enderror
    <br>
    <label for="duration">What is the duration of the song (in seconds)</label>
    <input type="number" name="duration" id="duration" value="{{old('duration')}}">
    @error('duration')
        <span style="color: red; font-weight: 500;">{{$message}}</span>
    @enderror
    <br>
    <label>Fill in a genre for the song: </label>
    <select name="genre_id">
        @foreach($genres as $genre)
        <option @if(old('genre_id') == $genre->id) selected @endif value="{{$genre->id}}">{{$genre->name}}</option>
        @endforeach
    </select>
    <br>
    <input type="submit" value="Submit">
</form>  
@endsection

