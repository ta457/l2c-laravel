<div>
  <a class="flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
    href="{{ $data->link }}">
    @if ($data->link_title)
    {{ $data->link_title }}
    @else
    Link
    @endif
  </a>
</div>