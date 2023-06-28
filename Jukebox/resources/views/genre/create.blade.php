<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
    <form method="POST" action="{{route('genre.store')}}">
        @csrf
        <label for="name">Genre naam:</label>
        <input type="text" name="genreName" id="genreName">
        <input type="submit" value="submit">
    </form>
</body>
</html>