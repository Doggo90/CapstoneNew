<x-layout>
    
            <a href="javascript:history.back()" class="inline-block text-black ml-4 mb-4">
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
                            @if (auth()->user()->role == 'admin')
                                @if($listing->is_archived == 0){{-- IF THE POST IS CURRENTLY NOT ARCHIVED--}}
                                    <form action="/listings/{{$listing->id}}" method="POST">
                                        @csrf
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" id="is_archived" name="is_archived" value="1" class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                                                <span class="ml-3 text-sm font-medium text-black-900 dark:text-black-300">Archive Post</span>
                                            </label>
                                    </form>
                                @elseif($listing->is_archived == 1) {{-- IF THE POST IS CURRENTLY ARCHIVED--}}
                                    <form action="/listings/{{$listing->id}}" method="POST">
                                        @csrf
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" id="is_archived" name="is_archived" value="0" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                                            <span class="ml-3 text-sm font-medium text-black-900 dark:text-black-300">Un-Archive Post</span>
                                        </label>
                                    </form>
                                @endif
                            @endif

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
                                    {{-- <br>
                                    <div id="suggestions" class="dropdown">
                                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" id="suggestionsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="suggestionsDropdown">

                                        </div>
                                    </div> --}}

                                @error('comment_body')
                                    <p class="p text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                                <input type="hidden" name="user_id" value="{{ $listing->user_id }}">
                        </div><br>
                        <button
                                    type = "submit"
                                    class="bg-green-500 text-white rounded py-2 px-4 hover:bg-black">
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
            {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#comment_body').on('input', function() {
                        // Get the text from the input field
                        const text = $(this).val();

                        // Check if the text contains @
                        if (text.includes('@')) {
                            // Extract the partial username following @
                            const query = text.split('@').pop();

                            // Make an AJAX request to your server
                            $.ajax({
                                method: 'GET',
                                url: '/users/suggestions', // Replace with your actual route
                                data: { query: query },
                                success: function(response) {
                                    // Display suggestions in the dropdown
                                    const dropdownMenu = $('#suggestions');
                                    dropdownMenu.empty();
                                    response.forEach(function(user) {
                                        const suggestionItem = `<a class="dropdown-item" href="#" data-name="${user.name}">@${user.name}</a>`;
                                        dropdownMenu.append(suggestionItem);
                                    });

                                    // Handle user selection
                                    $('.dropdown-item').click(function() {
                                        const name = $(this).data('name');
                                        const currentText = $('#comment_body').val();
                                        const newText = currentText.replace(/@[^@]*$/, `@${name} `);
                                        $('#comment_body').val(newText);
                                        dropdownMenu.empty();
                                    });
                                }
                            });
                        } else {
                            // If no @, hide suggestions and clear the dropdown
                            $('#suggestions').empty();
                        }
                    });
                });
            </script> --}}
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const checkbox = document.getElementById('is_archived');

                    checkbox.addEventListener('change', function () {
                        // Automatically submit the form when the checkbox changes
                        this.closest('form').submit();
                    });
                });
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const checkbox = document.getElementById('is_archived1');

                    checkbox.addEventListener('change', function () {
                        // Automatically submit the form when the checkbox changes
                        this.closest('form').submit();
                    });
                });
            </script>
</x-layout>

