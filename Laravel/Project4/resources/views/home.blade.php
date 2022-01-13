<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="bg-blue-200 h-auto flex justify-center p-4">
        <div class="grid grid-cols-1 gap-4 w-4/5 ">
            <div class="h-20 p-3 bg-white rounded w-full">
                <ul class="flex">
                    <li class="flex-1 mr-2">
                        <a class="text-center block border border-blue-200 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white" href="#">Home</a>
                    </li>
                    <li class="flex-1 mr-2">
                        <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4" href="#">Contact</a>
                    </li>
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
                    <a class="text-center border border-blue-200 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 cursor-pointer text-white w-max h-14 text-xl m-auto">Ga naar menu</a>
                </div>
                <img class="rounded-3xl col-end-7 col-span-3" src="img/calzone.jpg">
            </div>
            <!-- <div class="grid h-full bg-white p-3 rounded w-full grid-cols-3 text-center">
                <div>1</div>
                <div>2</div>
                <div>contact</div>
            </div> -->
        </div>
    </div>
</body>
</html>