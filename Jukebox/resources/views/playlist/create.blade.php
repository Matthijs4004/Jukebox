<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playlist - Create</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
    <form method="POST" action="{{route('playlist.store')}}">
        @csrf
        <label for="name">Fill in the name for the playlist: </label>
        <input type="text" name="playlistName" id="playlistName"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>