<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hier zijn alle users:</h1>
    @foreach ($users as $user)
    <p>{{$user->name}} - {{$user->email}} - {{$user->password}}</p>
    @endforeach 
</body>
</html>