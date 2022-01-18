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
<p class="text-gray-400 text-2xl pb-3">(elk ingrediënt komt er 1 euro bij!)</p>
@php ($price=$Name->kosten)
<p class="text-3xl">Pizza {{$Name->naam}}</p>
<!-- meat -->
    <p class='text-2xl'>Meat</p> 
    <form action="/winkelmandje/{{$Name->id}}" method="POST">
    @method('patch') 
    @csrf
    @foreach($vlees as $v)  
    @php ($l = 1)
        <div class='rounded-b-sm border-b-2 flex w-1/4 items-center justify-between'>
            <p>{{$v}}</p>
            @for($i = 0; $i < count($ingredienten); $i++)
                @if($ingredienten[$i] == $v)
                <input min="0" max='5' value="1" name='{{$v}}' type="number">
                @php ($l++)
                @endif
            @endfor
            @if($l==1)
                <input min="0" max='5' value="0" name='{{$v}}' type="number">
            @endif
        </div>
    @endforeach

    <!-- groente -->
    <p class='text-2xl'>Meat</p> 
    
    @foreach($groente as $g)  
    @php ($l = 1)
        <div class='rounded-b-sm border-b-2 flex w-1/4 items-center justify-between'>
            <p>{{$g}}</p>
            @for($i = 0; $i < count($ingredienten); $i++)
                @if($ingredienten[$i] == $g)
                <input min="0" max='5' value="1" name='{{$g}}' type="number">
                @php ($l++)
                @endif
            @endfor
            @if($l==1)
                <input min="0" max='5' value="0" name='{{$g}}' type="number">
            @endif
        </div>
    @endforeach

    <!-- kaas -->
    <p class='text-2xl'>Kaas</p> 
    
    @foreach($kaas as $k)  
    @php ($l = 1)
        <div class='rounded-b-sm border-b-2 flex w-1/4 items-center justify-between'>
            <p>{{$k}} kaas</p>
            @for($i = 0; $i < count($ingredienten); $i++)
                @if($ingredienten[$i] == $k)
                <input min="0" max='5' value="1" name='{{$k}}' type="number">
                @php ($l++)
                @endif
            @endfor
            @if($l==1)
                <input min="0" max='5' value="0" name='{{$k}}' type="number">
            @endif
        </div>
    @endforeach
    <!-- swirl -->
    <p class='text-2xl'>Swirl</p> 
    
    @foreach($swirl as $s)  
    @php ($l = 1)
        <div class='rounded-b-sm border-b-2 flex w-1/4 items-center justify-between'>
            <p>{{$s}} swirl</p>
            @for($i = 0; $i < count($ingredienten); $i++)
                @if($ingredienten[$i] == $s)
                <input min="0" max='5' value="1" name='{{$s}}' type="number">
                @php ($l++)
                @endif
            @endfor
            @if($l==1)
                <input min="0" max='5' value="0" name='{{$s}}' type="number">
            @endif
        </div>
    @endforeach
    <!-- vis -->
    <p class='text-2xl'>vis</p> 
    
    @foreach($vis as $v)  
    @php ($l = 1)
        <div class='rounded-b-sm border-b-2 flex w-1/4 items-center justify-between'>
            <p>{{$v}}</p>
            @for($i = 0; $i < count($ingredienten); $i++)
                @if($ingredienten[$i] == $v)
                <input min="0" max='5' value="1" name='{{$v}}' type="number">
                @php ($l++)
                @endif
            @endfor
            @if($l==1)
                <input min="0" max='5' value="0" name='{{$v}}' type="number">
            @endif
        </div>
    @endforeach
    <input type="hidden" name="Default" value="{{count($ingredienten)}}">
    <!-- <p class="text-4xl text-green-400 text-center w-1/4">{{$price}}</p> -->
    <br><input type="submit"> 
    </form>
</body>
</html>