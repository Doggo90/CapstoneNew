<x-layout>
    {{-- <link href="https://cdn.tailwindcss.com" rel="stylesheet"> --}}
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <style>
    :root {
        --main-color: #4a76a8;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }
</style>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Add this to the <head> section of your HTML -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">



<div class="bg-gray-100">
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                            src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                            alt="">
                    </div>
                    <img class="w-32 h-32 rounded-full mx-auto" src="{{ (!empty($user->photo)) ? url($user->photo) : url('upload/no_image.jpg')}}" alt="profile">
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$user->name}}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">{{$user->email}}</h3>
                    @if($user->phone)
                        <h3>{{ $user->phone }}</h3>
                    @else
                    
                    
                    <form action="{{ route('user.update.phone',['id' => $user->id]) }}" method="POST" id="updatePhoneForm">
                        @csrf
                        <label for="phone">Phone Number:</label>
                        <input type="number" name="phone" id="phone" placeholder="Enter your phone number">
                        <button type="button" class="h-10 w-20 text-white rounded-lg bg-green-400 hover:bg-lime-400" onclick="confirmPhoneNumber()">Submit</button>
                    </form>
                    
                    <!-- Tailwind CSS modal -->
                    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="confirmationModal">
                        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <!-- Icon (optional) -->
                                            <!-- Replace with your own icon or remove this div -->
                                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle">
                                                Confirmation
                                            </h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500">You can only change your contact number once, please double check if your contact number is correct.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="button" onclick="submitForm()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Confirm
                                    </button>
                                    <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        function confirmPhoneNumber() {
                            const phoneNumber = document.getElementById('phone').value;
                            if (phoneNumber.trim() !== '') {
                                // Show the Tailwind CSS modal
                                document.getElementById('confirmationModal').classList.remove('hidden');
                                document.getElementById('confirmationModal').classList.add('flex');
                            }   
                        }

                        function closeModal() {
                            // Hide the Tailwind CSS modal
                            document.getElementById('confirmationModal').classList.add('hidden');
                            document.getElementById('confirmationModal').classList.remove('flex');
                        }

                        function submitForm() {
                            // Hide the Tailwind CSS modal
                            closeModal();

                            // Manually submit the form
                            const form = document.getElementById('updatePhoneForm');
                            if (form) {
                                form.submit();
                            } else {
                                console.error("Form not found.");
                            }
                        }
                    </script>
                    
                    @endif
                    
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Posts</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">5125</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Reputation</span>
                            <span class="ml-auto"><span
                                class="bg-green-500 py-1 px-2 rounded text-white text-sm">345345345</span></span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->

                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-sm">

                    <div class="grid grid-cols-1">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3 well">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Posts</span>
                            </div>
                            @if ($listings->count() > 0)
                            <ul class="list-inside space-y-6">
                                @foreach ($listings as $listing)
                                <li>
                                    <div class="text-gray-800 font-bold text-xl my-1"><a href="/listings/{{$listing->id}}">{{$listing->title}}</a></div>
                                    <div class="text-gray-500 text-xs">Created at: {{$listing->created_at}}</div>
                                </li>
                                    <br>
                                @endforeach
                            </ul>
                            <style> z-index: 99999
                            {{ $listings->links() }}
                            </style>
                            @else
                                <p>No posts found.</p>
                            @endif 
                        </div>
                    </div>
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>
</body>


</x-layout>




{{-- <h2 class="text-center"> POSTS </h2><br>
<!-- Assuming $user and $userPosts are available from the controller -->
@if ($listings->count() > 0)
    <ul class="flex flex-col items-center">
        @foreach ($listings as $listing)
            <li><a href="/listings/{{$listing->id}}">{{ $listing->title }}</a></li>
            <br>
        @endforeach
    </ul>
@else
    <p>No posts found.</p>
@endif --}}
