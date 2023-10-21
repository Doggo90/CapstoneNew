<x-layout>
            <a href="{{route('listings.index')}}" class="inline-block text-black ml-4 mb-4">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <div class='flex items-center justify-center'>  <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                    <div class="flex w-full items-center justify-between border-b pb-3">
                        <div class="flex items-center">
                          <a href="/profile/{{$listing->author->id ?? '1'}}">
                            <img class="w-8 h-8 rounded-full img-fluid" src="{{ (!empty($listing->author->photo)) ? url($listing->author->photo) : url('upload/no_image.jpg')}}" alt="profile">
                          </a>
                          <div class="ml-2 text-lg font-bold text-slate-700">
                            <a href="/profile/{{$listing->author->id ?? '1'}}">
                              <small>
                                  {{$listing->author->name ?? 'No Author'}}
                              </small>
                            </a>
                          </div>
                        </div>
                        <div class="flex items-center space-x-8">
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path d="M12.781 2.375c-.381-.475-1.181-.475-1.562 0l-8 10A1.001 1.001 0 0 0 4 14h4v7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7h4a1.001 1.001 0 0 0 .781-1.625l-8-10zM15 12h-1v8h-4v-8H6.081L12 4.601 17.919 12H15z"/></svg>
                            <span>{{$listing->upvote ?? '0'}}</span>
                          </div>

                        </div>
                      </div>
                      <br>
                      <x-listing-tags :tagsCsv="$listing->tags"/>
                <br>
                <h1><strong>COMMENTS</strong></h1><br>
                @if (auth()->user())
                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    <x-card>
                        <div class="flex items-start">
                            <a href="/profile/{{auth()->user()->id}}"><img class="w-8 h-8 rounded-full img-fluid mr-2" src="{{ (!empty(auth()->user()->photo)) ? url(auth()->user()->photo) : url('upload/no_image.jpg')}}" alt="profile">
                            </a>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="comment_body" id="comment_body"
                                    placeholder="What's on your mind?"/>
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
                @else
                <p>You need to log in to comment. <a href="/login">Click here.</a></p>

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

