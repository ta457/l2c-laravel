<div class="w-full bg-gray-200 dark:bg-gray-700 dark:text-white rounded-lg py-6 px-4">
  <p class="text-xl mb-4">{{ $title }}</p>
  <div class="p-2 bg-white dark:bg-gray-900 border-l-4 border-primary-500">{!! $content !!}</div>
  <a class="mt-4 flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
    href="/html-editor/{{ $id }}">
    {{ $btnText }}
  </a>
</div>