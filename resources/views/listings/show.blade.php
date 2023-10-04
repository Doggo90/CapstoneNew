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
                    </div>
                </x-card>
                <br><br>
                <small><span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Created at: </span>{{$listing->created_at}}</small>
                <br><br>
                <x-listing-tags :tagsCsv="$listing->tags"/>
                @if (auth()->user())
                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    <x-card>
                        <div class="flex flex-col text-left">
                                <label
                                    for="comments"
                                    class="inline-block text-lg mb-2">
                                    Comments
                                </label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="comment_body" id="comment_body"
                                    placeholder="Enter your comment here..."/>
                                @error('comment_body')
                                    <p class="p text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                                <input type="hidden" name="user_id" value="{{ $listing->user_id }}">
                        </div><br>
                        <button
                                    type = "submit"
                                    class="bg-lime-500 text-white rounded py-2 px-4 hover:bg-black">
                                    Comment
                        </button>
                    </x-card>
                </form>
                    <x-card>
                        @foreach($comments as $comment)
                            @if($comment->listing_id === $listing->id)
                                <p>
                                    <img class="w-32 h-32 rounded-full mx-auto" src="{{ (!empty($authorPhoto)) ? url($authorPhoto) : url('upload/no_image.jpg')}}" alt="profile">
                                    <?php
                                    dd($authorPhoto);
                                    ?>
                                    {{$comment->comment_body}}
                                </p>
                            @endif
                        @endforeach
                    </x-card>
                @endif
                {{-- <livewire:comments :model="$listing"/> --}}
                @auth
                    {{-- <x-card>
                        <div class="flex flex-col justify-center text-left">
                            <h3 class="text-2xl mb-2 text-center">{{$comment->name}}</h3><br>
                            <div class="border border-gray-200 w-full mb-6">
                                <div class="text-lg space-y-6"></div>
                            </div>
                            <div>
                                <p>{{$listing->body}}</p>
                            </div>
                            <br><br>
                        </div>
                    </x-card> --}}

                @endauth
            </div>
</x-layout>
