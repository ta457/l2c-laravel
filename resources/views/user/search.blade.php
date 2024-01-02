@props([
'courses' => $props['courses'],
'articles' => $props['articles'],
'exercises' => $props['exercises'],
'quizzes' => $props['quizzes'],
])

<x-main-page-layout>
  <x-home-header />

  <section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-20" style="min-height: 41rem;">
      <div class="mr-auto place-self-center">
        {{-- header --}}
        <h1 class="max-w-2xl mb-8 text-4xl font-semibold leading-none dark:text-yellow-100">
          Search result
        </h1>

        {{-- search bar --}}
        <form action="/search" method="POST">
          @csrf
          <div class="relative max-w-screen-xl py-4 flex gap-2">
              <input type="text" id="search" name="search"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block md:w-56 lg:w-72 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              placeholder="Find courses, lessons, exercises...">
              <button class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                  type="submit">
                  <svg aria-hidden="true" class="w-5 h-5 text-white" fill="currentColor" viewbox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                          clip-rule="evenodd" />
                  </svg>
              </button>
          </div>
        </form>

        {{-- tutorial list --}}
        <div class="w-full grid grid-cols-2 lg:grid-cols-3 gap-x-2 gap-y-6">
          <div class="list-group">
            <h1 class="text-xl font-semibold mb-2 text-gray-900 dark:text-yellow-100">
              Courses
            </h1>
            @if ($courses->isEmpty())
              <p class="text-gray-900 dark:text-yellow-100">
                No courses found.
              </p>
            @endif
            @foreach ($courses as $course)
              <a href="/courses/{{ $course->slug }}/{{ $course->articles->first()->id }}" class="block text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 w-fit p-2 rounded-md">
                {{ $course->name }}
              </a>
            @endforeach
          </div>

          <div class="list-group">
            <h1 class="text-xl font-semibold mb-2 text-gray-900 dark:text-yellow-100">
              Lessons
            </h1>
            @if ($articles->isEmpty())
              <p class="text-gray-900 dark:text-yellow-100">
                No lessons found.
              </p>
            @endif
            @foreach ($articles as $article)
              <a href="/courses/{{ $article->course->slug }}/{{ $article->id }}" 
                class="block text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 w-fit p-2 rounded-md">
                {{ $article->title }}
              </a>
            @endforeach
          </div>

          <div class="list-group">
            <h1 class="text-xl font-semibold mb-2 text-gray-900 dark:text-yellow-100">
              Exercises
            </h1>
            @if ($exercises->isEmpty())
              <p class="text-gray-900 dark:text-yellow-100">
                No exercises found.
              </p>
            @endif
            @foreach ($exercises as $exercise)
              <a href="/exercises/{{ $exercise->course->slug }}/{{ $exercise->id }}" class="block text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 w-fit p-2 rounded-md">
                {{ $exercise->title }}
              </a>
            @endforeach
          </div>

          <div class="list-group">
            <h1 class="text-xl font-semibold mb-2 text-gray-900 dark:text-yellow-100">
              Quizzes
            </h1>
            @if ($quizzes->isEmpty())
              <p class="text-gray-900 dark:text-yellow-100">
                No quizzes found.
              </p>
            @endif
            @foreach ($quizzes as $quiz)
              <a href="/quizzes/{{ $quiz->course->slug }}/{{ $quiz->id }}" class="block text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 w-fit p-2 rounded-md">
                {{ $quiz->text_content }}
              </a>
            @endforeach
          </div>

        </div>
      </div>
    </div>
  </section>

  <x-home-footer/>
</x-main-page-layout>