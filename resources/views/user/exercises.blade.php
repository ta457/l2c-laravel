@props([
'courses' => $props['courses']
])

<x-main-page-layout>
  <x-home-header />

  <section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-20" style="min-height: 41rem;">
      <div class="mr-auto place-self-center">
        {{-- header --}}
        <h1 class="max-w-2xl mb-8 text-4xl font-semibold leading-none dark:text-yellow-100">
          Exercises & Quizzes
        </h1>

        {{-- search bar --}}
        {{-- <div class="w-fit mb-8 relative">
          <input type="text" id="searchInput" name="search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block md:w-56 lg:w-72 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            placeholder="Find an exercise/quiz...">
        </div> --}}

        {{-- tutorial list --}}
        <div class="w-full grid grid-cols-2 lg:grid-cols-3 gap-x-2 gap-y-6">

          @foreach ($courses as $course)
            @if ($course->exercises->isNotEmpty() || $course->quizzes->isNotEmpty())
              <div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-yellow-100">
                  {{ $course->name }}
                </h3>
                <ul>
                  @if ($course->exercises->isNotEmpty())
                    <li>
                      <a href="/exercises/{{ $course->slug }}/{{ $course->exercises->first()->id }}"
                        class="block text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 w-fit p-2 rounded-md">
                        Exercises
                      </a>
                    </li>
                  @endif
                  @if ($course->quizzes->isNotEmpty())
                    <li>
                      <a href="/quizzes/{{ $course->slug }}/{{ $course->quizzes->first()->id }}"
                        class="block text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 w-fit p-2 rounded-md">
                        Quizzes
                      </a>
                    </li>
                  @endif
                </ul>
              </div>
            @endif
          @endforeach

        </div>
      </div>
    </div>
  </section>

  <x-home-footer/>
</x-main-page-layout>