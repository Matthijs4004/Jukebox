@extends('layouts.master')

@push('title') Song - Overview @endpush

@section('content')
<h1>Totaaloverzicht Songs</h1>
<ul>
@foreach ($songs as $song)
    <li>
        <a href="{{ route('song.show', ['id' => $song->id]) }}">{{$song->name}}</a> - {{$song->author}} 
            | <a href="{{'/song/destroy/' .  $song->id}}">Delete</a>
        </li>
@endforeach
</ul>
<a href="{{route('song.create')}}">Create a song</a>
@endsection