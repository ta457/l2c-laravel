@props([
'groups' => $props['groups']
])

<x-main-page-layout>
  <x-home-header />

  <section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-20" style="min-height: 41rem;">
      <div class="mr-auto place-self-center">
        {{-- header --}}
        <h1 class="max-w-2xl mb-8 text-4xl font-semibold leading-none dark:text-yellow-100">
          Tutorials
        </h1>

        {{-- search bar --}}
        <div class="w-fit mb-8 relative">
          <input type="text" id="searchBar" name="search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block md:w-56 lg:w-72 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            placeholder="Find a course...">
        </div>

        {{-- tutorial list --}}
        <div class="w-full grid grid-cols-2 lg:grid-cols-3 gap-x-2 gap-y-6">

          @foreach ($groups as $group)
            <div class="list-group">
              <h1 class="text-xl font-semibold mb-2 text-gray-900 dark:text-yellow-100">
                {{ $group->name }}
              </h1>
              <ul>
                @foreach ($group->courses as $course)
                  @if ($course->articles->isNotEmpty())
                    <li class="list-item">
                      
                      <a href="/courses/{{ $course->slug }}/{{ $course->articles->first()->id }}"
                        class="block text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 w-fit p-2 rounded-md">
                        {{ $course->name }}
                      </a>
                      
                    </li>
                  @endif
                @endforeach
              </ul>
            </div>
          @endforeach

        </div>
      </div>
    </div>
  </section>

  <x-home-footer/>
</x-main-page-layout>