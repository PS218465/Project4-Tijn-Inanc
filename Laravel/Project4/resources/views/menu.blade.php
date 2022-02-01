<!DOCTYPE html>
<html lang="en" class='bg-gray-200'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="h-screen w-screen grid items-center justify-center bg-gray-200">
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
    <!-- navigation -->
    <div class="section w-screen font-semibold px-16 text-gray-800 fixed w-full top-0 flex header_section bg-gray-100 shadow z-10">
        <div class="sub_head flex my-auto py-3">
            <div class="logo w-14"><img class="w-full" src="/img/stonks.png" alt="" /></div>
            <div class="text ml-2 my-auto flex-none">Pizza Stonks</div>
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
    <!-- einde -->@if(Auth::check())
    @if(isset($pizzas))
    <div class="container m-auto w-screen italic bg-gray-200 font-semibold text-3xl text-center p-5 pt-24 text-gray-800 "><a class='hover:text-red-500' href="/menu">Pizza's</a></div>
    @endif
    @endif
    <!-- index -->
    <div class="bg-gray-200 section cards mx-auto border grid md:grid-cols-3 md:px-12 bg-gray-200 w-screen text-gray-800">
        @if(Auth::check())
        @if(isset($pizzas))
        
        @foreach($pizzas as $pizza)
        <div class="grid text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex flex-col rounded">
            <div class="img"><img class="w-full h-full" src="/img/{{$pizza->naam}}.jpg" alt="" /></div>
            <div class="text p-5 pt-2 text-center">
                <div class="title font-semibold my-2 text-xl text-red-700"><a class='list-none text-2xl hover:text-black hover:underline' href="/menu/{{$pizza->id}}">{{$pizza->naam}} €{{$pizza->kosten}}</a></div>
                <div class="desc">{{$pizza->info}}</div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <!--show below-->
    @if(isset($ingredienten))
    <div class=" bg-gray-200 section cards mx-auto border w-screen h-screen grid  md:px-12 bg-gray-200 text-gray-800 rounded">
        <form class="m-auto" action="/winkelmandje" method="POST">
            <div class="p-5 grid text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex h-full rounded bg-gray-200">
                @csrf
                <div class="text p-5 pt-2 text-center">
                    <div class="title font-semibold my-2 text-xl text-red-700">
                        <p class="text-3xl">Pizza {{$Name->naam}} €{{$Name->kosten}}</p>
                    </div>
                    @foreach($ingredienten as $ingredient)
                    <li class='list-none hover:underline'><a target="_blank" href="https://www.google.nl/search?q={{$ingredient->naam}}">{{$ingredient->naam}}</a></li>
                    @endforeach
                </div>

                <select name="size">
                    <option value="small">Small</option>
                    <option selected="selected" value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
                <!-- hidden -->
                <input type="hidden" name="pizzaid" value="{{$Name->id}}">
                <input type="hidden" name="naam" value="{{$Name->naam}}">
                <input type="hidden" name="kosten" value="{{$Name->kosten}}">
                <!--  -->
                <input name="hoeveelheid" type="text" placeholder="Hoeveel..."> <br>
                <input type="submit" class='p-3 bg-black text-white hover:bg-white hover:text-black rounded cursor-pointer m-auto' value="aan winkelmandje toevoegen">
            </div>
        </form>
        @endif
        @else
        <div class='flex  bg-gray-200 h-screen col-start-2'>
        <div class='text-center  m-auto shadow bg-gray-100 p-5 w-full'>
            <p class="text-3xl">om te bestellen moet je eerst inloggen</p>
            <a href="/login" class='hover:text-red-500 hover:underline'>
                <p>Login</p>
            </a>
            <a href="/register" class='hover:text-red-500 hover:underline'>
                <p>register</p>
            </a>
        </div>
        </div>

        @endif
    </div>
    <!-- footer -->
    <div class="heading_section bg-red-600 text-gray-300">
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