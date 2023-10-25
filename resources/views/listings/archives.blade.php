<x-layout>

<br><br><br>
<h1 class="text-center mb-4 text-3xl font-extrabold leading-none tracking-tight text-black-900 md:text-5xl lg:text-6xl dark:text-black">
    ARCHIVED POSTS
</h1>
<div class="lg:grid lg:grid-cols-4 gap-4 space-y-4 md:space-y-0 mx-4" style="z-index: 9999;">
            {{-- POSTS COLUMN --}}
    <div class="lg:col-span-4">
        <div class="flex items-center justify-center">
            <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"><a href="/listings/create">Create Post</a></button>
        </div>
        @include('partials._sorting')
        @unless (count($listings) == 0)
            @foreach($listings as $listing)
                @if($listing->is_archived == 1)
                    <x-listing-card :listing="$listing" />

                    <br>
                @endif
            @endforeach
    </div>

    @else
    <p>No Listings Found!</p>
    @endunless
</div>

</x-layout>
