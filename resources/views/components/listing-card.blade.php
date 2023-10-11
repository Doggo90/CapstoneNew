@props(['listing'])
{{-- <x-card> --}}
    {{-- <div class="flex">
        <a href="/listings/{{$listing->id}}">
            <img class="hidden w-48 mr-6 md:block"
            src="{{$listing->logo ? asset('images/'.$listing->logo) : asset('upload/no_image.jpg')}}"
            alt=""/>
        </a>

        <div><br>
            <h3 class="text-2xl"><strong>
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
                </strong>
            </h3>
            <br><br>
            <x-listing-tags :tagsCsv="$listing->tags"/><br>
            <small><span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{$listing->created_at->diffForHumans()}} </span></small>
        </div>
    </div> --}}
{{-- </x-card> --}}

<a href="/listings/{{$listing->id}}">
<div class='flex items-center justify-center'>  <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
    <div class="flex w-full items-center justify-between border-b pb-3">
      <div class="flex items-center space-x-3">
        <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
        <div class="text-lg font-bold text-slate-700">654</div>
      </div>
      <div class="flex items-center space-x-8">
        <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">Category</button>
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
{{--
                use App\Models\Listing;
                $listingId = Listing::pluck('id');
                $listings = Listing::find($listingId);
                $commentCount = $listings->comments->comment->count();
                dd($commentCount); --}}

            <span>21</span>

          </div>
          <div class="flex cursor-pointer items-center transition hover:text-slate-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
            </svg>
            <span>4</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</a>
