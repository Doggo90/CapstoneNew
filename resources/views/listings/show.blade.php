<x-layout>
            <a href="{{route('listings.index')}}" class="inline-block text-black ml-4 mb-4">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card>
                    <div class="flex flex-col justify-center text-left">
                        <h3 class="text-2xl mb-2 text-center">{{$listing->title}}</h3><br>
                        <div class="border border-gray-200 w-full mb-6">
                            <div class="text-lg space-y-6"></div>
                        </div>
                        <div>
                            <p>{{$listing->body}}</p>
                        </div>
                        <br><br>
                        <small><span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Created at: </span>{{$listing->created_at}}</small>
                        <br>
                        <x-listing-tags :tagsCsv="$listing->tags"/><br>
                    </div>
                </x-card>
                @if (auth()->user())
                    {{-- <x-card>
                        <div class="flex flex-col text-left">
                                <label
                                    for="body"
                                    class="inline-block text-lg mb-2">
                                    Comments
                                </label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="tags" id="tags"
                                    placeholder="Enter your comment here.."/>
                                @error('body')
                                    <p class="p text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                        </div><br>
                        <button
                                    type = "submit" 
                                    class="bg-lime-500 text-white rounded py-2 px-4 hover:bg-black">
                                    Comment
                        </button>
                    </x-card> --}}
                @endif
                <livewire:comments :model="$listing"/>
                @auth
                    
                <x-card class="mt-4 p-2 flex space-x-6">
                    <a href="/listings/{{$listing->id}}/edit">
                    <i class="fa-solid fa-pencil"> Edit</i></a>

                    <form method="POST" action="/listings/{{$listing->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500"><i class="fa-solid fa-trash"> Delete</i></button>
                    </form>
                </x-card>
                
                @endauth
            </div>
</x-layout>