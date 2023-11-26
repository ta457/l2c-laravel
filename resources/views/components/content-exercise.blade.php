<div class="bg-gray-200 dark:bg-gray-700 dark:text-white rounded-lg py-6 px-4 mb-4">
  <p class="text-xl mb-4">Exercise</p>
  <p class="mb-2">{{ $exercise->title }}</p>
  <div class="text-gray-900 dark:bg-gray-900 dark:text-white p-2 bg-white border-l-4 border-primary-500">
    <p>{{ $exercise->description }}</p>
    <p>{!! nl2br(e($exercise->text_content)) !!}</p>
  </div>
  <a class="mt-4 flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
    href="/exercises/{{ $exercise->course->slug }}/{{ $exercise->id }}">
    Try this exercise
  </a>
</div>