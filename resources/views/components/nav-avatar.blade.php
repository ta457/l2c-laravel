@if (Auth::user()->avatar)
<img class="w-12 h-12 object-cover p-1 rounded-full" style="" src="/storage/{{ Auth::user()->avatar }}"
  alt="user_avatar">
@else
<div class="border border-gray-300 dark:border-gray-700 relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 mr-1">
  <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
    xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
  </svg>
</div>
@endif