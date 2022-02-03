<!DOCTYPE html>
<html lang="en" class='bg-gray-200 '>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="h-screen grid w-screen overflow-x-hidden items-center justify-center ">
    <style>
        .bg-image {
            background: url(https://artisanpizzakitchen.com/wp-content/uploads/2018/05/373_photo3.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
        }

        body {
            background: white !important;
        }
    </style>
    <div class="section font-semibold px-16 text-gray-800 fixed w-full top-0 flex header_section bg-gray-100 shadow z-10">
        <div class="sub_head flex my-auto py-3">
            <div class="logo w-14"><img class="w-full" src="/img/stonks.png" alt="" /></div>
            <div class="text ml-2 my-auto flex-none">Stonks</div>
        </div>
        <div class="sub_head ml-auto flex space-x-8 my-auto">
            <div class="h_btns cursor-pointer">Home</div>
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
    <!-- status -->
    @if(isset($orders))
    <div class="section font-semibold px-16 text-gray-800 fixed w-full top-12  header_section bg-gray-100 shadow z-10">
        <div class="sub_head">
            <div class="h_btns text-center text-4xl p-5 "><p>volg de <a href="/status/{{$orders->klant_id}}" class='cursor-pointer underline hover:text-red-500'>status</a> van je bestelling!</p></div>
        </div>
    </div>
    @endif
    <!-- einde -->
    <div class="container m-auto bg-gray-200 bg-image flex overflow-hidden h-screen text-gray-800">
        <div class="hero bg-gray-200 text-center grid md:grid-cols-2 border w-4/6 m-auto p-8 bg-opacity-90 rounded-lg">
            <img class="icon m-auto rounded-lg" src="/img/stonks.png" alt="" />
            <div class="text m-auto text-lg md:ml-5 p-5 md:text-left">
                <div class="head text-3xl mb-3 font-semibold">Waarom houden wij van pizza?</div>
                <div class="desc">Er is een reden waarom pizza zo populair is. Mensen voelen zich aangetrokken tot voedsel dat vet, zoet, rijk en complex is. Pizza heeft al deze componenten. Kaas is vet, vleesbeleg is meestal rijk en de saus is zoet.</div>
            </div>
        </div>
    </div>
    <!-- einde -->
    <div class="container m-auto italic bg-gray-200 font-semibold text-3xl text-center p-5 pt-24 text-gray-800"><a class='hover:text-red-500' href="/menu">Onze favorieten pizza's</a></div>
    <div class="bg-gray-200 section cards mx-auto border grid md:grid-cols-3 md:px-12 bg-gray-200 text-gray-800">
        <div class="grid text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex flex-col rounded">
            <div class="img"><img class="w-full h-full" src="/img/Hawai.jpg" alt="" /></div>
            <div class="text p-5 pt-2 text-center">
                <div class="title font-semibold my-2 text-xl text-red-700"><a class='hover:text-black' href="/menu">Hawai</a></div>
                <div class="desc">De pizza Hawaï of pizza Hawaii is een pizza met daarop tomatensaus, kaas, ham en ananas. Het is de ananas die deze pizza haar naam geeft, naar Hawaï, de Amerikaanse staat waar veel ananas wordt gekweekt.</div>
            </div>
        </div>
        <!-- Card -->
        <div class="bg-gray-200 grid text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex flex-col rounded">
            <div class="img"><img class="w-full h-full" src="/img/salami.jpg" alt="" /></div>
            <div class="text p-5 pt-2 text-center">
                <div class="title font-semibold my-2 text-xl text-red-700"><a class='hover:text-black' href="/menu">Salami</a></div>
                <div class="desc">Heerlijke Pizza met Mozarella en Salami. De prefecte combinatie voor de perfecte pizza. Met deze ovenverse pizza geniet je optimaal van een goede en lekkere avondmaaltijd.</div>
            </div>
        </div>
        <!-- Card -->
        <div class="bg-gray-200 grid text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex flex-col rounded">
            <div class="img"><img class="w-full h-full" src="/img/calzone.jpg" alt="" /></div>
            <div class="text p-5 pt-2 text-center">
                <div class="title font-semibold my-2 text-xl text-red-700 "><a class='hover:text-black' href="/menu">Calzone</a></div>
                <div class="desc">Calzone is een Italiaans gerecht gemaakt van brooddeeg als basis. Het deeg wordt als een pizza in een ronde platte vorm gekneed en gerold en belegd met diverse ingrediënten, waaronder in ieder geval kaas.</div>
            </div>
        </div>

    </div>
    <!-- footer -->
    <div class="heading_section w-screen bg-red-600 text-gray-300">
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