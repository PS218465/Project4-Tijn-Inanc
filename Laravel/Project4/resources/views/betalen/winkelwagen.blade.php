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
    <p>prijs = €{{$prijs}}</p>
</body>
</html>