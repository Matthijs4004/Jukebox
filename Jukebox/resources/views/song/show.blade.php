@extends('layouts.master')

@push('title') Song - Details @endpush

@section('content')
<h1>{{ $song->name }}</h1>
<p>Author: {{ $song->author }}</p>
<p>Releasedate: {{ $song->releasedate }}</p>
<p>Duration: {{ $song->duration }}</p>
<p>Genre: {{$song->genre->name}}</p>

<a href="{{route('song.index')}}"><- Back</a>
@endsection