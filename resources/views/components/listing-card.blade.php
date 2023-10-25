@props(['listing', 'comments'])


<a href="/listings/{{$listing->id}}">
    <div class='flex items-center justify-center'>
        <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
            <div class="flex w-full items-center justify-between border-b pb-3">
                <div class="flex items-center space-x-3">
                    <img class="w-8 h-8 rounded-full img-fluid" src="{{ (!empty($listing->author->photo)) ? url($listing->author->photo) : url('upload/no_image.jpg')}}" alt="profile">
                    <div class="text-lg font-bold text-slate-700">{{ $listing->author->name ?? 'No Author' }}</div>
                </div>

                <div class="flex items-center space-x-8">
                    <div class="text-xs text-neutral-500">{{$listing->created_at->diffForHumans()}}</div>
                </div>
            </div>

        <div class="mt-4 mb-6">
        <div class="mb-3 text-xl font-bold">{{$listing->title}}</div>
        </div>
        <div>
        <div class="flex items-center justify-between text-slate-500">
            <div class="flex space-x-4 md:space-x-8">
                <a href="/listings/{{$listing->id}}">
                    <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>

                        <span>{{$listing->comments()->count()}}</span>

                    </div>

                <a href="/listings/{{$listing->id}}">
                    <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path d="M12.781 2.375c-.381-.475-1.181-.475-1.562 0l-8 10A1.001 1.001 0 0 0 4 14h4v7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7h4a1.001 1.001 0 0 0 .781-1.625l-8-10zM15 12h-1v8h-4v-8H6.081L12 4.601 17.919 12H15z"/></svg>
                        <span>{{$listing->upvote ?? '0'}}</span>
                    </div>
                </a>
            </div>
        </div>
        </div>
    </div>
    </div>
</a>
