@props(['listing'])
<x-card>
    <div class="flex">
        <a href="/listings/{{$listing->id}}">
            <img class="hidden w-48 mr-6 md:block"
            src="{{$listing->logo ? asset('images/'.$listing->logo) : asset('upload/no_image.jpg')}}"
            alt=""/>
        </a>
        
        <div><br>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <br><br>
            <x-listing-tags :tagsCsv="$listing->tags"/>
            <small><span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Created at: {{$listing->created_at->format('M j, Y, g:i A')}} </span></small>
        </div>
    </div>
</x-card>