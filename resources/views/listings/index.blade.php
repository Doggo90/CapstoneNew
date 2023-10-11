<x-layout>
{{-- @include('partials._hero') --}}
@include('partials._sorting')
<br><br><br>
<div class="lg:grid lg:grid-cols-4 gap-4 space-y-4 md:space-y-0 mx-4" style="z-index: 9999;">
    @unless (count($listings) == 0)
    <!-- Posts - Spanning 3 columns -->
    <div class="lg:col-span-3">
        @foreach ($listings as $listing)
        
            <x-listing-card :listing="$listing" />

            <br>
        @endforeach
    </div>
    <!-- New Column - Spanning 1 column -->
    <div class="lg:col-span-1">
        <x-card>
        <h1 class="text-center"><strong>ANNOUNCEMENTS</strong></h1>
        </x-card>

            @foreach ($announcements as $announcement )
            <a href="#"><x-card>
                <h1><strong>{{ $announcement->title }}</strong></h1>
                <br>
                <p>{{ $announcement->body }}</p>
            </x-card>
            </a>
            @endforeach

    </div>
    @else
    <p>No Listings Found!</p>
    @endunless
</div>


</x-layout>

