<x-layout>
    <a href="{{route('listings.index')}}" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <div class='flex items-center justify-center'>
            <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
            <div class="flex w-full items-center justify-between border-b pb-3">

                <div class="ml-2 text-lg font-bold text-slate-700">
                    <a href="/profile/{{$announcement->author->id ?? '1'}}">
                        <small>
                            <strong>
                                {{$announcement->author->name ?? 'No Author'}}
                            </strong>
                        </small>
                    </a>
              </div>
              <small class="text-sm text-gray-700">{{$announcement->created_at->diffForHumans()}}</small>
            </div>

            <div class="mt-4 mb-6">
                <br>
              <div class="mb-3 text-xl font-bold text-center">{{$announcement->title}}</div>
              <br><br>
              <div class="text-lg text-neutral-600">{{$announcement->body}}</div>
            </div>

          </div>
        </div>


    </div>
</x-layout>

