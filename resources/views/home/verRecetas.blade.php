<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/gg.css')}}">
    <title>Document</title>
</head>
<body>


<div>
    <div class="image">
        <img src="{{ asset('storage/' . $recetas->images) }}" alt="{{ $recetas->images }}">
    </div>
    <h1 class="title">{{ $recetas->name }}</h1><br>
    <p>{{ $recetas->ingredients }}</p><br>
    <p>{{ $recetas->description }}</p>
</div>

   
</body>
</html>