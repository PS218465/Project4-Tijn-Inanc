<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Menu</title>
</head>
<body>
<!--index below-->
@if(Auth::check())
@if(isset($pizzas))
    @foreach($pizzas as $pizza)
    <a href="/menu/{{$pizza->id}}">
        <li>Pizza {{$pizza->naam}} {{$pizza->kosten}}</li>
    </a>
    @endforeach
@endif
<!--show below-->
@if(isset($ingredienten))
<form action="/winkelmandje" method="POST">
    @csrf
    <p class="text-3xl">Pizza {{$Name->naam}} {{$Name->kosten}}</p>
    @foreach($ingredienten as $ingredient)
        <li>{{$ingredient}}</li>
    @endforeach
    <select name="size">
        <option value="small">Small</option>
        <option selected="selected" value="medium">Medium</option>
        <option value="large">Large</option>
    </select>
    <!-- hidden -->
    <input type="hidden" name="ingredienten" value="{{$Name->ingredienten}}">
    <input type="hidden" name="naam" value="{{$Name->naam}}">
    <input type="hidden" name="kosten" value="{{$Name->kosten}}">
    <!--  -->
    <input name="hoeveelheid" type="text" placeholder="Hoeveel..."> <br>
    <input type="submit" value="aan winkelmandje toevoegen">
</form>
@endif
@else
    <p class="text-3xl">om te bestellen moet je eerst inloggen</p>
    <a href="/login"><p>Login</p></a>
    <a href="/register"><p>register</p></a>
@endif
</body>
</html>