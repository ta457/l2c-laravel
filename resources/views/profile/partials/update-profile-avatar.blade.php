@if (Auth::user()->avatar)
  <img class="w-40 h-40 object-cover rounded-l-lg" style="" src="/storage/{{ Auth::user()->avatar }}" alt="user_avatar">
@else
  <div class="flex justify-center items-center w-40 h-40 overflow-hidden bg-gray-200 dark:bg-gray-600 rounded-l-lg">
    <svg class="w-32 h-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="">
      <path
        d="m 8 1 c -1.65625 0 -3 1.34375 -3 3 s 1.34375 3 3 3 s 3 -1.34375 3 -3 s -1.34375 -3 -3 -3 z m -1.5 7 c -2.492188 0 -4.5 2.007812 -4.5 4.5 v 0.5 c 0 1.109375 0.890625 2 2 2 h 8 c 1.109375 0 2 -0.890625 2 -2 v -0.5 c 0 -2.492188 -2.007812 -4.5 -4.5 -4.5 z m 0 0"
        fill="#9ca3af" />
    </svg>
  </div>
@endif