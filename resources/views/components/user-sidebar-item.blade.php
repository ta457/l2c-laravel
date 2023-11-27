<li>
  <a href="{{ $href }}"
    @if ($active == true)
    class="flex justify-between items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white bg-gray-100 dark:bg-gray-700 group"
    @else
    class="flex justify-between items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
    @endif
    >
    {{-- <svg aria-hidden="true"
      class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
      fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
      <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
    </svg> --}}
    <span class="ml-3">{{ $text }}</span>
    @if (isset($completed) && $completed == true)
    <svg class="w-6 h-6 text-emerald-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
    </svg>
    @endif
  </a>
</li>