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
        <input type="string" name="name" id="name" value="{{old('name')}}">
        @error('name')
        <span style="color: red; font-weight: 500;">{{$message}}</span>
        @enderror
        <br>
        <input type="submit" value="submit">
    </form>
</body>
</html>