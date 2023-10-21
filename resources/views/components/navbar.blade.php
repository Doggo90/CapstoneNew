<!-- component -->
{{-- <nav class=" bg-white w-full flex relative justify-between items-center mx-auto mt-5 px-8 h-20">
    <!-- logo -->
    <div class="inline-flex">
        <a class="_o6689fn" href="/"
            ><div class="hidden md:block">
                <img class="w-8 h-8" src="{{asset('images/logo1.png')}}" alt="" class="logo"/>
            </div>
            <div class="block md:hidden">

            </div>
        </a>
    </div>

    <!-- end logo -->

    <!-- search bar -->
    <div class="hidden sm:block flex-shrink flex-grow-0 justify-start px-2">
        <div class="inline-block">
            <div class="inline-flex items-center max-w-full">
                <button class="flex items-center flex-grow-0 flex-shrink pl-2 relative w-60 border rounded-full px-1  py-1" type="button">
                    <div class="block flex-grow flex-shrink overflow-hidden">Start your search</div>
                    <div class="flex items-center justify-center relative  h-8 w-8 rounded-full">
                        <svg
                            viewBox="0 0 32 32"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            role="presentation"
                            focusable="false"
                            style="
                                display: block;
                                fill: none;
                                height: 12px;
                                width: 12px;
                                stroke: currentcolor;
                                stroke-width: 5.33333;
                                overflow: visible;
                            "
                        >
                            <g fill="none">
                                <path
                                    d="m13 24c6.0751322 0 11-4.9248678 11-11 0-6.07513225-4.9248678-11-11-11-6.07513225 0-11 4.92486775-11 11 0 6.0751322 4.92486775 11 11 11zm8-3 9 9"
                                ></path>
                            </g>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
    <!-- end search bar -->

    <!-- login -->
    <div class="flex-initial">
      <div class="flex justify-end items-center relative">


        <div class="block">
            <div class="inline relative">
                <button type="button" class="inline-flex items-center relative px-2 border rounded-full hover:shadow-lg">
                    <div class="pl-1">
                        <svg
                            viewBox="0 0 32 32"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            role="presentation"
                            focusable="false"
                            style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 3; overflow: visible;"
                        >
                            <g fill="none" fill-rule="nonzero">
                                <path d="m2 16h28"></path>
                                <path d="m2 24h28"></path>
                                <path d="m2 8h28"></path>
                            </g>
                        </svg>
                    </div>

                    <div class="block flex-grow-0 flex-shrink-0 h-10 w-12 pl-5">
                        <svg
                            viewBox="0 0 32 32"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            role="presentation"
                            focusable="false"
                            style="display: block; height: 100%; width: 100%; fill: currentcolor;"
                        >
                            <path d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
      </div>
    </div>
    <!-- end login -->
</nav> --}}
{{-- <nav class="flex w-full items-center justify-between border-b pb-3">
            <a href="/index">
                <img class="w-24 ml-4" src="{{asset('images/logo1.png')}}" alt="" class="logo"/>
            </a>
                @auth
                <form action="/index" class="relative">
                    <div class="absolute top-4 left-4">
                        <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                    </div>
                    <input type="text" name="search" class="h-14 w-44 pl-8 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search...">
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
</nav> --}}
<nav class="flex w-full items-center justify-between border-b pb-3">
    <a href="/index">
      <img class="w-24 ml-4" src="{{asset('images/logo1.png')}}" alt="" class="logo"/>
    </a>

    @auth
    <div class="flex items-center space-x-2 relative">
      <form action="/index">
        <div class="absolute top-4 left-4">
          <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
        </div>
        <input type="text" name="search" class="h-14 w-44 pl-8 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search..">
        <div class="absolute top-2 right-2">
          <button type="submit" class="h-10 w-20 text-black-500 rounded-lg bg-green-400 hover:bg-lime-400" hidden>Search</button>
        </div>
      </form>

      <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-black bg-green-400 hover:bg-lime-400 focus:ring-4 focus:outline-none focus:ring-green-400 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-400 dark:hover:bg-green-400 dark:focus:ring-green-400" type="button">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
        </svg>
      </button>
    </div>

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
          <a href="{{route('user.logout')}}" class="block px-4 py-2 hover.bg-green-400 dark:hover.bg-lime-600 dark:hover.text-black">Log out</a>
        </li>
      </ul>
    </div>
    @else
    <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-black bg-green-400 hover.bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-400 dark:hover.bg-green-400 dark:focus:ring-green-400" type="button">Guest</button>


    <!-- Dropdown menu -->
    <div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
      <ul>
        <li>
          <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover.bg-gray-100 dark:hover.bg-gray-600 dark:text-gray-200 dark:hover.text-white">Log in</a>
        </li>
        <li>
          <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover.bg-gray-100 dark:hover.bg-gray-600 dark:text-gray-200 dark:hover.text-white">Register</a>
        </li>
      </ul>
    </div>
    @endauth
  </nav>
