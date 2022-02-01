<!DOCTYPE html>
<html lang="en" class=' bg-gray-200'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>winkelwagen</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="h-screen grid overflow-x-hidden items-center justify-center bg-gray-200">
    <style>
        .bg-image {
            background: url(https://artisanpizzakitchen.com/wp-content/uploads/2018/05/373_photo3.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        body {
            background: white !important;
        }
    </style>
    <!-- nav -->
    <div class="section font-semibold px-16 text-gray-800 fixed w-full top-0 flex header_section bg-gray-100 shadow z-10">
        <div class="sub_head flex my-auto py-3">
            <div class="logo w-14"><img class="w-full" src="/img/stonks.png" alt="" /></div>
            <div class="text ml-2 my-auto flex-none">Stonks</div>
        </div>
        <div class="sub_head ml-auto flex space-x-8 my-auto">
            <div class="h_btns cursor-pointer"><a href="/">Home</a></div>
            <div class="h_btns cursor-pointer"><a href="/menu">Menu</a></div>
            <div class="h_btns cursor-pointer "><a href="/winkelmandje">winkelmandje</a></div>
            @if(Auth::check())
            <div class="h_btns cursor-pointer">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">uitloggen</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            @else
            <div class="h_btns cursor-pointer"><a href="/login">Login</a></div>
            @endif
        </div>
    </div>
    @if(isset($orders))
    <div class="section font-semibold px-16 text-gray-800 fixed w-full top-12  header_section bg-gray-100 shadow z-10">
        <div class="sub_head">
            <div class="h_btns text-center text-1xl p-5 text-gray-500">
                <p>Voordat je nog eens kunt bestellen moet je eerst je huidige <a href="status/{{$orders->klant_id}}" class='cursor-pointer underline hover:text-red-500'>bestelling</a> annuleren.</p>
            </div>
        </div>
    </div>
    @endif
    @if($prijs == 0)
    <div class='h-screen flex m-auto bg-gray-200'>
        <p class='m-auto text-center text-8xl p-5'>Je hebt niks in je winkelmandje zitten</p>
    </div>
    @endif
    @if($prijs > 0)
    <div class=" bg-gray-200 flex pt-44 justify-evenly text-center p-5 h-full pt-24 text-gray-800">
        <ul class='font-bold'>
            <li>
                <p>Pizza:</p>
            </li>
            <li>
                <p>Aantal:</p>
            </li>
            <li>
                <p>Grootte:</p>
            </li>
            <li>
                <p>Ingredienten aanpassen:</p>
            </li>
        </ul>
        @endif
        @foreach($items as $item)
        <ul>
            <li>
                <p>Pizza {{$item->naam}} </p>
            </li>
            <li>
                <p>{{$item->stuks}} </p>
            </li>
            <li>
                <p>{{$item->size}} </p>
            </li>
            <li><a href="/winkelmandje/{{$item->id}}" class='underline hover:text-red-500  cursor-pointer m-auto'>
                    <p>change</p>
                </a></li>
            <form action="/winkelmandje/{{$item->id}}" method="post" class="hover:underline hover:text-red-500  text-center">
                @method('delete')
                @csrf
                <input type="submit" value="delete" class="cursor-pointer underline bg-transparent">
            </form>
        </ul>
        @endforeach
    </div>
    @if($prijs > 0)
    <form action="/bestellen" method="POST" class='grid pb-20 h-full content-center w-screen bg-gray-200'>
        @csrf

        <p class='text-center text-green-600 bold  text-2xl'>€{{$prijs}}</p>


        <!-- hidden -->
        @php ($lengte = 0)
        @foreach($items as $item)
        @php ($lengte++)
        <input type="hidden" name="naam{{$lengte}}" value="{{$item->naam}}">
        <input type="hidden" name="stuks{{$lengte}}" value="{{$item->stuks}}">
        @endforeach
        <input type="hidden" name="lengte" value="{{$lengte}}">
        <input type="hidden" name="price" value="{{$prijs}}">

        @if($pizzapunten > 0)
        <p class='text-center text-green-600 bold  text-2xl'>Pizza punten: {{$pizzapunten}} </p>
        <p class='text-center text-gray-600 bold  '>(10 pizza punten is een euro, max 5 euro! per pizza + 10 pizzapunten, max 90)</p>
        <select class='w-max m-auto text-center' name="aantalPunten">
            @for($i = 0; $i <= substr($pizzapunten,0,1); $i++) 
                @if($i > 5)
                    $i++
                @else
                <option class='text-center' value="{{$i*10}}">{{$i*10}}</option>
                @endif
            @endfor
        </select>
        @endif


        <input type="submit" class='p-3 my-1.5 bg-black text-white hover:bg-white hover:text-black rounded cursor-pointer m-auto' value="bestellen">
    </form>
    @endif
    <!-- footer -->
    <div class="h-full heading_section bg-red-600 w-screen text-gray-300">
        <div class="footer w-5/6 mx-auto text-center">
            <div class="sub flex-1 p-8">
                <div class="text-3xl mb-3 uppercase">Contact Us</div>
                <div class="info">
                    <div class="name">Stonks</div>
                    <div class="name text-sm">
                        weert single 45<br>
                        city weert nederland limburg<br>
                        postcode 4353 RE <br>
                        Phone Number 951-634-4557 <br>
                        Mobile Number 951-903-8940
                    </div>
                </div>
            </div>
            <div class="sub flex p-5 w-5/6 mx-auto border-t">
                <div class="cursor-pointer hover:underline items mx-auto">Over ons</div>
                <div class="cursor-pointer hover:underline items mx-auto">Policy</div>
                <div class="cursor-pointer hover:underline items mx-auto">Locaties</div>
                <div class="cursor-pointer hover:underline items mx-auto"><a href="/BestDev">Developer</a></div>
            </div>
        </div>
    </div>
</body>

</html>