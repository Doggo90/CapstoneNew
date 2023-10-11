<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/logo1.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        @livewireStyles
        @filamentStyles
        @vite('resources/css/app.css')
            <!-- Toastr CSS -->
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
            <!-- End Toastr CSS -->
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>CvSU Acad Forum</title>
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    .main-content {
        flex: 1;
    }
</style>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/index">
                <img class="w-24" src="{{asset('images/logo1.png')}}" alt="" class="logo"/>
            </a>
            @auth
            <form action="/index" class="relative">
                <div class="absolute top-4 left-4"> <!-- Adjust the left and top properties as needed -->
                    <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                </div>
                <input type="text" name="search" class="h-14 w-44 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search..."> <!-- Adjust the width (w-44) and left padding (pl-10) as needed -->
                <div class="absolute top-2 right-2">
                    <button type="submit" class="h-10 w-20 text-black-500 rounded-lg bg-green-400 hover:bg-lime-400">Search</button>
                </div>
            </form>

            <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-black bg-green-400 hover:bg-lime-400 focus:ring-4 focus:outline-none focus:ring-green-400 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-400 dark:hover:bg-green-400 dark:focus:ring-green-400" type="button">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                </svg>
            </button>

        <!-- Dropdown menu -->
        <div id="dropdownInformation" class="z-10 hidden bg-green-400 hover:bg-lime-400 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-green-400 dark:divide-lime-400">

            <div class="px-4 py-3 text-sm text-black-900 dark:text-black dark:hover:bg-green-400" style="z-index: 9999;">
            <div>{{$user->name}}</div>
            </div>

            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
            <li>
                <a href="{{ route('user.profile', ['user' => $user->id]) }}" class="block px-4 py-2 hover:bg-green-400 dark:hover:bg-lime-600 dark:hover:text-black">Profile</a>
            </li>
            <li>
                <a href="{{route('listings.create')}}" class="block px-4 py-2 hover:bg-green-400 dark:hover:bg-lime-600 dark:hover:text-black">Create Post</a>
            </li>
            <li>
                <a href="{{route('user.logout')}}" class="block px-4 py-2 hover:bg-green-400 dark:hover:bg-lime-600 dark:hover:text-black">Log out</a>
            </li>
            </ul>
            @else
            <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-black bg-green-400 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-400 dark:hover:bg-green-400 dark:focus:ring-green-400" type="button">Guest</button>
    </div>


    <!-- Dropdown menu -->
    <div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
    <ul>
        <li>
            <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log in</a>
          </li>
          <li>
            <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Register</a>
          </li>
    @endauth
    </ul>
</div>

</nav>



        <div class="main-content">
            <main class="">
                <div class="mb-10">
                    {{$slot}}
                </div>
            </main>

        </div>







        @include('partials._backtotop')

        <x-flash-message/>
        @livewireScripts
        @filamentScripts
        @vite('resources/js/app.js')
        @livewire('notifications')
    </body>
    <footer class="left-0 w-full flex items-center justify-start h-24 mt-24 opacity-100 md:justify-center" style="z-index: 1;">
        <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Toastr js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
       <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
               case 'info':
               toastr.info(" {{ Session::get('message') }} ");
               break;

               case 'success':
               toastr.success(" {{ Session::get('message') }} ");
               break;

               case 'warning':
               toastr.warning(" {{ Session::get('message') }} ");
               break;

               case 'error':
               toastr.error(" {{ Session::get('message') }} ");
               break;
            }
            @endif
           </script>
           <!-- End Toastr js -->
</html>
