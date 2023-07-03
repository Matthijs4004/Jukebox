<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@stack('title')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body class="container">
    <header class="header">
        <nav class="header__navbar">
            <ul style="display:flex;list-style: none;gap: 10px;">
                <li><a href="{{route('genre.index')}}">Genres</a></li>
                <li><a href="{{route('song.index')}}">Songs</a></li>
                <li><a href="{{route('playlist.index')}}">Playlists</a></li>
            </ul>
            <ul>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <li>
                        <a href="{{ route('dashboard') }}">Welcome, {{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>