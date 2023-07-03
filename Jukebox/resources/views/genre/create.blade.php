@extends('layouts.master')

@push('title') Genre - Create @endpush

@section('content')
<form method="POST" action="{{route('genre.store')}}">
    @csrf
    <label for="name">Genre naam:</label>
    <input type="string" name="name" id="name" value="{{old('name')}}">
    @error('name')
    <span style="color: red; font-weight: 500;">{{$message}}</span>
    @enderror
    <br>
    <input type="submit" value="submit">
</form>
<br>
@endsection