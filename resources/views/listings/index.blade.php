<x-layout>
{{-- @include('partials._hero') --}}
<div>
    <h1 class="font-bold text-center">ANNOUNCEMENTS</h1><br>
</div>
@include('partials._carousel')
<div class="lg:grid lg:grid-cols-1 gap-4 space-y-4 md:space-y-0 mx-4" style="z-index: 9999;">
    @unless (count($listings)== 0)
        
    @foreach ($listings as $listing)
    <x-listing-card :listing="$listing" />
    @endforeach

    @else
    <p>No Listings Found!</p>

    @endunless
    
</div>


</x-layout>
