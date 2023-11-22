@props([
'article' => $props['article'],
'sections' => $props['sections'],
'exercises' => $props['exercises'],
'quizzes' => $props['quizzes']
])

<x-admin-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Panel / Article ID = ') }}{{ $article->id }}
        <x-header-message />
      </h2>
      <x-goback-btn href="/admin-dashboard/articles/{{ $article->id }}" />
    </div>
  </x-slot>

  <div class="bg-white dark:bg-gray-800 px-5 pb-8">
    <!-- Modal header -->
    <div class="flex justify-between pb-4 items-center rounded-t border-b dark:border-gray-600">
      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Article Preview 
      </h3>

      <button type="button" id="createModalButton" data-modal-target="createModal" data-modal-toggle="createModal"
        class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-2 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
          aria-hidden="true">
          <path clip-rule="evenodd" fill-rule="evenodd"
            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
        </svg>
        Add a section
      </button>
    </div>
    
    @foreach ($sections as $section)
      <div class="border-b dark:border-gray-500 pb-8 flex flex-col gap-5">
        {{-- section header --}}
        <div class="text-gray-400 dark:text-gray-500 text-sm flex justify-between items-center">
          <p>Section ID = {{ $section->id }}</p>
        </div>

        {{-- section title --}}
        <div class="flex items-center justify-between">
          <h1 class="text-3xl dark:text-white">{{ $section->title }}</h1>
          <x-admin-table-dropdown action='/admin-dashboard/sections' :id="$section->id">
            <li>
              <form action="/admin-dashboard/sections/{{ $section->id }}/backward" method="POST">
                @csrf @method('PATCH')
                <button type="submit"
                  class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200"
                >
                  <svg class="w-3.5 h-3.5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"/>
                  </svg>
                  <div class="ml-2">Order Up</div>
                </button>
              </form>
            </li>
            <li>
              <form action="/admin-dashboard/sections/{{ $section->id }}/forward" method="POST">
                @csrf @method('PATCH')
                <button type="submit"
                  class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200"
                >
                  <svg class="w-3.5 h-3.5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1"/>
                  </svg>
                  <div class="ml-2">Order Down</div>
                </button>
              </form>
            </li>
          </x-admin-table-dropdown>
        </div>

        {{-- section content (subsections) --}}
        @foreach ($section->subsections as $subsection)

          @if ($subsection->type == 1)
            <div class="dark:text-white">
              {!! $subsection->text_content !!}
            </div>
          @endif

          @if ($subsection->type == 3)
            <div>
              <a class="flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                href="{{ $subsection->link }}">
                @if ($subsection->link_title)
                  {{ $subsection->link_title }}
                @else
                  Link
                @endif
              </a>
            </div>
          @endif

          @if ($subsection->type == 2)
            <div class="bg-gray-200 dark:bg-gray-700 dark:text-white rounded-lg py-6 px-4">
              <p class="text-xl mb-4">Example</p>
              <div class="p-2 bg-white dark:bg-gray-900 border-l-4 border-primary-500">{!! $subsection->code_example !!}</div>
              <a class="mt-4 flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                href="/code-example/{{ $subsection->id }}">
                Try this code
              </a>
            </div>
          @endif

          @if ($subsection->type == 4)
            <div class="mb-4">
              <img class="lg:max-w-2xl" src="/storage/{{ $subsection->img }}" alt="section_img">
            </div>
          @endif
          
          @if ($subsection->type == 5)
            @php
              $exercise = $exercises->find($subsection->exercise_id);
            @endphp
            <div class="bg-gray-200 dark:bg-gray-700 dark:text-white rounded-lg py-6 px-4 mb-4">
              <p class="text-xl mb-4">Exercise</p>
              <p class="mb-2">{{ $exercise->title }}</p>
              <div class="text-gray-900 dark:bg-gray-900 dark:text-white p-2 bg-white border-l-4 border-primary-500">
                <p>{{ $exercise->description }}</p>
                <p>{!! nl2br(e($exercise->text_content)) !!}</p>
              </div>
              <a class="mt-4 flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                href="/exercise/{{ $exercise->id }}">
                Try this exercise
              </a>
            </div>
          @endif

          @if ($subsection->type == 6)
            @php
              $quiz = $quizzes->find($subsection->quiz_id);
            @endphp
            <div class="dark:bg-gray-700 dark:text-white bg-gray-200 rounded-lg py-6 px-4">
              <p class="text-xl mb-4">Quiz</p>
              <p class="mb-2">{!! nl2br(e($quiz->text_content)) !!}</p>
              <div class="text-gray-900 dark:bg-gray-900 dark:text-white p-2 bg-white border-l-4 border-primary-500 flex flex-col gap-2">      
                <div>
                  <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $quiz->id }}_choice_1" name="quiz_{{ $quiz->id }}" value="1">
                  <label class="ml-2" for="quiz_{{ $quiz->id }}_choice_1">{{ $quiz->choice_1 }}</label><br>
                </div>
                <div>
                  <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $quiz->id }}_choice_2" name="quiz_{{ $quiz->id }}" value="2">
                  <label class="ml-2" for="quiz_{{ $quiz->id }}_choice_2">{{ $quiz->choice_2 }}</label><br>
                </div>
                <div>
                  <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $quiz->id }}_choice_3" name="quiz_{{ $quiz->id }}" value="3">
                  <label class="ml-2" for="quiz_{{ $quiz->id }}_choice_3">{{ $quiz->choice_3 }}</label>
                </div>
              </div>
              <a class="mt-4 flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                href="/quiz/{{ $quiz->id }}">
                Try this quiz
              </a>
            </div>
          @endif

        @endforeach
      </div>
    @endforeach
  </div>

  <x-admin-create-modal action="/admin-dashboard/articles/{{ $article->id }}" header="Create new section">
    {{-- modal form input fields --}}
    <div>
      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
      <input type="text" name="title" id="title"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="New section title" required>
    </div>
    <input class="hidden" type="number" name="article_id" id="article_id" value="{{ $article->id }}">
  </x-admin-create-modal>

  <!-- Delete modal ------------------------------ -->
  <x-admin-delete-modal />
</x-admin-layout>