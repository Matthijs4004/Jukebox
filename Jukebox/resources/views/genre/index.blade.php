<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
</head>
<body>
    <h1>Totaaloverzicht Genres</h1>
    <ul>
    @foreach ($genres as $genre)
        <li>{{$genre->name}} <a href="{{'/genre/destroy/' .  $genre->id}}">X</a></li>
    @endforeach
    </ul> 
</body>
</html>