<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Post
            </h2>
            <p class="mb-4">Think Before You Click </p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">
                    Title</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title" id="title"
                    placeholder="Example: Senior Laravel Developer"
                    value="{{old('title')}}"/>
                    @error('title')
                        <p class="p text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags(Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags" id="tags"
                    placeholder="Example: ITEC101,ITEC51,DCIT55"
                    value="{{old('tags')}}"/>
                    @error('tags')
                        <p class="p text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            </div>
                            {{-- FILE UPLOADS --}}
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Thumbnail
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo" id="logo"/>
            </div>

            <div class="mb-6">
                <label
                    for="body"
                    class="inline-block text-lg mb-2">
                    Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="body" id="body"
                    rows="10"
                    placeholder="Enter post description">
                    {{old('body')}}
                </textarea>
                @error('body')
                    <p class="p text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-lime-500 text-white rounded py-2 px-4 hover:bg-black">
                    Post
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>            