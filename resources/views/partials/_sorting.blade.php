<section>

<button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray bg-green-400 hover:bg-lime-400 focus:ring-4 focus:outline-none focus:ring-white-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-white-600 dark:hover:bg-white-700 dark:focus:ring-white-800" type="button">Sort By: <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
  </svg></button>
<!-- Dropdown menu -->
<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-green-400">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li>
            <a href="{{ route('listings.index', ['sort_by' => 'title']) }}" class="block px-4 py-2 hover:bg-lime-600 dark:hover:bg-lime-400 dark:hover:text-white">Title</a>
        </li>
        <li>
            <a href="{{ route('listings.index', ['sort_by' => 'tags']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-lime-400 dark:hover:text-white">Tags</a>
        </li>
        <li>
            <a href="{{ route('listings.index', ['sort_by' => 'created_at']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-lime-400 dark:hover:text-white">Date</a>
        </li>
    </ul>
</div>
</section>