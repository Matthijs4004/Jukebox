<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist - Overview</title>
</head>
<body>
    <h1>Totaaloverzicht Genres</h1>
    <ul>
    @foreach ($playlists as $playlist)
        <li>{{$playlist->name}} -  <a href="{{'/playlist/destroy/' .  $playlist->id}}">Delete</a></li>
    @endforeach
    </ul> 
</body>
</html>