<x-layout>
            <a href="{{route('listings.index')}}" class="inline-block text-black ml-4 mb-4">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <div class='flex items-center justify-center'>  <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                    <div class="flex w-full items-center justify-between border-b pb-3">
                      <div class="flex items-center space-x-3">
                        <img class="w-8 h-8 rounded-full img-fluid" src="{{ (!empty($listing->author->photo)) ? url($listing->author->photo) : url('upload/no_image.jpg')}}" alt="profile">
                        <div class="text-lg font-bold text-slate-700">{{$listing->author->name}}</div>
                      </div>
                      <div class="flex items-center space-x-8">
                        <x-listing-tags :tagsCsv="$listing->tags"/>
                        <div class="text-xs text-neutral-500">{{$listing->created_at->diffForHumans()}}</div>
                      </div>
                    </div>

                    <div class="mt-4 mb-6">
                      <div class="mb-3 text-xl font-bold">{{$listing->title}}</div>
                      <div class="text-sm text-neutral-600">{{$listing->body}}</div>
                    </div>

                    <div>
                      <div class="flex items-center justify-between text-slate-500">
                        <div class="flex space-x-4 md:space-x-8">
                          <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            <span>125</span>
                          </div>
                          <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                            </svg>
                            <span>4</span>

                          </div>

                        </div>
                      </div>
                <br>
                <h1><strong>COMMENTS</strong></h1><br><br>
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


                @endif {{-- (auth()->user()) END IF ^^^ --}}

                <br>
                @foreach($comments as $comment)
                @if($comment->listing_id === $listing->id)
                    @if($comment->author)
                        <div class="flex items-center mb-2">
                            <a href="/profile/{{$comment->author->id}}"><img class="w-8 h-8 rounded-full img-fluid" src="{{ (!empty($comment->author->photo)) ? url($comment->author->photo) : url('upload/no_image.jpg')}}" alt="profile"></a>
                            <div class="ml-2">
                                <a href="/profile/{{$comment->author->id}}">
                                    <small>
                                        <strong>
                                            {{$comment->author->name}}
                                        </strong>
                                    </small>
                                </a>
                                <p>
                                    {{$comment->comment_body}}
                                </p>
                                <small>
                                    {{ $comment->created_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
                    </div>
                  </div>
                </div>


            </div>
</x-layout>

