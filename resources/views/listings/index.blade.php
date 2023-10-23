<x-layout>
{{-- @include('partials._hero') --}}
<br><br><br>
<div class="lg:grid lg:grid-cols-4 gap-4 space-y-4 md:space-y-0 mx-4" style="z-index: 9999;">


    {{-- ANNOUNCEMENT COLUMN --}}

    <div class="lg:col-span-1 ml-auto">
        <div class="flex bg-white shadow-lg rounded-lg md:mx-auto max-w-md md:max-w-2xl text-center">

                    <h1 class="px-5 py-5 text-xl"><strong>ANNOUNCEMENTS</strong></h1>
        </div>
            @foreach ($announcements as $announcement )
            <a href="/announcements/{{$announcement->id}}">
                <div class="flex bg-white shadow-lg rounded-lg mx-4 md:mx-auto my-4 max-w-md md:max-w-2xl ">
                    <div class="flex items-start px-4 py-6">
                    <div class="">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{$announcement->author->name ?? 'No Author'}}</h2>

                        </div>
                        <p class="mt-3 text-gray-700 text-sm">
                            <strong><span style="text-transform:uppercase; font-size: 25px;"> {{ $announcement->title }}</span></strong>
                        </p>
                    </div>
                    </div>
                </div>
                <br>

            </a>

            @endforeach

    </div>



            {{-- POSTS COLUMN --}}


    <div class="lg:col-span-3">
        <div class="flex items-center justify-center">
            <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"><a href="/listings/create">Create Post</a></button>
        </div>
        @include('partials._sorting')
        @unless (count($listings) == 0)
        @foreach ($listings as $listing)

            <x-listing-card :listing="$listing" />

            <br>
        @endforeach
    </div>

    @else
    <p>No Listings Found!</p>
    @endunless
</div>


</x-layout>

