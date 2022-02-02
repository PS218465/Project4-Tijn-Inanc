<!DOCTYPE html>
<html lang="en" class='bg-gray-200'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Aanpassen</title>
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
    <!--show below-->
    @if(isset($Data))
    <div class=" bg-gray-200 section cards mx-auto border w-screen h-screen grid  md:px-12 bg-gray-200 text-gray-800 rounded">
        <form class="m-auto" action="/winkelmandje/{{$Data->id}}" method="POST">
            <div class="p-5 grid text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex h-full rounded bg-gray-200">
                @method('patch')
                @csrf
                <div class="text p-5 pt-2 text-center">
                    <div class="title font-semibold my-2 text-xl text-red-700">
                        <p class="text-3xl">Pizza {{$Data->naam}} €{{$Data->kosten}}</p>
                    </div>
                </div>

                <select name="size">
                    <option value="small">Small</option>
                    <option selected="selected" value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
                <!-- hidden -->
                <input type="hidden" name="id" value="{{$Data->id}}">
                <input type="hidden" name="pizzaid" value="{{$Data->pizza_id}}">
                <!--  -->
                <input name="hoeveelheid" type="number" min='1' placeholder="Hoeveel..."> <br>
                <input type="submit" class='p-3 bg-black text-white hover:bg-white hover:text-black rounded cursor-pointer m-auto' value="product aanpassen">
            </div>
        </form>
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