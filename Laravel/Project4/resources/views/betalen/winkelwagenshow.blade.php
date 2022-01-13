<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
<p class="text-4xl pb-3">Je ingrediënten aanpassen!</p>
<p class="text-2xl">Pizza {{$Name->naam}}</p>
    @foreach($ingredienten as $ingredient)
        <input type="text" value="{{$ingredient}}"> 
    @endforeach
    
    <br><input type="submit"> 
</body>
</html>