<!DOCTYPE html>
<html lang="en" class='bg-gray-200 '>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="h-screen grid items-center justify-center ">
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
    <div class="section font-semibold px-16 text-gray-800 fixed w-full top-0 flex header_section bg-gray-100 shadow z-10">
        <div class="sub_head flex my-auto py-3">
            <div class="logo w-14"><img class="w-full" src="/img/stonks.png" alt="" /></div>
            <div class="text ml-2 my-auto flex-none">Pizza Stonks</div>
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
    <!-- einde -->
    <div class="container bg-image flex overflow-hidden h-screen text-gray-800">
        <div class="hero bg-gray-200 text-center grid md:grid-cols-2 border w-4/6 m-auto p-8 bg-opacity-90 rounded-lg">
            <img class="icon m-auto rounded-lg" src="/img/stonks.png" alt="" />
            <div class="text m-auto text-lg md:ml-5 p-5 md:text-left">
                <div class="head text-3xl mb-3 font-semibold">Why We Love Pizza ?</div>
                <div class="desc">There's a reason pizza is so popular. Humans are drawn to foods that are fatty, sweet, rich and complex. Pizza has all of these components. Cheese is fatty, meat toppings tend to be rich and the sauce is sweet.</div>
            </div>
        </div>
    </div>
    <!-- einde -->
    <div class="container italic bg-gray-200 font-semibold text-3xl text-center p-5 pt-24 text-gray-800"><a class='hover:text-red-500' href="/menu">Pizza's</a></div>
    <div class="bg-gray-200 section cards mx-auto border grid md:grid-cols-3 md:px-12 bg-gray-200 text-gray-800">
        <div class="grid text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex flex-col rounded">
            <div class="img"><img class="w-full h-full" src="/img/Hawai.jpg" alt="" /></div>
            <div class="text p-5 pt-2 text-center">
                <div class="title font-semibold my-2 text-xl text-red-700"><a class='hover:text-black' href="/menu">Hawai</a></div>
                <div class="desc">A classic. Just throw a few (or a ton of) slices of pepperoni on top of the cheese, and you’ll soon have a greasy, slightly spicy and delicious pizza that you simply can’t go wrong with.</div>
            </div>
        </div>
        <!-- Card -->
        <div class="bg-gray-200 grid text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex flex-col rounded">
            <div class="img"><img class="w-full h-full" src="/img/salami.jpg" alt="" /></div>
            <div class="text p-5 pt-2 text-center">
                <div class="title font-semibold my-2 text-xl text-red-700"><a class='hover:text-black' href="/menu">Salami</a></div>
                <div class="desc">A classic. Just throw a few (or a ton of) slices of pepperoni on top of the cheese, and you’ll soon have a greasy, slightly spicy and delicious pizza that you simply can’t go wrong with.</div>
            </div>
        </div>
        <!-- Card -->
        <div class="bg-gray-200 grid text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex flex-col rounded">
            <div class="img"><img class="w-full h-full" src="/img/calzone.jpg" alt="" /></div>
            <div class="text p-5 pt-2 text-center">
                <div class="title font-semibold my-2 text-xl text-red-700 "><a class='hover:text-black' href="/menu">Calzone</a></div>
                <div class="desc">A classic. Just throw a few (or a ton of) slices of pepperoni on top of the cheese, and you’ll soon have a greasy, slightly spicy and delicious pizza that you simply can’t go wrong with.</div>
            </div>
        </div>
        

        <!-- Card -->
    </div>

    <!-- <div class="bg-blue-200 h-auto flex justify-center p-4">
        <div class="grid grid-cols-1 gap-4 w-4/5 ">
            <div class="h-20 p-3 bg-white rounded w-full">
                <ul class="flex">
                    <li class="flex-1 mr-2">
                        <a class="text-center block border border-blue-200 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white" href="#">Home</a>
                    </li>
                    <li class="flex-1 mr-2">
                        <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4" href="#">Contact</a>
                    </li>
                    <li class="flex-1 mr-2 hover:border-gray-200 rounded cursor-pointer hover:bg-gray-200">
                        <a href="/winkelmandje"><img style="width: 12%;" class="mx-auto " src="img/winkelmandje.png"></a>
                    </li>
                    @if(Auth::check())
                    <li class="flex-1 mr-2 hover:border-gray-200 rounded cursor-pointer hover:bg-gray-200">
                        <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">uitloggen</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li class="flex-1 mr-2 hover:border-gray-200 rounded cursor-pointer hover:bg-gray-200">
                        <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4" href="/login"><p>Login</p></a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="text-center h-screen bg-white p-3 rounded w-full mb-7">
                <img class="mx-auto" src="/img/stonks.png">
            </div>
            <div class=" text-center h-max bg-white p-3 rounded w-full grid grid-cols-5 gap-4">
                <p class="h-max text-4xl col-start-2 col-span-4">Ons menu</p>
                <div class="text-center h-max rounded-3xl col-start-1 col-end-4 col-span-3 grid grid-cols-1">
                    <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                    </p>
                    <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages
                    </p>
                    <a href="/menu" class="text-center border border-blue-200 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 cursor-pointer text-white w-max h-14 text-xl m-auto">Ga naar menu</a>
                </div>
                <img class="rounded-3xl col-end-7 col-span-3" src="img/calzone.jpg">
            </div>
        </div>
    </div> -->
</body>

</html>