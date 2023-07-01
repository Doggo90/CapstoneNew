<x-layout>
            <a href="{{route('listings.index')}}" class="inline-block text-black ml-4 mb-4">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card>
                    <div class="flex flex-col items-center justify-center text-left">
                        <img class="w-48 mr-6 mb-6" src="{{$listing->logo ? asset('images/'.$listing->logo) : asset('upload/no_image.jpg')}}"  alt=""/>
                        <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                        <x-listing-tags :tagsCsv="$listing->tags"/><br>
                            <small><span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Created at: </span>{{$listing->created_at}}</small>
                        <div class="border border-gray-200 w-full mb-6">
                            <div class="text-lg space-y-6"></div>
                        </div>
                        
                        <div>
                            <p >{{$listing->body}}</p>
                        </div>
                    </div>
                </x-card>
                <x-card class="mt-4 p-2 flex space-x-6">
                    <a href="/listings/{{$listing->id}}/edit">
                    <i class="fa-solid fa-pencil"> Edit</i></a>

                    <form method="POST" action="/listings/{{$listing->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500"><i class="fa-solid fa-trash"> Delete</i></button>
                    </form>
                </x-card>
            </div>
</x-layout>