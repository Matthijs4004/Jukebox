@extends('layouts.master')

@push('title') Playlist - Create @endpush

@section('content')
<h1>Create an playlist</h1>
<form method="POST" action="{{route('playlist.store')}}">
    @csrf
    <label for="name">Fill in the name for the playlist: </label>
    <input type="text" name="name" id="name">
    @error('name')
    <span style="color: red; font-weight: 500;">{{$message}}</span>
    @enderror
    <br>
    <input type="submit" value="Submit">
</form>
@endsection
