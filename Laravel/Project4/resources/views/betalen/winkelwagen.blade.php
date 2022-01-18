<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>winkelwagen</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    @if($prijs == 0)
        <p>Je hebt niks in je winkelmandje zitten</p>
    @endif
    @foreach($items as $item)
    <div>
        <ul class="flex">
            <li class="flex-1 mr-2"><p>{{$item->naam}} </p></li>
            <li class="flex-1 mr-2"><p>{{$item->stuks}} </p></li>
            <li class="flex-1 mr-2"><p>{{$item->size}} </p></li>
            <li class="flex-1 mr-2"><a href="/winkelmandje/{{$item->id}}"><p>ingredienten aanpassen</p></a></li>
            <form action="/winkelmandje/{{$item->id}}" method="post" class="text-blue-500 text-center">
            @method('delete') 
            @csrf
            <input type="submit" value="delete" class="cursor-pointer bg-transparent">
            </form>
        </ul>
    </div>
    @endforeach
    <form action="/bestellen" method="POST">
    @csrf
    
    <p>prijs = €{{$prijs}}</p>
    
        
        <!-- hidden -->
        @php ($lengte = 0)
        @foreach($items as $item)
        @php ($lengte++)
        <input type="hidden" name="naam{{$lengte}}" value="{{$item->naam}}">
        <input type="hidden" name="ingredienten{{$lengte}}" value="{{$item->ingredienten}}">
        <input type="hidden" name="stuks{{$lengte}}" value="{{$item->stuks}}">
        @endforeach
        <input type="hidden" name="lengte" value="{{$lengte}}">
        <input type="hidden" name="price" value="{{$prijs}}">
        <input type="submit" value="bestellen">
    </form>
</body>
</html>