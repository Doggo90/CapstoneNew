<x-layout>
    {{-- <link href="https://cdn.tailwindcss.com" rel="stylesheet"> --}}
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <style>
    :root {
        --main-color: #4a76a8;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }
</style>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



<div class="bg-gray-100">
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                            src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                            alt="">
                    </div>
                    <img class="w-32 h-32 rounded-full mx-auto" src="{{ (!empty($user->photo)) ? url($user->photo) : url('upload/no_image.jpg')}}" alt="profile">
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$user->name}}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">{{$user->email}}</h3>
                    
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Posts</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">5125</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Reputation</span>
                            <span class="ml-auto"><span
                                class="bg-green-500 py-1 px-2 rounded text-white text-sm">345345345</span></span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->

                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-sm">

                    <div class="grid grid-cols-1">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3 well">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Posts</span>
                            </div>
                            @if ($listings->count() > 0)
                            <ul class="list-inside space-y-6">
                                @foreach ($listings as $listing)
                                <li>
                                    <div class="text-gray-800 font-bold text-xl my-1"><a href="/listings/{{$listing->id}}">{{$listing->title}}</a></div>
                                    <div class="text-gray-500 text-xs">Created at: {{$listing->created_at}}</div>
                                </li>
                                    <br>
                                @endforeach
                            </ul>
                            {{ $listings->links() }}
                            @else
                                <p>No posts found.</p>
                            @endif 
                        </div>
                    </div>
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>
</body>


</x-layout>




{{-- <h2 class="text-center"> POSTS </h2><br>
<!-- Assuming $user and $userPosts are available from the controller -->
@if ($listings->count() > 0)
    <ul class="flex flex-col items-center">
        @foreach ($listings as $listing)
            <li><a href="/listings/{{$listing->id}}">{{ $listing->title }}</a></li>
            <br>
        @endforeach
    </ul>
@else
    <p>No posts found.</p>
@endif --}}
